<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var int
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=100)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;
    
    /**
     * @var \Doctrine\Common\Collections\Collection|Mascota[] 
     * 
     * @ORM\OneToMany(targetEntity="Mascota", mappedBy="usuario")
     */
    private $mascotas;

    public function __construct(){
        $this->mascotas = new ArrayCollection();
    }

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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
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
     * Add mascotas
     *
     * @param \ApiBundle\Entity\Mascota $mascotas
     * @return Usuario
     */
    public function addMascota(\ApiBundle\Entity\Mascota $mascotas)
    {
        $this->mascotas[] = $mascotas;

        return $this;
    }

    /**
     * Remove mascotas
     *
     * @param \ApiBundle\Entity\Mascota $mascotas
     */
    public function removeMascota(\ApiBundle\Entity\Mascota $mascotas)
    {
        $this->mascotas->removeElement($mascotas);
    }

    /**
     * Get mascotas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMascotas()
    {
        return $this->mascotas;
    }
}
