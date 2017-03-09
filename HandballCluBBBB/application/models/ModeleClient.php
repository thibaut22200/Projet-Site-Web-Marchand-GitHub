<?php

class ModeleClient extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function inscrireClient($DonneesPersonnelles)
	{
		return $this->db->insert('client', $DonneesPersonnelles);
	}

    public function supprimerClient($pseudoClient)
    {
        return $this->db->delete('client', array('PSEUDO' => $pseudoClient));
    }
    
    public function editerClient($Changements)
    {
        $this->db->replace('client', $Changements);
    }

	public function retournerClient($pClient)
    {
        $requete = $this->db->get_where('client', $pClient);
        return $requete->row();
    }

    public function retournerClientPseudo($pseudoClient)
    {
        $requete = $this->db->get_where('client', array('PSEUDO' => $pseudoClient));
        return $requete->row_array();
    }
} // Fin Classe