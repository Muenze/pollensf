<?php

namespace Lsv\PollenBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string")
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string")
     */
    protected $firstname;

    function toExtObject() {
        $arr = array(
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'fullname' => $this->getFirstname() . " " . $this->getLastname(),
            'username' => $this->getUsername(),
            'email' => $this->getEmail()
        );

        return $arr;
    }

    /**
     * Konstruktor
     */
    function __construct()
    {
        parent::__construct();

        // custom logic
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

} 