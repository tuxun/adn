<?php

namespace Adeti\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Adeti\BlogBundle\Entity\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="text")
     */
    private $article;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="rootnuke", type="string", length=255)
     */
    private $rootnuke;

    /**
     * @var string
     *
     * @ORM\Column(name="rootvalid", type="string", length=255)
     */
    private $rootvalid;

    /**
     * @var string
     *
     * @ORM\Column(name="usernuke", type="string", length=255)
     */
    private $usernuke;

    /**
     * @var string
     *
     * @ORM\Column(name="uservalid", type="string", length=255)
     */
    private $uservalid;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="commentable", type="boolean")
     */
    private $commentable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inmenu", type="boolean")
     */
    private $inmenu;


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
     * Set email
     *
     * @param string $email
     * @return Article
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set article
     *
     * @param string $article
     * @return Article
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Article
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set rootnuke
     *
     * @param string $rootnuke
     * @return Article
     */
    public function setRootnuke($rootnuke)
    {
        $this->rootnuke = $rootnuke;

        return $this;
    }

    /**
     * Get rootnuke
     *
     * @return string 
     */
    public function getRootnuke()
    {
        return $this->rootnuke;
    }

    /**
     * Set rootvalid
     *
     * @param string $rootvalid
     * @return Article
     */
    public function setRootvalid($rootvalid)
    {
        $this->rootvalid = $rootvalid;

        return $this;
    }

    /**
     * Get rootvalid
     *
     * @return string 
     */
    public function getRootvalid()
    {
        return $this->rootvalid;
    }

    /**
     * Set usernuke
     *
     * @param string $usernuke
     * @return Article
     */
    public function setUsernuke($usernuke)
    {
        $this->usernuke = $usernuke;

        return $this;
    }

    /**
     * Get usernuke
     *
     * @return string 
     */
    public function getUsernuke()
    {
        return $this->usernuke;
    }

    /**
     * Set uservalid
     *
     * @param string $uservalid
     * @return Article
     */
    public function setUservalid($uservalid)
    {
        $this->uservalid = $uservalid;

        return $this;
    }

    /**
     * Get uservalid
     *
     * @return string 
     */
    public function getUservalid()
    {
        return $this->uservalid;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set commentable
     *
     * @param boolean $commentable
     * @return Article
     */
    public function setCommentable($commentable)
    {
        $this->commentable = $commentable;

        return $this;
    }

    /**
     * Get commentable
     *
     * @return boolean 
     */
    public function getCommentable()
    {
        return $this->commentable;
    }

    /**
     * Set inmenu
     *
     * @param boolean $inmenu
     * @return Article
     */
    public function setInmenu($inmenu)
    {
        $this->inmenu = $inmenu;

        return $this;
    }

    /**
     * Get inmenu
     *
     * @return boolean 
     */
    public function getInmenu()
    {
        return $this->inmenu;
    }
}
