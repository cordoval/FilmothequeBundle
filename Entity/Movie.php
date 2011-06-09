<?php
namespace Cordova\FilmothequeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use \Cordova\FilmothequeBundle\Entity\CategoryMovie as CategoryMovie;

/**
 * @ORM\Entity
 */
class Movie
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length="255")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     */
    private $title;

    /**
     * @ORM\Column(type="string",length="500")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="CategoryMovie")
     * @Assert\NotBlank()
     */
    private $categorymovie;

    /**
     * @ORM\ManyToMany(targetEntity="Actor")
     */
    private $actors;
    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add actors
     *
     * @param Cordova\FilmothequeBundle\Entity\Actor $actors
     */
    public function addActors(\Cordova\FilmothequeBundle\Entity\Actor $actors)
    {
        $this->actors[] = $actors;
    }

    /**
     * Get actors
     *
     * @return Doctrine\Common\Collections\Collection $actors
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set categorymovie
     *
     * @param Cordova\FilmothequeBundle\Entity\CategoryMovie $categorymovie
     */
    public function setCategorymovie(CategoryMovie $categorymovie)
    {
        $this->categorymovie = $categorymovie;
    }

    /**
     * Get categorymovie
     *
     * @return Cordova\FilmothequeBundle\Entity\CategoryMovie $categorymovie
     */
    public function getCategorymovie()
    {
        return $this->categorymovie;
    }
}