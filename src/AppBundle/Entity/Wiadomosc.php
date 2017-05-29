<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wiadomosc
 *
 * @ORM\Table(name="wiadomosc")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WiadomoscRepository")
 */
class Wiadomosc
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
     * @ORM\Column(name="tytul", type="string", length=255)
     */
    private $tytul;

    /**
     * @var string
     *
     * @ORM\Column(name="tresc", type="text")
     */
    private $tresc;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="wyslane")
     */
    private $nadawca;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="odebrane")
     */
    private $odbiorca;

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
     * Set tytul
     *
     * @param string $tytul
     * @return Wiadomosc
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;

        return $this;
    }

    /**
     * Get tytul
     *
     * @return string 
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * Set tresc
     *
     * @param string $tresc
     * @return Wiadomosc
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
     * Set nadawca
     *
     * @param \AppBundle\Entity\User $nadawca
     * @return Wiadomosc
     */
    public function setNadawca(\AppBundle\Entity\User $nadawca = null)
    {
        $this->nadawca = $nadawca;

        return $this;
    }

    /**
     * Get nadawca
     *
     * @return \AppBundle\Entity\User 
     */
    public function getNadawca()
    {
        return $this->nadawca;
    }

    /**
     * Set odbiorca
     *
     * @param \AppBundle\Entity\User $odbiorca
     * @return Wiadomosc
     */
    public function setOdbiorca(\AppBundle\Entity\User $odbiorca = null)
    {
        $this->odbiorca = $odbiorca;

        return $this;
    }

    /**
     * Get odbiorca
     *
     * @return \AppBundle\Entity\User 
     */
    public function getOdbiorca()
    {
        return $this->odbiorca;
    }
}
