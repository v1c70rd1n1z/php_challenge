<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ShipOrder
 *
 * @ORM\Table(name="ship_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShipOrderRepository")
 */
class ShipOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * Many ShipOrders have One Person.
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="objShipOrder")
     * @ORM\JoinColumn(name="personid", referencedColumnName="id")
     */
    private $objPerson;

    /**
     * One ShipOrder has Many ShipOrdersItems.
     * @ORM\OneToMany(targetEntity="ShipOrderItem", mappedBy="objShipOrder")
     */
    private $objShipOrderItem;

    /**
     * One ShipOrder has One ShipOrdersTo.
     * @ORM\OneToOne(targetEntity="ShipOrderTo", mappedBy="objShipOrder")
     */
    private $objShipOrderTo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->objShipOrderItem = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return ShipOrder
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
     * Set objPerson
     *
     * @param \AppBundle\Entity\Person $objPerson
     *
     * @return ShipOrder
     */
    public function setObjPerson(\AppBundle\Entity\Person $objPerson = null)
    {
        $this->objPerson = $objPerson;

        return $this;
    }

    /**
     * Get objPerson
     *
     * @return \AppBundle\Entity\Person
     */
    public function getObjPerson()
    {
        return $this->objPerson;
    }

    /**
     * Add objShipOrderItem
     *
     * @param \AppBundle\Entity\ShipOrderItem $objShipOrderItem
     *
     * @return ShipOrder
     */
    public function addObjShipOrderItem(\AppBundle\Entity\ShipOrderItem $objShipOrderItem)
    {
        $this->objShipOrderItem[] = $objShipOrderItem;

        return $this;
    }

    /**
     * Remove objShipOrderItem
     *
     * @param \AppBundle\Entity\ShipOrderItem $objShipOrderItem
     */
    public function removeObjShipOrderItem(\AppBundle\Entity\ShipOrderItem $objShipOrderItem)
    {
        $this->objShipOrderItem->removeElement($objShipOrderItem);
    }

    /**
     * Get objShipOrderItem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjShipOrderItem()
    {
        return $this->objShipOrderItem;
    }

    /**
     * Set objShipOrderTo
     *
     * @param \AppBundle\Entity\ShipOrderTo $objShipOrderTo
     *
     * @return ShipOrder
     */
    public function setObjShipOrderTo(\AppBundle\Entity\ShipOrderTo $objShipOrderTo = null)
    {
        $this->objShipOrderTo = $objShipOrderTo;

        return $this;
    }

    /**
     * Get objShipOrderTo
     *
     * @return \AppBundle\Entity\ShipOrderTo
     */
    public function getObjShipOrderTo()
    {
        return $this->objShipOrderTo;
    }
}
