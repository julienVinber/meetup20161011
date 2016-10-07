<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 07/10/2016
 * Time: 18:51
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Adresse
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
    protected $adresse1;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $complementAdresse;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    protected $codePostal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $ville;

    /**
     * @ORM\ManyToOne(targetEntity="Membre", inversedBy="adresse")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $membre;

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
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * @param string $adresse1
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;
    }

    /**
     * @return string
     */
    public function getComplementAdresse()
    {
        return $this->complementAdresse;
    }

    /**
     * @param string $complementAdresse
     */
    public function setComplementAdresse($complementAdresse)
    {
        $this->complementAdresse = $complementAdresse;
    }

    /**
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param string $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * @param mixed $membre
     */
    public function setMembre($membre)
    {
        $this->membre = $membre;
    }

}