<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="passport")
 */
class Passport
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $nationality;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @Column(type="string")
     */
    protected $gender;

    /**
     * @OneToMany(targetEntity="Travel", mappedBy="passport")
     * @JoinColumn(name="travel_id", referencedColumnName="id")
     **/
    private $travel;

    public function __construct()
    {
        $this->travel = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTravel()
    {
        return $this->travel;
    }

    public function setTravel($travel)
    {
        $this->travel = $travel;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

}