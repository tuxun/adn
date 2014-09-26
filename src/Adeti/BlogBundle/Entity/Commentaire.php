<?php

namespace Adeti\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Adeti\BlogBundle\Entity\CommentaireRepository")
 */
class Commentaire
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

     *
     * @ORM\Column(name="id_article", type="integer")
     */
  /**
   * @var integer
   * @ORM\ManyToOne(targetEntity="Adeti\BlogBundle\Entity\Article")
   * @ORM\JoinColumn(nullable=true)
   */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

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
     * @var integer
     *
     * @ORM\Column(name="reponseto", type="integer")
     */
    private $reponseto;


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
     * Set idArticle
     *
     * @param integer $idArticle
     * @return Commentaire
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return integer 
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Commentaire
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
     * Set message
     *
     * @param string $message
     * @return Commentaire
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Commentaire
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
     * @return Commentaire
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
     * @return Commentaire
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
     * @return Commentaire
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
     * @return Commentaire
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
     * @return Commentaire
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
     * Set reponseto
     *
     * @param integer $reponseto
     * @return Commentaire
     */
    public function setReponseto($reponseto)
    {
        $this->reponseto = $reponseto;

        return $this;
    }

    /**
     * Get reponseto
     *
     * @return integer 
     */
    public function getReponseto()
    {
        return $this->reponseto;
    }
}
