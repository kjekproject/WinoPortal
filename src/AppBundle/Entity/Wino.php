<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Wino
 *
 * @ORM\Table(name="wina")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WinoRepository")
 */
class Wino
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
     * @ORM\Column(name="nazwa", type="string", length=128)
     * @Assert\NotNull(message = "Musisz podać nazwę wina.")
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="kolor", type="string", length=16)
     * @Assert\Choice(choices = {"białe", "różowe", "czerwone"}, 
     *     message = "Wybierz jedno z podanych.")
     * @Assert\NotNull(message = "Musisz wybrać jedną z podanych wartości.")
     */
    private $kolor;

    /**
     * @var string
     *
     * @ORM\Column(name="smak", type="string", length=32)
     * @Assert\Choice(choices = {"wytrawne", "półwytrawne", "półsłodkie", "słodkie"}, 
     *     message = "Wybierz jedną z podanych wartości.")
     * @Assert\NotNull(message = "Musisz wybrać jedną z podanych wartości.")
     */
    private $smak;

    /**
     * @var int
     *
     * @ORM\Column(name="rocznik", type="integer", length=32)
     * @Assert\Range(min = 1800, max = 2017, 
     *     invalidMessage = "Wpisz rocznik z zakresu 1800-2017.")
     * @Assert\NotNull(message = "Musisz podać rocznik wina.")
     */
    private $rocznik;

    /**
     * @var string
     *
     * @ORM\Column(name="wyprodukowana_ilosc", type="string", length=32, nullable=true)
     */
    private $wyprodukowanaIlosc;

    /**
     * @var string
     *
     * @ORM\Column(name="stan", type="string", length=32, nullable=true)
     */
    private $stan;

    /**
     * @var string
     *
     * @ORM\Column(name="cena", type="string", length=32, nullable=true)
     */
    private $cena;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="wina")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Opinia", mappedBy="wino") 
     */
    private $opinie;

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
     * Set nazwa
     *
     * @param string $nazwa
     * @return Wino
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string 
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Set kolor
     *
     * @param string $kolor
     * @return Wino
     */
    public function setKolor($kolor)
    {
        $this->kolor = $kolor;

        return $this;
    }

    /**
     * Get kolor
     *
     * @return string 
     */
    public function getKolor()
    {
        return $this->kolor;
    }

    /**
     * Set smak
     *
     * @param string $smak
     * @return Wino
     */
    public function setSmak($smak)
    {
        $this->smak = $smak;

        return $this;
    }

    /**
     * Get smak
     *
     * @return string 
     */
    public function getSmak()
    {
        return $this->smak;
    }

    /**
     * Set rocznik
     *
     * @param string $rocznik
     * @return Wino
     */
    public function setRocznik($rocznik)
    {
        $this->rocznik = $rocznik;

        return $this;
    }

    /**
     * Get rocznik
     *
     * @return string 
     */
    public function getRocznik()
    {
        return $this->rocznik;
    }

    /**
     * Set wyprodukowanaIlosc
     *
     * @param string $wyprodukowanaIlosc
     * @return Wino
     */
    public function setWyprodukowanaIlosc($wyprodukowanaIlosc)
    {
        $this->wyprodukowanaIlosc = $wyprodukowanaIlosc;

        return $this;
    }

    /**
     * Get wyprodukowanaIlosc
     *
     * @return string 
     */
    public function getWyprodukowanaIlosc()
    {
        return $this->wyprodukowanaIlosc;
    }

    /**
     * Set stan
     *
     * @param string $stan
     * @return Wino
     */
    public function setStan($stan)
    {
        $this->stan = $stan;

        return $this;
    }

    /**
     * Get stan
     *
     * @return string 
     */
    public function getStan()
    {
        return $this->stan;
    }

    /**
     * Set cena
     *
     * @param string $cena
     * @return Wino
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return string 
     */
    public function getCena()
    {
        return $this->cena;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->opinie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Wino
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

    /**
     * Add opinie
     *
     * @param \AppBundle\Entity\Opinia $opinie
     * @return Wino
     */
    public function addOpinie(\AppBundle\Entity\Opinia $opinie)
    {
        $this->opinie[] = $opinie;

        return $this;
    }

    /**
     * Remove opinie
     *
     * @param \AppBundle\Entity\Opinia $opinie
     */
    public function removeOpinie(\AppBundle\Entity\Opinia $opinie)
    {
        $this->opinie->removeElement($opinie);
    }

    /**
     * Get opinie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOpinie()
    {
        return $this->opinie;
    }
}
