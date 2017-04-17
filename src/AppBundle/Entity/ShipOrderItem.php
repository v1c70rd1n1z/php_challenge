<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShipOrderItem
 *
 * @ORM\Table(name="ship_order_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShipOrderItemRepository")
 */
class ShipOrderItem
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="decimal", precision=3, scale=0)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * Many ShipOrderItems have One ShipOrder.
     * @ORM\ManyToOne(targetEntity="ShipOrder", inversedBy="objShipOrderItem")
     * @ORM\JoinColumn(name="shiporderid", referencedColumnName="id")
     */
    private $objShipOrder;


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
     * Set title
     *
     * @param string $title
     *
     * @return ShipOrderItem
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return ShipOrderItem
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     *
     * @return ShipOrderItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return ShipOrderItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set objShipOrder
     *
     * @param \AppBundle\Entity\ShipOrder $objShipOrder
     *
     * @return ShipOrderItem
     */
    public function setObjShipOrder(\AppBundle\Entity\ShipOrder $objShipOrder = null)
    {
        $this->objShipOrder = $objShipOrder;

        return $this;
    }

    /**
     * Get objShipOrder
     *
     * @return \AppBundle\Entity\ShipOrder
     */
    public function getObjShipOrder()
    {
        return $this->objShipOrder;
    }
}
