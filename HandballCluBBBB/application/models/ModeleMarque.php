<?php

class ModeleMarque extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        /* chargement database.php (dans config), obligatoirement dans le constructeur */
    }

    public function inscrireMarque($DonneesPersonnelles)
	{
		return $this->db->insert('marque', $DonneesPersonnelles);
	}

	public function supprimerMarque($noMarque)
	{
		return $this->db->delete('marque', array('NOMARQUE' => $noMarque));
	}
} // Fin Classe