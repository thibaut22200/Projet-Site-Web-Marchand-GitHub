<?php

class ModeleCommande extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        /* chargement database.php (dans config), obligatoirement dans le constructeur */
    }
} // Fin Classe