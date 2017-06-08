<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Length(min = 2, max = 300, 
     *     minMessage = "Opinia musi mieć co najmniej 2 znaki.",
     *     maxMessage = "Opinia może mieć maksymalnie 300 znaków.")
     * @Assert\NotNull(message = "Musisz wpisać swoją opinię.")
     */
    private $tresc;

    /**
     * @var int
     *
     * @ORM\Column(name="ocena", type="integer")
     * @Assert\Range(min = 1, max = 10, 
     *     invalidMessage = "Ocena musi być z zakresu od 1 do 10.")
     * @Assert\NotNull(message = "Musisz podać ocenę wina.")
     */
    private $ocena;

    /**
     * @ORM\ManyToOne(targetEntity="Wino", inversedBy="opinie")
     * @ORM\JoinColumn(name="wino_id", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotNull(message = "Opinia musi odnosić się do wina.")
     */
    private $wino;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="opinie")
     * @Assert\NotNull(message = "Opiniamusi mieć autora.")
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
