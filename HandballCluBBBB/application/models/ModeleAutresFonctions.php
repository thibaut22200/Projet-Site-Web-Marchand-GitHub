<?php

class ModeleAutresFonctions extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        /* chargement database.php (dans config), obligatoirement dans le constructeur */

    }

    public function retournerTable($table)
    {
        $requete = $this->db->select('*')->from($table)
                                ->order_by('1', 'ASC')
                                ->get();
        return $requete->result_array(); // retour d'un tableau associatif
    }

    public function retournerChamps($table)
    {
        $lesTitres = $this->db->list_fields($table);
        return $lesTitres;
    }
} // Fin Classe