<?php

class ModeleCategorie extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        /* chargement database.php (dans config), obligatoirement dans le constructeur */
    }

    public function inscrireCategorie($DonneesPersonnelles)
	{
		return $this->db->insert('categorie', $DonneesPersonnelles);
	}

	public function supprimerCategorie($noCategorie)
	{
		return $this->db->delete('categorie', array('NOCATEGORIE' => $noCategorie));
	}
} // Fin Classe