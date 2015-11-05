<?php
/**
 * @Entity @Table(name="departure")
 */
class Departure
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $city;

    /**
     * @Column(type="text")
     */
    protected $reason;

    /**
     * @Column(type="datetime")
     */
    protected $time;

    /**
     * @OneToOne(targetEntity="Travel", inversedBy="departure")
     * @JoinColumn(name="travel_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $travel;


    public function getId()
    {
        return $this->id;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime()
    {
        $this->time = date_create(date("Y-m-d H:i:s"));
    }

    public function getTravel()
    {
        return $this->travel;
    }

    public function setTravel($travel)
    {
        $travel->addDeparture($this);
        $this->travel = $travel;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function setReason($reason)
    {
        $this->reason = $reason;
    }

}