<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Visiteur extends CI_Controller 
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
		$this->load->library('pagination');
	}

	public function index()
    {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');
		$DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduits();
    	$DonneesInjectees['TitreDeLaPage'] = 'Accueil';

    	$this->load->view('visiteur/header', $DonneesInjectees);
    	$this->load->view('visiteur/Accueil', $DonneesInjectees);
	}            


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function creationCompte()
    {
    	$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->load->helper('assets');

		$DonneesInjectees['TitreDeLaPage'] = 'Créer un compte';
 
		// Règles du formulaire
		$this->form_validation->set_rules('pseudo','Pseudo', 'required');
		$this->form_validation->set_rules('nom','Nom', 'required');
		$this->form_validation->set_rules('prenom','Prenom', 'required');
		$this->form_validation->set_rules('mdp','Mot de passe', 'required');

		if ($this->form_validation->run() === FALSE)
		{   // formulaire non validé, on renvoie le formulaire
			$this->load->view('visiteur/header.php', $DonneesInjectees);
			$this->load->view('visiteur/creationcompte.php');
		}
		else
		{
			$DonneesPersonnelles = array(
			'pseudo' => $this->input->post('pseudo'),
			'nom' => $this->input->post('nom'),
			'prenom' => $this->input->post('prenom'),
			'adresse' => $this->input->post('adresse'),
			'codepostal' => $this->input->post('codepostal'),
			'ville' => $this->input->post('ville'),
			'mdp' => $this->input->post('mdp'));
			$this->ModeleClient->inscrireClient($DonneesPersonnelles);
			$DonneesInjectees['TitreDeLaPage'] = 'Accueil';
			redirect('Visiteur/seConnecter');
		}
	} // Ajouter Utilisateur

	public function seConnecter()
	{
	   $this->load->helper('form');
	   $this->load->library('form_validation');
	   $this->load->helper('assets');

	   $DonneesInjectees['TitreDeLaPage'] = 'Se connecter';
	 
	   $this->form_validation->set_rules('pseudo', 'Nom d\'utilisateur', 'required');
	   $this->form_validation->set_rules('mdp', 'Mot de passe', 'required');
	   // Les champs txtIdentifiant et txtMotDePasse sont requis
	   // Si txtMotDePasse non renseigné envoi de la chaine 'Mot de passe' requis
	  
		if ($this->form_validation->run() === FALSE)// échec de la validation
	    {
			// cas pour le premier appel de la méthode : formulaire non encore appelé
			$this->load->view('visiteur/header', $DonneesInjectees);
			$this->load->view('visiteur/seConnecter'); // on renvoie le formulaire
	    }
		else // formulaire validé
		{
			$utilisateur = array( // pseudo, mdp : champs de la table tabutilisateur
	    	'pseudo' => $this->input->post('pseudo'),
	    	'mdp' => $this->input->post('mdp')); // on récupère les données du formulaire de connexion
	 
			// on va chercher l'utilisateur correspondant aux pseudo et mdp saisis
			$utilisateurRetourne = $this->ModeleClient->retournerClient($utilisateur);
			if (!($utilisateurRetourne == null))
			{    // on a trouvé, identifiant et statut (droit) sont stockés en session
			    $this->session->utilisateurConnecte = $utilisateurRetourne->PSEUDO;
			    $this->session->utilisateurStatut = $utilisateurRetourne->STATUT;
			    $this->session->nomUtilisateur = $utilisateurRetourne->NOM;
			    $this->session->prenomUtilisateur = $utilisateurRetourne->PRENOM;
			    if ($this->session->utilisateurStatut == 1) 
			    {
			    	redirect('Admin/ajouterUnProduit');
			    }
			    else
			    {
			    	redirect('Visiteur/index');
			    }
			}
			else
			{    // utilisateur non trouvé on renvoie le formulaire de connexion
				$DonneesInjectees['textePop'] = 'Nom d\'utilisateur ou mot de passe incorrect';
			    $this->load->view('visiteur/header', $DonneesInjectees);
			    $this->load->view('visiteur/seConnecter');
			    $this->load->view('pops/AfficherTexte', $DonneesInjectees);
			}  
		}
	} // fin seConnecter

	public function seDeconnecter() 
	{ // destruction de la session = déconnexion
    	$this->session->sess_destroy();
    	redirect('Visiteur/index','refresh');
	}



	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function chercherProduit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');
		
		$input = $this->input->post('tag');
		$tag = explode(' ', $input);
		$DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduitsTag($tag);
    	$DonneesInjectees['TitreDeLaPage'] = 'Tous les produits';
    	$DonneesInjectees['liensPagination']= '';

    	$this->load->view('visiteur/header', $DonneesInjectees);
    	$this->load->view('visiteur/listeProduit', $DonneesInjectees);
	}

	public function listerLesProduits()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');

    	$config = array();

    	$config['first_tag_open'] = '<li>';
    	$config['first_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
    	$config['cur_tag_close'] = '</a></li>';
    	$config['next_tag_open'] = '<li>';
    	$config['next_tag_close'] = '</li>';
    	$config['prev_tag_open'] = '<li>';
    	$config['prev_tag_close'] = '</li>';
    	$config['last_tag_open'] = '<li>';
    	$config['last_tag_close'] = '</li>';
    	$config['num_tag_open'] = '<li>';
    	$config['num_tag_close'] = '</li>';

   		$config["base_url"] = site_url('Visiteur/listerLesProduits');
   		$config["total_rows"] = $this->ModeleProduit->nombreDeProduits();
   		$config["uri_segment"] = 3;
   		$config["per_page"] = 9;

   		$config['first_link'] = '<span class="glyphicon glyphicon-fast-backward"></span>';
   		$config['last_link'] = '<span class="glyphicon glyphicon-fast-forward"></span>';
   		$config['next_link'] = '<span class="glyphicon glyphicon-forward"></span>';
   		$config['prev_link'] = '<span class="glyphicon glyphicon-backward"></span>';
 		
   		$this->pagination->initialize($config);
 		
   		$noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
   		$DonneesInjectees['TitreDeLaPage'] = 'Tous les produits';
   		$DonneesInjectees["lesProduits"] = $this->ModeleProduit->retournerProduitsLimite($config["per_page"], $noPage);
   		$DonneesInjectees["liensPagination"] = $this->pagination->create_links();
 		
   		$this->load->view('visiteur/header', $DonneesInjectees);
    	$this->load->view('visiteur/listeProduit', $DonneesInjectees);
	}

	public function listerLesProduitsParCategorie($noCategorie)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');

    	$config = array();

    	$config['first_tag_open'] = '<li>';
    	$config['first_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
    	$config['cur_tag_close'] = '</a></li>';
    	$config['next_tag_open'] = '<li>';
    	$config['next_tag_close'] = '</li>';
    	$config['prev_tag_open'] = '<li>';
    	$config['prev_tag_close'] = '</li>';
    	$config['last_tag_open'] = '<li>';
    	$config['last_tag_close'] = '</li>';
    	$config['num_tag_open'] = '<li>';
    	$config['num_tag_close'] = '</li>';
    	
   		$config["base_url"] = site_url('Visiteur/listerLesProduitsParCategorie/' . $noCategorie);
   		$config["total_rows"] = $this->ModeleProduit->nombreDeProduits($noCategorie);
   		$config["uri_segment"] = 4;
   		$config["per_page"] = 9;

   		$config['first_link'] = '<span class="glyphicon glyphicon-fast-backward"></span>';
   		$config['last_link'] = '<span class="glyphicon glyphicon-fast-forward"></span>';
   		$config['next_link'] = '<span class="glyphicon glyphicon-forward"></span>';
   		$config['prev_link'] = '<span class="glyphicon glyphicon-backward"></span>';
 		
   		$this->pagination->initialize($config);
 		
   		$noPage = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
   		$DonneesInjectees['TitreDeLaPage'] = 'Tous les produits';
   	    $DonneesInjectees["lesProduits"] = $this->ModeleProduit->retournerProduitsLimite($config["per_page"], $noPage, $noCategorie);
   		$DonneesInjectees["liensPagination"] = $this->pagination->create_links();
 		
   		$this->load->view('visiteur/header', $DonneesInjectees);
    	$this->load->view('visiteur/listeProduit', $DonneesInjectees);
	}

	public function voirUnProduit($noProduit = NULL) // valeur par défaut de noArticle = NULL
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('assets');
 		$DonneesInjectees['unProduit'] = $this->ModeleProduit->retournerProduits($noProduit);

 		if (empty($DonneesInjectees['unProduit']))
 		{   // pas de produit correspondant au n°
 		    show_404();
 		}

 		$DonneesInjectees['TitreDeLaPage'] = $DonneesInjectees['unProduit']['LIBELLE'];
 		// ci-dessus, entrée ['LIBELLE'] de l'entrée ['unProduit'] de $DonneesInjectees

 		$this->load->view('visiteur/header' , $DonneesInjectees);
 		$this->load->view('visiteur/VoirUnProduit', $DonneesInjectees);
	} // voirUnArticle

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Panier ////////////////////////////////////////////////////////////// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function ajouterAuPanier($noProduit)
	{
		$this->load->helper('assets');

		$DonneesInjectees['produitPanier'] = $this->ModeleProduit->retournerProduits($noProduit);
		
		$data = array(
        'id' => $DonneesInjectees['produitPanier']['NOPRODUIT'],
        'qty' => 1,
        'price' => $DonneesInjectees['produitPanier']['PRIXHT'],
        'name' => $DonneesInjectees['produitPanier']['LIBELLE'],
        'img' => $DonneesInjectees['produitPanier']['NOMIMAGE']);

		$this->cart->insert($data);

		redirect('Visiteur/listerLesProduits','refresh');
	}

	public function voirPanier()
	{
		$this->load->helper('form');
		$this->load->helper('assets');

		$Donnees['panier'] = $this->cart->contents();
		$Donnees['TitreDeLaPage'] = 'Panier';

		$this->load->view('visiteur/header' , $Donnees);
		$this->load->view('visiteur/panier', $Donnees);
	}

	public function quantitePlus($id, $qty)
	{
		$data = array(
        'rowid' => $id,
        'qty'   => $qty + 1);

		$this->cart->update($data);

		redirect('Visiteur/voirPanier','refresh');
	}

	public function quantiteMoins($id, $qty)
	{
		$data = array(
        'rowid' => $id,
        'qty'   => $qty - 1);

		$this->cart->update($data);

		redirect('Visiteur/voirPanier','refresh');
	}

	public function retirerArticle($id)
	{
		$data = array(
        'rowid' => $id,
        'qty'   => 0);

		$this->cart->update($data);

		redirect('Visiteur/voirPanier','refresh');
	}

	public function viderPanier()
	{
		$this->cart->destroy();

		redirect('Visiteur/listerLesProduits','refresh');
	}	
}
?>