<?php
namespace Cordova\FilmothequeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\ManyToOne(targetEntity="Category")
     * @Assert\NotBlank()
     */    
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Actor")
     */    
    private $actors;
}