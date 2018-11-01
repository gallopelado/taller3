<?php

include '../../datos/ReferencialDao.php';

class ReferencialControlador {
    public function getLista($entidad) {
        return ReferencialDao::getLista($entidad);        
    }
}

?>
