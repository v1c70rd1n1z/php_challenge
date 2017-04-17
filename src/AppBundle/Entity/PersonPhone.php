<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonPhone
 *
 * @ORM\Table(name="person_phone")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonPhoneRepository")
 */
class PersonPhone
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
     * @ORM\Column(name="number", type="decimal", precision=7, scale=0)
     */
    private $number;

    /**
     * Many PersonPhones have One Person.
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="objPersonPhone")
     * @ORM\JoinColumn(name="personid", referencedColumnName="id")
     */
    private $objPerson;


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
     * Set number
     *
     * @param string $number
     *
     * @return PersonPhone
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set objPerson
     *
     * @param \AppBundle\Entity\Person $objPerson
     *
     * @return PersonPhone
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
}
