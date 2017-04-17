<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonRepository")
 */
class Person
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * One Person has Many PersonPhones.
     * @ORM\OneToMany(targetEntity="PersonPhone", mappedBy="objPerson", cascade={"persist", "remove"})
     */
    private $objPersonPhone;

    /**
     * One Person has Many ShipOrders.
     * @ORM\OneToMany(targetEntity="ShipOrder", mappedBy="objPerson")
     */
    private $objShipOrder;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->objPersonPhone = new \Doctrine\Common\Collections\ArrayCollection();
        $this->objShipOrder = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Person
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add objPersonPhone
     *
     * @param \AppBundle\Entity\PersonPhone $objPersonPhone
     *
     * @return Person
     */
    public function addObjPersonPhone(\AppBundle\Entity\PersonPhone $objPersonPhone)
    {
        $this->objPersonPhone[] = $objPersonPhone;

        return $this;
    }

    /**
     * Remove objPersonPhone
     *
     * @param \AppBundle\Entity\PersonPhone $objPersonPhone
     */
    public function removeObjPersonPhone(\AppBundle\Entity\PersonPhone $objPersonPhone)
    {
        $this->objPersonPhone->removeElement($objPersonPhone);
    }

    /**
     * Get objPersonPhone
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjPersonPhone()
    {
        return $this->objPersonPhone;
    }

    /**
     * Add objShipOrder
     *
     * @param \AppBundle\Entity\ShipOrder $objShipOrder
     *
     * @return Person
     */
    public function addObjShipOrder(\AppBundle\Entity\ShipOrder $objShipOrder)
    {
        $this->objShipOrder[] = $objShipOrder;

        return $this;
    }

    /**
     * Remove objShipOrder
     *
     * @param \AppBundle\Entity\ShipOrder $objShipOrder
     */
    public function removeObjShipOrder(\AppBundle\Entity\ShipOrder $objShipOrder)
    {
        $this->objShipOrder->removeElement($objShipOrder);
    }

    /**
     * Get objShipOrder
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjShipOrder()
    {
        return $this->objShipOrder;
    }
}
