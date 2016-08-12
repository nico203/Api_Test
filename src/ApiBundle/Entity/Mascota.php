<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mascota
 *
 * @ORM\Table(name="mascota")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\MascotaRepository")
 */
class Mascota
{
    /*
     * Tamanos
     */
    const TAMANO_PEQUENO = 'pequeño';
    const TAMANO_MEDIANO = 'mediano';
    const TAMANO_GRANDE = 'grande';
    
    /*
     * Situaciones
     */
    const SITUACION_PERDIDO = 'perdido';
    const SITUACION_CALLE = 'calle';
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="float")
     */
    private $latitud;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float")
     */
    private $longitud;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var array
     *
     * @ORM\Column(name="tamano", type="string", length=8)
     */
    private $tamano;

    /**
     * @var array
     *
     * @ORM\Column(name="situacion", type="string", length=8)
     */
    private $situacion;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=20)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="comentarios", type="string", length=255)
     */
    private $comentarios;
    
    /**
     * @var Usuario 
     * 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="mascotas")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", nullable=false)
     */
    private $usuario;


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
     * Set latitud
     *
     * @param float $latitud
     * @return Mascota
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     * @return Mascota
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Mascota
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
     * Set tamano
     *
     * @param array $tamano
     * @return Mascota
     */
    public function setTamano($tamano)
    {
        if (!in_array($tamano, array(
            self::TAMANO_GRANDE, 
            self::TAMANO_MEDIANO,
            self::TAMANO_PEQUENO
        ))) {
            throw new \InvalidArgumentException("Tamaño inválido");
        }
        $this->tamano = $tamano;

        return $this;
    }

    /**
     * Get tamano
     *
     * @return array 
     */
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * Set situacion
     *
     * @param array $situacion
     * @return Mascota
     */
    public function setSituacion($situacion)
    {
        if (!in_array($situacion, array(
            self::SITUACION_CALLE, 
            self::SITUACION_PERDIDO
        ))) {
            throw new \InvalidArgumentException("Situación inválida");
        }
        $this->situacion = $situacion;

        return $this;
    }

    /**
     * Get situacion
     *
     * @return array 
     */
    public function getSituacion()
    {
        return $this->situacion;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Mascota
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return Mascota
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set usuario
     *
     * @param \ApiBundle\Entity\Usuario $usuario
     * @return Mascota
     */
    public function setUsuario(\ApiBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \ApiBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
