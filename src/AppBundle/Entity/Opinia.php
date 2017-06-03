<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opinie
 *
 * @ORM\Table(name="opinie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OpiniaRepository")
 */
class Opinia
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
     * @ORM\Column(name="tresc", type="text")
     */
    private $tresc;

    /**
     * @var int
     *
     * @ORM\Column(name="ocena", type="integer")
     */
    private $ocena;

    /**
     * @ORM\ManyToOne(targetEntity="Wino", inversedBy="opinie")
     * @ORM\JoinColumn(name="wino_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $wino;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="opinie")
     */
    private $user;
    
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
     * Set tresc
     *
     * @param string $tresc
     * @return Opinie
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;

        return $this;
    }

    /**
     * Get tresc
     *
     * @return string 
     */
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * Set ocena
     *
     * @param integer $ocena
     * @return Opinie
     */
    public function setOcena($ocena)
    {
        $this->ocena = $ocena;

        return $this;
    }

    /**
     * Get ocena
     *
     * @return integer 
     */
    public function getOcena()
    {
        return $this->ocena;
    }

    /**
     * Set wino
     *
     * @param \AppBundle\Entity\Wino $wino
     * @return Opinia
     */
    public function setWino(\AppBundle\Entity\Wino $wino = null)
    {
        $this->wino = $wino;

        return $this;
    }

    /**
     * Get wino
     *
     * @return \AppBundle\Entity\Wino 
     */
    public function getWino()
    {
        return $this->wino;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Opinia
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
