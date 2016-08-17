<?php

namespace ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MascotaRepository extends EntityRepository
{
    public function ordenarMascotas($latitud, $longitud) {
        $query = "SELECT id, latitud, longitud, nombre, tamano, situacion, color, comentarios, "
                . "SQRT(POWER(m.latitud - :latitud, 2) + POWER(m.longitud - :longitud, 2)) as distancia "
                . "FROM mascota m "
                . "ORDER BY distancia";
        $stm = $this->getEntityManager()->getConnection()->prepare($query);
        $stm->bindParam('longitud', $longitud);
        $stm->bindParam('latitud', $latitud);
        $stm->execute();
        
        return $stm->fetchAll();
    }
}
