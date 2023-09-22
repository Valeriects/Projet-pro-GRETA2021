<?php
require_once './model/Users.php';

class ControllerFront
{
    // afficher la page index:
    public function index()
    {
        $data = new User;
        $new = $data->afficheAccueil();

        require_once './view/indexView.php';
    }



    // afficher la page briographie:
    public function bio()
    {
        require_once './view/biographie.php';
    }



    // afficher la page presse:
    public function press()
    {
        require_once './view/revue-press.php';
    }



    // afficher la page agenda:
    public function agenda()
    {
        require_once './view/agenda.php';
    }



    // afficher la page livres:
    public function livre()
    {
        require_once './view/livre.php';
    }



    // afficher la page tarif de l'éveil:
    public function tarifOne()
    {
        require_once './view/tarifs_1.php';
    }



    // afficher la page tarif de l'ascension:
    public function tarifTwo()
    {
        require_once './view/tarifs_2.php';
    }



    // afficher la page tarif de l'illumination:
    public function tarifThree()
    {
        require_once './view/tarifs_3.php';
    }



    // afficher la page en construction:
    public function construction()
    {
        require_once './view/construction.php';
    }



    // afficher la page de tous les avis:
    public function listeAvis()
    {
        $livre = new User;
        $tome = $livre->getLivre();

        $afficheAvis = new User;
        if (empty($_GET['id'])) {

            $liste = $afficheAvis->getAvis();
        } elseif (isset($_GET['id'])) {

            $liste = $livre->getAvisTomeOne($_GET['id']);
        }

        require_once './view/avis.php';
    }
}
