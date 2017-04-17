<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use AppBundle\Entity\PersonPhone;
use AppBundle\Entity\ShipOrder;
use AppBundle\Entity\ShipOrderItem;
use AppBundle\Entity\ShipOrderTo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/upload")
     */
    public function uploadAction(Request $request)
    {
        try {
            $xml = simplexml_load_file($request->files->get('file')->getPathname());
            $em = $this->getDoctrine()->getManager();

            if (isset($xml->person)) {
                foreach ($xml->person as $person) {
                    $Person = $em->find('AppBundle:Person', $person->personid);
                    if (!$Person) {
                        $Person = new Person();
                        $Person->setId($person->personid);
                    }
                    $Person->setName($person->personname);
                    $em->persist($Person);
                    $em->flush();

                    foreach ($person->phones->phone as $phone) {
                        $PersonPhone = new PersonPhone();
                        $PersonPhone->setNumber($phone)
                            ->setObjPerson($Person);
                        $em->persist($PersonPhone);
                        $em->flush();
                    }
                }
            } elseif (isset($xml->shiporder)) {
                foreach ($xml->shiporder as $order) {
                    $Person = $em->find('AppBundle:Person', $order->orderperson);

                    $ShipOrder = $em->find('AppBundle:ShipOrder', $order->orderid);
                    if (!$ShipOrder) {
                        $ShipOrder = new ShipOrder();
                        $ShipOrder->setId($order->orderid);
                    }
                    $ShipOrder->setObjPerson($Person);
                    $em->persist($ShipOrder);
                    $em->flush();


                    if ($ShipOrder && $ShipOrder->getObjShipOrderTo()) {
                        $ShipOrderTo = $em->find('AppBundle:ShipOrderTo', $ShipOrder->getObjShipOrderTo()->getId());
                    }else{
                        $ShipOrderTo = new ShipOrderTo();
                    }
                    $ShipOrderTo->setName($order->shipto->name)
                        ->setAddress($order->shipto->address)
                        ->setCity($order->shipto->city)
                        ->setCountry($order->shipto->country)
                        ->setObjShipOrder($ShipOrder);

                    $em->persist($ShipOrderTo);
                    $em->flush();

                    foreach ($order->items->item as $item) {
                        $ShipOrderItem = new ShipOrderItem();
                        $ShipOrderItem->setTitle($item->title)
                            ->setNote($item->note)
                            ->setQuantity($item->quantity)
                            ->setPrice($item->price)
                            ->setObjShipOrder($ShipOrder);
                        $em->persist($ShipOrderItem);
                        $em->flush();
                    }
                }
            }

            $error = new Response('1');
        }catch (Exception $e){
            $error = new Response($e->getMessage());
        }
        return $error;
    }
}
