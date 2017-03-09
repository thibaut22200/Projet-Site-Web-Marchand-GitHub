<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css">
    <link href="<?php echo css_url('style') ?>" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Handball Club</title>
</head>
<body>
  <style type="text/css">
  body
  {
    background-image: url(<?php echo img_url('bg2.jpg');?>);
    background-attachment: fixed;
    background-size: cover;
    font-family: Arial;
  }
  </style>  



    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo site_url('Visiteur/index') ?>"> Handball Club <img style="width: 60px; height: auto; margin-top: -40px; margin-left: 120px;" class="media-object" src="<?php echo img_url('logo.png')?>"></a>
            </div>

            <ul class="nav navbar-nav">
                <?php 
                if ($this->session->utilisateurStatut == 1) : //Si Admin ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">     Ajouter<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('Admin/ajouterUnProduit') ?>">Ajouter un produit</a></li>
                            <li><a href="<?php echo site_url('Admin/ajouterUneCategorie') ?>">Ajouter une catégorie</a></li>
                            <li><a href="<?php echo site_url('Admin/ajouterUneMarque') ?>">Ajouter une marque</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">     Gérer<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('Visiteur/listerLesProduits');?>">Gérer les produits</a></li>
                            <li><a href="<?php echo site_url('Admin/editerCategories') ?>">Gérer les catégories</a></li>
                            <li><a href="<?php echo site_url('Admin/editerMarques') ?>">Gérer les marques</a></li>
                            <li><a href="<?php echo site_url('Admin/listerClients') ?>">Gérer les utilisateurs</a></li>
                        </ul>
                    </li>

                <?php endif; ?>     

                <?php if (is_null($this->session->utilisateurConnecte)) : //Si un utilisateur n'est pas connecté ?>
                    <li><a href="<?php echo site_url('Visiteur/creationCompte') ?>">Créer un compte</a></li>
                    <li><a href="<?php echo site_url('Visiteur/seconnecter') ?>">Se connecter</a></li>
                <?php else : ?>
                    <li><a href="<?php echo site_url('Visiteur/seDeconnecter') ?>">Se déconnecter</a></li>
                <?php endif; ?>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Produits
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Visiteur/listerLesProduits');?>">Tous les produits</a></li>
                        <li><a href="<?php echo site_url('Visiteur/listerLesProduitsParCategorie/1');?>">Chaussures</a></li>
                        <li><a href="<?php echo site_url('Visiteur/listerLesProduitsParCategorie/2');?>">Vêtements</a></li>
                        <li><a href="<?php echo site_url('Visiteur/listerLesProduitsParCategorie/3');?>">Ballons</a></li>
                        <li><a href="<?php echo site_url('Visiteur/listerLesProduitsParCategorie/4');?>">Equipements</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('Visiteur/voirPanier') ?>">Panier <span class="badge"><?php echo count($this->cart->contents());?></span></a></li>
            <?php 
            echo validation_errors();
            echo form_open('Visiteur/chercherProduit', array('class' => "navbar-form navbar-left")); ?>
                <div class="form-group">
                    <input name="tag" type="text" class="form-control" placeholder="Rechercher produit">
                </div>
                <button type="submit" class="btn btn-info">Rechercher</button>
            </form>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if (!is_null($this->session->utilisateurConnecte)) : //Si un utilisateur est connecté ?>
                    <li style="margin-top: 15px; margin-right: 15px;"><?php echo "Connecté en tant que : " . $this->session->nomUtilisateur . " " . $this->session->prenomUtilisateur; ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2><?php echo $TitreDeLaPage ?></h2>
