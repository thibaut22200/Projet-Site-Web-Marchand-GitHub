<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModeleCategorie');
		$this->load->model('ModeleClient');
		$this->load->model('ModeleCommande');
		$this->load->model('ModeleLigne');
		$this->load->model('ModeleMarque');
		$this->load->model('ModeleProduit');
		$this->load->model('ModeleAutresFonctions');
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////Ajouter//////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function ajouterUnProduit()
	{
    	$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->load->helper('assets');

		$DonneesInjectees['lesCategories'] = $this->ModeleAutresFonctions->retournerTable('categorie');
		$DonneesInjectees['lesMarques'] = $this->ModeleAutresFonctions->retournerTable('marque');
		$DonneesInjectees['TitreDeLaPage'] = 'Ajouter un produit';
 
		// Règles du formulaire
		$this->form_validation->set_rules('catlist','numCat', 'required');
		$this->form_validation->set_rules('marquelist','numMarque', 'required');
		$this->form_validation->set_rules('libelle','libelle', 'required');
		$this->form_validation->set_rules('detail','detail', 'required');
		$this->form_validation->set_rules('prixHT','prixHT', 'required');
		$this->form_validation->set_rules('tauxTVA','tauxTVA', 'required');
		$this->form_validation->set_rules('nomImg','nomImg', 'required');
		$this->form_validation->set_rules('quantite','quantite', 'required');


		if ($this->form_validation->run() === FALSE)
		{   // formulaire non validé, on renvoie le formulaire
			$this->load->view('visiteur/header.php', $DonneesInjectees);
			$this->load->view('admin/ajouterUnProduit.php', $DonneesInjectees);
		}
		else
		{
			$DonneesPersonnelles = array(
			'NOCATEGORIE' => $this->input->post('catlist'),
			'NOMARQUE' => $this->input->post('marquelist'),
			'LIBELLE' => $this->input->post('libelle'),
			'DETAIL' => str_replace(array("\r\n", "\n"), '<br>', $this->input->post('detail')),
			'PRIXHT' => $this->input->post('prixHT'),
			'TAUXTVA' => $this->input->post('tauxTVA'),
			'NOMIMAGE' => $this->input->post('nomImg'),
			'QUANTITEENSTOCK' => $this->input->post('quantite'),
			'DATEAJOUT' => date("Y-m-d"));

			$this->ModeleProduit->inscrireProduit($DonneesPersonnelles);

			echo'<script>alert("Ajout éffectué");</script>';
			redirect('Admin/ajouterUnProduit','refresh');
		}
	} // Fin Ajouter Produit


	public function ajouterUneCategorie()
    {
    	$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->load->helper('assets');
 
		$DonneesInjectees['TitreDeLaPage'] = 'Ajouter une catégorie';

		// Règles du formulaire
		$this->form_validation->set_rules('nomCat','nomCat', 'required');


		if ($this->form_validation->run() === FALSE)
		{   // formulaire non validé, on renvoie le formulaire
			$this->load->view('visiteur/header.php', $DonneesInjectees);
			$this->load->view('admin/ajouterUneCategorie.php');
		}
		else
		{
			$DonneesPersonnelles = array(
			'LIBELLE' => $this->input->post('nomCat'));

			$this->ModeleCategorie->inscrireCategorie($DonneesPersonnelles);
			
			echo'<script>alert("Catégorie ajoutée");</script>';
			redirect('Admin/ajouterUneCategorie','refresh');
		}
	} // Fin Ajouter Categorie

	public function ajouterUneMarque()
    {
    	$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->load->helper('assets');
 
		$DonneesInjectees['TitreDeLaPage'] = 'Ajouter une marque';

		// Règles du formulaire
		$this->form_validation->set_rules('nomMarque','nomMarque', 'required');


		if ($this->form_validation->run() === FALSE)
		{   // formulaire non validé, on renvoie le formulaire
			$this->load->view('visiteur/header.php', $DonneesInjectees);
			$this->load->view('admin/ajouterUneMarque.php');
		}
		else
		{
			$DonneesInjectees['textePop'] = 'Ajout éffectué...';

			$DonneesPersonnelles = array(
			'NOM' => $this->input->post('nomMarque'));

			$this->ModeleMarque->inscrireMarque($DonneesPersonnelles);
			
			$this->load->view('visiteur/header.php', $DonneesInjectees);
			$this->load->view('admin/ajouterUneMarque.php', $DonneesInjectees);
			$this->load->view('pops/AfficherTexte', $DonneesInjectees);
		}
	} // Fin Ajouter Categorie

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//									 			Edition/Suppression
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function supprimerUnClient($pseudoClient)
	{
		$this->ModeleClient->supprimerClient($pseudoClient);
		echo'<script>alert("Suppression éffectuée");</script>';
		redirect('Admin/listerClients','refresh');
	}

	public function listerClients()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');

 		$DonneesInjectees['clients'] = $this->ModeleAutresFonctions->retournerTable('client');
 		$DonneesInjectees['lesTitres'] = $this->ModeleAutresFonctions->retournerChamps('client');
 		$DonneesInjectees['TitreDeLaPage'] = 'Gérer les clients';

 		$this->load->view('visiteur/header' , $DonneesInjectees);
 		$this->load->view('admin/listerClients', $DonneesInjectees);
 	}

 	public function modifierUnClient($pseudoClient)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');

 		$DonneesInjectees['unClient'] = $this->ModeleClient->retournerClientPseudo($pseudoClient);
 		$DonneesInjectees['TitreDeLaPage'] = $DonneesInjectees['unClient']['PSEUDO'];

 		$this->form_validation->set_rules('pseudo','Pseudo', 'required');
 		$this->form_validation->set_rules('nom','Prenom', 'required');
 		$this->form_validation->set_rules('prenom','Prenom', 'required');
 		$this->form_validation->set_rules('adresse','Adresse', 'required');
 		$this->form_validation->set_rules('codePostal','Code Postal', 'required');
 		$this->form_validation->set_rules('ville','Ville', 'required');
 		$this->form_validation->set_rules('mdp','Mot de passe', 'required');
 		$this->form_validation->set_rules('statut','Statut', 'required');


 		if ($this->form_validation->run() === FALSE) 
 		{
 		$this->load->view('visiteur/header', $DonneesInjectees);
 		$this->load->view('admin/modifierUnClient', $DonneesInjectees);
 		}

 		else
 		{
 		$Changements = array(
 			'PSEUDO' => $this->input->post('pseudo'),
 			'NOM' => $this->input->post('nom'),
 			'PRENOM' => $this->input->post('prenom'),
 			'ADRESSE' => $this->input->post('adresse'),
 			'CODEPOSTAL' => $this->input->post('codePostal'),
 			'VILLE' => $this->input->post('ville'),
 			'MDP' => $this->input->post('mdp'),
 			'STATUT' => $this->input->post('statut'));

 		$this->ModeleClient->editerClient($Changements);

 		echo'<script>alert("Modification éffectuée");</script>';
		redirect('Admin/listerClients','refresh');
 		}
	}
 	
	public function supprimerUnProduit($noProduit)
	{
		$this->ModeleProduit->supprimerProduit($noProduit);
		echo'<script>alert("Suppression éffectuée");</script>';
		redirect('Visiteur/listerLesProduits','refresh');
	}

	public function modifierUnProduit($noProduit)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');

 		$DonneesInjectees['unProduit'] = $this->ModeleProduit->retournerProduits($noProduit);
 		$DonneesInjectees['TitreDeLaPage'] = $DonneesInjectees['unProduit']['LIBELLE'];

 		if (empty($DonneesInjectees['unProduit']))
 		{   // pas de produit correspondant au n°
 		    show_404();
 		}

 		$this->form_validation->set_rules('noProduit','Produit', 'required');
 		$this->form_validation->set_rules('noCategorie','Categorie', 'required');
 		$this->form_validation->set_rules('noMarque','Marque', 'required');
 		$this->form_validation->set_rules('libelle','Libelle', 'required');
 		$this->form_validation->set_rules('detail','Detail', 'required');
 		$this->form_validation->set_rules('prixHT','Prix HT', 'required');
 		$this->form_validation->set_rules('tauxTVA','Taux TVA', 'required');
 		$this->form_validation->set_rules('nomImg','Nom Image', 'required');
 		$this->form_validation->set_rules('quantite','Quantite', 'required');
 		$this->form_validation->set_rules('dateAjout','Date Ajout', 'required');


 		if ($this->form_validation->run() === FALSE) 
 		{
 		$this->load->view('visiteur/header' , $DonneesInjectees);
 		$this->load->view('admin/modifierUnProduit', $DonneesInjectees);
 		}

 		else
 		{
 		$Changements = array(
 			'NOPRODUIT' => $this->input->post('noProduit'),
 			'NOCATEGORIE' => $this->input->post('noCategorie'),
 			'NOMARQUE' => $this->input->post('noMarque'),
 			'LIBELLE' => $this->input->post('libelle'),
 			'DETAIL' => $this->input->post('detail'),
 			'PRIXHT' => $this->input->post('prixHT'),
 			'TAUXTVA' => $this->input->post('tauxTVA'),
 			'NOMIMAGE' => $this->input->post('nomImg'),
 			'QUANTITEENSTOCK' => $this->input->post('quantite'),
 			'DATEAJOUT' => $this->input->post('dateAjout'));

 		$this->ModeleProduit->editerProduit($Changements);

 		echo'<script>alert("Modification éffectuée");</script>';
		redirect('Visiteur/listerLesProduits','refresh');
 		}
	}

	public function editerMarques()
    {
    	$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->load->helper('assets');

		$DonneesInjectees['TitreDeLaPage'] = 'Editer les marques';
		$DonneesInjectees['lesMarques'] = $this->ModeleAutresFonctions->retournerTable('marque');
		$DonneesInjectees['lesTitres'] = $this->ModeleAutresFonctions->retournerChamps('marque');

		$this->form_validation->set_rules('numMarque','Marque', 'required');
		$this->form_validation->set_rules('nom','Nom', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('visiteur/header.php', $DonneesInjectees);
			$this->load->view('admin/editerMarques.php', $DonneesInjectees);
		}
		else
		{
			$noMarque = $this->input->post('numMarque');
			$this->ModeleMarque->supprimerMarque($noMarque);
			
			echo "<script>alert('Suppression éffectuée...');</script>";
			redirect('Admin/editerMarques','refresh');
		}
	} // Fin Editer Marques

	public function editerCategories()
    {
    	$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->load->helper('assets');

		$DonneesInjectees['TitreDeLaPage'] = 'Editer les catégories';
		$DonneesInjectees['lesCategories'] = $this->ModeleAutresFonctions->retournerTable('categorie');
		$DonneesInjectees['lesTitres'] = $this->ModeleAutresFonctions->retournerChamps('categorie');

		$this->form_validation->set_rules('numCategorie','Categorie', 'required');
		$this->form_validation->set_rules('libelle','Libelle', 'required');
 
		if ($this->form_validation->run() === FALSE)
		{   // formulaire non validé, on renvoie le formulaire
			$this->load->view('visiteur/header.php', $DonneesInjectees);
			$this->load->view('admin/editerCategories.php', $DonneesInjectees);
		}
		else
		{
			$noMarque = $this->input->post('numCategorie');

			$this->ModeleCategorie->supprimerCategorie($noCategorie);
			
			echo "<script>alert('Suppression éffectuée...');</script>";
			redirect('Admin/editerCategories','refresh');
		}
	} // Fin Editer Categories

} //Fin Classe