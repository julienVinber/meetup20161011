<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 07/10/2016
 * Time: 18:03
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table()
 */
class EtatMembre
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $nom;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Membre", mappedBy="etatMembre")
     */
    protected $membre;

    function __toString()
    {
        return $this->nom;
    }


    /**
     * EtatMembre constructor.
     */
    public function __construct()
    {
        $this->membre = new ArrayCollection();
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return ArrayCollection
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * @param ArrayCollection $membre
     */
    public function setMembre($membre)
    {
        $this->membre = $membre;
    }
    
}