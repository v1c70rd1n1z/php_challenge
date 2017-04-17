<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Person;

class PeopleController extends FOSRestController
{
    /**
     * @Rest\Get("/people")
     */
    public function allAction()
    {
        $restresult = $this->getDoctrine()->getRepository('AppBundle:Person')->findAll();
        if ($restresult === null) {
            return new View("there are no person exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

    /**
     * @Rest\Get("/person/{id}")
     */
    public function personAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AppBundle:Person')->find($id);
        if ($restresult === null) {
            return new View("there are no person exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

}
