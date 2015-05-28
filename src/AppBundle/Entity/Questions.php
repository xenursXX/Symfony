<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Questions
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\QuestionsRepository")
 */
class Questions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="goodanswer", type="string", length=255)
     */
    private $goodanswer;

    /**
     * @var string
     *
     * @ORM\Column(name="badanswer", type="string", length=255)
     */
    private $badanswer;

    /**
     * @var string
     *
     * @ORM\Column(name="badanswer2", type="string", length=255)
     */
    private $badanswer2;

    /**
     * @var string
     *
     * @ORM\Column(name="badanswer3", type="string", length=255)
     */
    private $badanswer3;
    /**
     * @var Tag
     *
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"})
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="themes", type="string", length=255)
     */
    private $themes;
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
     * Set goodanswer
     *
     * @param string $goodanswer
     * @return Questions
     */
    public function setGoodanswer($goodanswer)
    {
        $this->goodanswer = $goodanswer;

        return $this;
    }

    /**
     * Get goodanswer
     *
     * @return string 
     */
    public function getGoodanswer()
    {
        return $this->goodanswer;
    }

    /**
     * Set badanswer
     *
     * @param string $badanswer
     * @return Questions
     */
    public function setBadanswer($badanswer)
    {
        $this->badanswer = $badanswer;

        return $this;
    }

    /**
     * Get badanswer
     *
     * @return string 
     */
    public function getBadanswer()
    {
        return $this->badanswer;
    }

    /**
     * Set badanswer2
     *
     * @param string $badanswer2
     * @return Questions
     */
    public function setBadanswer2($badanswer2)
    {
        $this->badanswer2 = $badanswer2;

        return $this;
    }

    /**
     * Get badanswer2
     *
     * @return string 
     */
    public function getBadanswer2()
    {
        return $this->badanswer2;
    }

    /**
     * Set badanswer3
     *
     * @param string $badanswer3
     * @return Questions
     */
    public function setBadanswer3($badanswer3)
    {
        $this->badanswer3 = $badanswer3;

        return $this;
    }

    /**
     * Get badanswer3
     *
     * @return string 
     */
    public function getBadanswer3()
    {
        return $this->badanswer3;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Questions
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }



    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {

    }


    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     * @return Questions
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set themes
     *
     * @param string $themes
     * @return Questions
     */
    public function setThemes($themes)
    {
        $this->themes = $themes;

        return $this;
    }

    /**
     * Get themes
     *
     * @return string 
     */
    public function getThemes()
    {
        return $this->themes;
    }
}
