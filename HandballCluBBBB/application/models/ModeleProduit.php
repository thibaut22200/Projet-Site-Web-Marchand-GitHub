<?php

class ModeleProduit extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        /* chargement database.php (dans config), obligatoirement dans le constructeur */
    }


    public function inscrireProduit($DonneesPersonnelles)
    {
        return $this->db->insert('produit', $DonneesPersonnelles);
    }

    public function supprimerProduit($noProduit)
    {
        return $this->db->delete('produit', array('NOPRODUIT' => $noProduit));
    }

    public function editerProduit($Changements)
    {
        $this->db->replace('produit', $Changements);
    }

    public function retournerProduits($pNoProduit = FALSE)
    {

        if ($pNoProduit === FALSE) // pas de n° de produit en paramètre
        {  // on retourne tous les produits
            $requete = $this->db->select('*')->from('produit')
                                ->order_by('NOPRODUIT', 'ASC')
                                ->get();
            return $requete->result_array(); // retour d'un tableau associatif
        }
        // ici on va chercher le produit dont l'id est $pNoProduit
        $requete = $this->db->get_where('produit', array('NOPRODUIT' => $pNoProduit));
        return $requete->row_array(); // retour d'un tableau associatif
    }

    public function retournerProduitsTag($tag)
    {
        foreach ($tag as $tagg)
        {
            $this->db->like('LIBELLE', $tagg); 
        }
        $requete = $this->db->get('produit');

        if ($requete->num_rows() > 0) 
        { // si nombre de lignes > 0
            foreach ($requete->result() as $ligne) 
            {
                $jeuDEnregsitrements[] = $ligne;
            }
            return $jeuDEnregsitrements;
        } // fin if
        return false;
    }

    public function retournerProduitsCategorie($categorie)
    {
        $requete = $this->db->select('*')
                            ->from('produit')
                            ->where('NOCATEGORIE', $categorie)
                            ->get();
        return $produits = $requete->result_array();
    }


    public function retournerProduitsLimite($nombredeProduits, $noPage, $noCategorie = NULL)
    {
        if ($noCategorie == NULL) 
        {
            $this->db->limit($nombredeProduits, $noPage);
            $requete = $this->db->get('produit');
        }
        else
        {
            $this->db->where('NOCATEGORIE', $noCategorie);
            $this->db->limit($nombredeProduits, $noPage);

            $requete = $this->db->get('produit');
        }
      
        if ($requete->num_rows() > 0) 
        { // si nombre de lignes > 0
            foreach ($requete->result() as $ligne) 
            {
                $jeuDEnregsitrements[] = $ligne;
            }
            return $jeuDEnregsitrements;
        } // fin if
        return false;
    }

    public function nombreDeProduits($noCategorie = NULL) 
    { // méthode utilisée pour la pagination
        if ($noCategorie == NULL) 
        {
            return $this->db->count_all('produit');
        }
        else
        {
            $this->db->where('NOCATEGORIE', $noCategorie);
            $this->db->from('produit');
            return $this->db->count_all_results();
        }
    }
} // Fin Classe