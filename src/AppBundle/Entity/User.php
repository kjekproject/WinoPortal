<?php


namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(type="text", nullable=true) 
     */
    private $address;
    
    /**
     * @ORM\OneToMany(targetEntity="Wino", mappedBy="user")
     */
    private $wina;
    
    /**
     * @ORM\OneToMany(targetEntity="Opinia", mappedBy="user")
     */
    private $opinie;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add wina
     *
     * @param \AppBundle\Entity\Wino $wina
     * @return User
     */
    public function addWina(\AppBundle\Entity\Wino $wina)
    {
        $this->wina[] = $wina;

        return $this;
    }

    /**
     * Remove wina
     *
     * @param \AppBundle\Entity\Wino $wina
     */
    public function removeWina(\AppBundle\Entity\Wino $wina)
    {
        $this->wina->removeElement($wina);
    }

    /**
     * Get wina
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWina()
    {
        return $this->wina;
    }

    /**
     * Add opinie
     *
     * @param \AppBundle\Entity\Opinia $opinie
     * @return User
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
