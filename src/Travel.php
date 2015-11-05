<?php
/**
 * @Entity @Table(name="travel")
 */
class Travel
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="text")
     */
    protected $transportation;

    /**
     * @Column(type="string")
     */
    protected $country;

    /**
     * @OneToOne(targetEntity="Departure", inversedBy="travel")
     * @JoinColumn(name="departure_id", referencedColumnName="id", onDelete="SET NULL")
     **/
    private $departure;

    /**
     * @OneToOne(targetEntity="Immigration", inversedBy="travel")
     * @JoinColumn(name="immigration_id", referencedColumnName="id", onDelete="SET NULL")
     **/
    private $immigration;

    /**
     * @ManyToOne(targetEntity="Passport", inversedBy="travel")
     * @JoinColumn(name="passport_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $passport;

    public function getId()
    {
        return $this->id;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getTransportation()
    {
        return $this->transportation;
    }

    public function setTransportation($transportation)
    {
        $this->transportation = $transportation;
    }

    public function getPassport()
    {
        return $this->passport;
    }

    public function setPassport($passport)
    {
        $this->passport = $passport;
    }

    public function addDeparture($departure)
    {
        $this->departure= $departure;
    }

    public function addImmigration($immigration)
    {
        $this->immigration= $immigration;
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    public function getImmigration()
    {
        return $this->immigration;
    }

}