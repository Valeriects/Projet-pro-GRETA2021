<?php
require_once './controller/Frontend.php';
require_once './controller/Backend.php';

$controllerFront = new ControllerFront;
$controllerBack = new ControllerBack;


try {

    if (isset($_GET['action'])) {

        // Façon de réduire le code, faudra modifier url : http://127.0.0.1/projet_pro/index.php?controller=front&action=bio
        // et faut rajouter dans le if le $_GET['controller'] en supplément
        // $action = $_GET['action'];
        // $controllerFront->$action();


        // if ($_GET['action'] == 'index') {
        //     $controllerFront->index();
        // } elseif ($_GET['action'] == 'bio') {
        //     $controllerFront->bio();
        // } elseif ($_GET['action'] == 'press') {
        //     $controllerFront->press();
        // } elseif ($_GET['action'] == 'agenda') {
        //     $controllerFront->agenda();
        // } elseif ($_GET['action'] == 'livre') {
        //     $controllerFront->livre();
        // } elseif ($_GET['action'] == 'listeAvis') {
        //     $controllerFront->listeAvis();
        // } elseif ($_GET['action'] == 'tarifOne') {
        //     $controllerFront->tarifOne();
        // } elseif ($_GET['action'] == 'tarifTwo') {
        //     $controllerFront->tarifTwo();
        // } elseif ($_GET['action'] == 'tarifThree') {
        //     $controllerFront->tarifThree();
        // } elseif ($_GET['action'] == 'construction') {
        //     $controllerFront->construction();
        // } elseif ($_GET['action'] == 'connecte') {
        //     $controllerBack->connecte();
        // } elseif ($_GET['action'] == 'inscrire') {
        //     $controllerBack->inscrire();
        // } elseif ($_GET['action'] == 'login') {
        //     $controllerBack->login();
        // } elseif ($_GET['action'] == 'modifAvis') {
        //     if (isset($_GET['id']) && $_GET['id'] > 0) {
        //         $controllerBack->modifAvis();
        //     }
        // } elseif ($_GET['action'] == 'deleteAvis') {
        //     if (isset($_GET['id']) && $_GET['id'] > 0) {
        //         $controllerBack->deleteAvis();
        //     }
        // } elseif ($_GET['action'] == 'deco') {
        //     $controllerBack->deco();
        // } elseif ($_GET['action'] == 'contact') {
        //     $controllerBack->contact();
        // }


        // Comme il y a beaucoup de pages et de conditions, il vaut mieux un switch case
        // $action = isset($_GET['action']);


        switch ($_GET['action']) {
            case 'index':
                $controllerFront->index();
                // on doit aller vers cela car c'est la seule chose que l'on modifie et donc on peut remplace toutes mes lignes par cette méthode (car les noms des actions correspondent aux noms des méthode du controller)
                // $controllerFront->$action();
                break;
            case 'bio':
                $controllerFront->bio();
                break;
            case 'press':
                $controllerFront->press();
                break;
            case 'agenda':
                $controllerFront->agenda();
                break;
            case 'livre':
                $controllerFront->livre();
                break;
            case 'listeAvis':
                $controllerFront->listeAvis();
                break;
            case 'tarifOne':
                $controllerFront->tarifOne();
                break;
            case 'tarifTwo':
                $controllerFront->tarifTwo();
                break;
            case 'tarifThree':
                $controllerFront->tarifThree();
                break;
            case 'construction':
                $controllerFront->construction();
                break;
            case 'connecte':
                $controllerBack->connecte();
                break;
            case 'inscrire':
                $controllerBack->inscrire();
                break;
            case 'login':
                $controllerBack->login();
                break;
            case 'modifAvis':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controllerBack->modifAvis();
                };
                break;
            case 'deleteAvis':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controllerBack->deleteAvis();
                }
                break;
            case 'deco':
                $controllerBack->deco();
                break;
            case 'contact':
                $controllerBack->contact();
                break;
            default:
                $controllerFront->index();
                break;
        }
    } else {
        $controllerFront->index();
    }
} catch (Exception $e) {
    // msg erreur pour les exceptions avec la methode getMessage() attribuée à $e qui est le paramètre de catch()
    echo 'Connection failed:' . $e;

    // header('Location: ./view/404.php');

}
