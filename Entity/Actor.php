<?php
namespace Cordova\FilmothequeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Actor
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
    private $name;

    /**
     * @ORM\Column(type="string",length="255")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     */    
    private $title;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */    
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string",length="1")
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"M", "F"})
     */    
    private $genre;
}