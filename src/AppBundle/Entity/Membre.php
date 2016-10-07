<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 04/10/2016
 * Time: 13:35
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as AppAssert;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Membre
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
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 25,
     *      maxMessage = "Your last name cannot be longer than {{ limit }} characters"
     * )
     */
    protected $nom;


    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $prenom;


    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    protected $mail;

    /**
     * @var string
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank()
     * @AppAssert\IsTelephone
     */
    protected $telephone;


    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     * @Assert\Date()
     * @Assert\LessThan("-18 years")
     */
    protected $dateNaissance;

    /**
     * @ORM\ManyToOne(targetEntity="EtatMembre", inversedBy="membre")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $etatMembre;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Adresse", mappedBy="membre", cascade={"persist"})
     */
    protected $adresse;

    /**
     * Membre constructor.
     */
    public function __construct()
    {
        $this->adresse = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
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
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance(\DateTime $dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getEtatMembre()
    {
        return $this->etatMembre;
    }

    /**
     * @param mixed $etatMembre
     */
    public function setEtatMembre($etatMembre)
    {
        $this->etatMembre = $etatMembre;
    }

    /**
     * @return ArrayCollection
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param ArrayCollection $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @param Adresse $adresse
     */
    public function addAdresse(Adresse $adresse)
    {
        $adresse->setMembre($this);
        $this->adresse->add($adresse);
    }

    public function removeAdresse(Adresse $adresse)
    {
        $this->adresse->removeElement($adresse);
    }

}