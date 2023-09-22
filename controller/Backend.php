<?php
session_start();

require_once './model/Users.php';
require_once './model/Form.php';

class ControllerBack
{
    // s'inscrire au compte :
    public function inscrire()
    {
        $action = "./index.php?action=inscrire";
        $method = "post";
        $id = 'inscription';
        $class = "formulaire";

        $form = new Form($action, $method, $id, $class);
        $form
            ->addTextField('nom', 'text', 'Votre nom', 'inputInscription', 'labelInscription', 'Votre nom :')
            ->addTextField('prenom', 'text', 'Votre prénom', 'inputInscription', 'labelInscription', 'Votre prénom :')
            ->addTextField('pseudo', 'text', 'Votre pseudo', 'inputInscription', 'labelInscription', 'Votre pseudo :')
            ->addTextField('password', 'password', '8 caractères : min, maj, num et caract spéciaux', 'inputInscription', 'labelInscription', 'Votre mot de passe :')
            ->addTextField('password2', 'password', '8 caractères : min, maj, num et caract spéciaux', 'inputInscription', 'labelInscription', 'Votre confirmation du mot de passe :')
            ->addSubmitButton('Inscription', 'btninscription');

        $insc = new User;

        if (isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['password'], $_POST['password2'])) {
            $nom = cleanText($_POST['nom']);
            $prenom = cleanText($_POST['prenom']);
            $pseudo = cleanText($_POST['pseudo']);
            $password = $_POST['password'];
            $confirmPwd = $_POST['password2'];

            $tableau = $insc->verifPseudo($pseudo);

            if ($pseudo === $tableau['0']["user_pseudo"]) {

                $_SESSION['erreur1'] = 'Votre pseudo : ' . $pseudo . ' est déjà prit, essayez en un autre.';
                header('Location: ./index.php?action=inscrire');
                // pour arreter :
                exit;
            }

            //FIN code pour compararer si on a le meme pseudo deja dans la base de données !!!
            // si les champs ont des données:
            if ($nom && $prenom && goodPseudo($pseudo) && goodPassword($password, $confirmPwd)) {

                $insc->inscriptionUser($nom, $prenom, $pseudo, $password);

                $_SESSION['infoLogin'] = '<div>Votre nom : ' . $nom . '</div><div>Votre prénom : ' . $prenom . '</div><div>Votre pseudo : ' . $pseudo . '</div><br>';

                $_SESSION['okinscrit'] = 'Vous êtes bien inscrit. Vous pouvez vous connecter. <br>';

                header('Location: ./index.php?action=connecte');
                exit;
            } else {
                $_SESSION['erreurInscription'] = "Vous n'avez pas utilisé tous les champs requis.<br>";
                header('Location: /projet_pro/view/inscription.pp');
                exit;
            }
        }

        require_once './view/inscription.php';
    }



    // se connecter au compte :
    public function connecte()
    {
        $action = "./index.php?action=connecte";
        $method = "post";
        $id = 'inscription';
        $class = "formulaire";

        $form = new Form($action, $method, $id, $class);

        // $token = bin2hex(random_bytes(32));

        $form
            // ->inputHidden('token', 'hidden', '', '', $token)
            ->addTextField('pseudo', 'text', 'Votre pseudo', 'inputInscription', 'labelInscription', 'Votre pseudo :')
            ->addTextField('password', 'password', '8 caractères : min, maj, num et caract spéciaux', 'inputInscription', 'labelInscription', 'Votre mot de passe :')
            ->addSubmitButton('Connexion', 'btnConnecte');


        // $_SESSION['token'] = $token;

        $connexion = new User;

        // if (isset($_POST['pseudo'], $_POST['password'], $_POST['token'])) {
        if (isset($_POST['pseudo'], $_POST['password'])) {

            $pseudo = cleanText($_POST['pseudo']);
            $password = $_POST['password'];
            $pwd = goodPwd($password);

            $userData = $connexion->connexionUser($pseudo);
            // var_dump($userData);



            if (empty($userData) && !password_verify($pwd, $userData['user_password'])) {


                // if (empty($userData) && !password_verify($pwd, $userData['user_password'])) {
                // if ((empty($userData) && !password_verify($pwd, $userData['user_password'])) || $_SESSION['token'] !== $_POST['token']) {
                // if (empty($userData) && !password_verify($pwd, $userData['user_password'])) {

                $_SESSION['erreur24'] = "Votre pseudo : '$pseudo' ou votre mot de passe : '$password' ne sont pas valides";


                // if (empty($_POST['pseudo']) || empty($_POST['password'])) {
                //     $_SESSION['erreur24'] = false;
                //     // $_SESSION['erreur24'] = "Votre pseudo : '$pseudo' ou votre mot de passe : '$password' ne sont pas valides";
                // } else {
                //     $_SESSION['erreur24'] =  true;
                // }

                header('Location: index.php?action=connecte');
                // exit;
            } else {

                $_SESSION['ok'] = 'Bienvenue <strong>' . $pseudo . '</strong> dans votre session de compte ! <br>Ici, vous pourrez écrire, modifier et supprimer vos avis, sur les oeuvres d\'Anthony Lucchini.<br>';

                $_SESSION['infoLogin'] = '<div>Vos infos :</div>
                <div><p>Votre nom :</p> <p class="bold">' . $userData['user_nom'] . ' </p></div>
                <div><p>Votre prénom : </p><p class="bold">' . $userData['user_prenom'] . '</p></div>
                <div><p>Vous êtes inscrit depuis le : </p><p class="bold">' . $userData['user_date'] . '</p></div>';

                $_SESSION['idUser'] = $userData['id_user'];

                header('Location: index.php?action=login');
                exit;
            }
        }
        require './view/connecte.php';
    }


    // se déconnecter du compte:
    public function deco()
    {
        require_once './view/deconnexion.php';
    }


    // afficher la page du compte:
    public function login()
    {
        $conn = new User;

        $livre = $conn->readLivre();

        $avis = $conn->afficheAvis($_SESSION['idUser']);

        if (isset($_SESSION['idUser'], $_POST['livre'], $_POST['message'])) {

            $conn->createAvis($_SESSION['idUser'], $_POST['livre'], $_POST['message']);

            header('Location: index.php?id=' . $_SESSION['idUser'] . '&action=login');
        }

        require_once './view/login.php';
    }


    // normalement ond evrais mettre le crud des avis dans un autre fichier controller avis :
    // modifier un avis du compte:
    public function modifAvis()
    {
        $avis = new User;
        $result = $avis->getAvisInput($_GET['id']);

        if ($_GET['id'] && isset($_POST['modif'])) {

            $msg = cleanText($_POST['msg']);

            $avis->upAvisInput($msg, $_GET['id']);

            header('Location: index.php?id=' . $_GET['id'] . '&action=modifAvis&modif=success');
        }

        require_once './view/loginAvis.php';
    }



    // supprimer un avis du compte:
    public function deleteAvis()
    {
        $avis = new User;
        $result = $avis->getAvisInput($_GET['id']);

        if (isset($_POST['delete']) && !empty($_GET['id'])) {

            $avis->deleteAvis($_GET['id']);
            header('Location: index.php?id=' . $_GET['id'] . '&action=deleteAvis');
            exit();
        }

        require_once './view/deleteAvis.php';
    }


    // normalement on devrais mettre contact dans un autre fichier controller contact :
    // page contact:
    public function contact()
    {
        $contact = new User;

        if (isset($_POST['organisme']) && $_POST['adresse'] && $_POST['pays'] && $_POST['telephone'] && $_POST['email'] && $_POST['Message']) {

            $org = cleanText($_POST['organisme']);
            $adresse = cleanText($_POST['adresse']);
            $pays = cleanText($_POST['pays']);
            $tel = $_POST['telephone'];
            $email = $_POST['email'];

            // on y met le vrai nom du fichier téléchargé:
            $pj = $_FILES['filename']['name'];

            $pj_text = cleanText($_POST['Message']);

            // $chemindossier = './public/piece_jointe';
            $chemindossier = './public/piece_jointe';
            // basename est le nom de base du fichier
            $rename = basename($_FILES['filename']['name']);

            move_uploaded_file($_FILES['filename']['tmp_name'], "$chemindossier/$rename");

            $lienfichier = "$chemindossier/$rename";

            if ($pj_text && $org && $adresse && $pays && goodTel($tel) && goodMail($email)) {

                $contact->contactMailPro($org, $adresse, $pays, $tel, $email, $pj, $pj_text);

                $destinataire = "darkzombrelle@gmail.com";

                $sujet = "Test envois piece jointe" . date("Y/m/d H:i:s");

                // on créé un boundary unique:
                $boundary = md5(uniqid(rand(), true));
                // $boundary = md5(time());

                // eol = end of line:
                $eol = "\r\n";

                // les entêtes: 
                $entetes = "From: LKilousse@gmail.com" . $eol;
                /* ***** on doit mettre les .= au reste sinon, le $entetes perd chaque données qu'on lui a rentrée précédemment ****/
                $entetes .= 'MIME-Version: 1.0' . $eol;
                $entetes .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"' . $eol;
                $entetes .= 'Content-Transfer-Encoding: 7bit'  . $eol;

                $corp = 'This is a multi-part message in MIME format.'  . $eol;
                /* ***** on doit mettre les .= au reste sinon, le $corp perd chaque données qu'on lui a rentrée précédemment ****/
                $corp .= '--' . $boundary  . $eol;

                // première partie corps du mail en HTML avec text/html ou pas (texte brute) avec text/plain:
                $corp .= 'Content-Type: text/html; charset=utf-8'  . $eol;
                $corp .= 'Content-Transfer-Encoding: 8bit'  . $eol;

                // on remet un second retour à la ligne pour signifier la fin des entête :
                $corp .= $eol;

                // enfin on met le texte du mail (ici en html vu qu'on a défini le Content-Type sur text/html)

                $corp .= "<p>Contact: </p>
                <p>Nom de l'organimse : $org</p>
                <p>Adresse : $adresse</p>
                <p>Pays : $pays</p>
                <p>Téléhpone : $tel</p>
                <p>E-mail: $email</p>
                <p>Nom de la pièce-jointe : $pj</p>
                <p>Message : $pj_text</p>";

                // le texte du mail est fini, on remet un saut à la ligne:
                $corp .= $eol;

                // seconde partie du mail, qui contient la partie piece jointe !!!!
                // on refait des entetes (pour la piece jointe): 
                $corp .= '--' . $boundary  . $eol;

                // dans le Content-type on lui dit que c'est un fichier  application/octet-stream:

                $corp .= 'Content-Type: application/octet-stream; name="' . $pj . '"'  . $eol;
                $corp .= "Content-Transfer-Encoding: base64"  . $eol;
                $corp .= 'Content-Disposition: attachment; filename="' . $pj . '"'  . $eol;

                // je vais mettre le code encodé du fichier dans la base64_encode(), on la récupère avec file_get_contents(), et on met tout en forme avec chunk_split()
                // il n'y a que le $source que je ne dois pas concaténer
                $source = file_get_contents($lienfichier);
                $source = base64_encode($source);
                $source = chunk_split($source);
                // attache au corps de message la piece jointe
                $corp .= $source . $eol . $eol;
                $corp .= "--" . $boundary . "--" . $eol . $eol;

                // je referme la dernière partie:
                $corp .= $eol . $eol . "--" . $boundary . "--" . $eol . $eol;

                // enfin, j'envois le mail (ici dans une condition):
                if (mail($destinataire, $sujet, $corp, $entetes)) {
                    echo "Email envoyé avec succès à $destinataire ...";
                    header('Location: index.php?action=contact');
                } else {
                    echo "Échec de l'envoi de l'email...";
                    header('Location: index.php?action=contact');
                }
            }
        }

        if (isset($_POST['sexe']) && $_POST['nom'] && $_POST['lieu'] && $_POST['mail'] && $_POST['msgLect']) {

            $civil = $_POST['sexe'];
            $lieu = cleanText($_POST['lieu']);
            $nom = cleanText($_POST['nom']);
            $mail = $_POST['mail'];

            // on y met le vrai nom du fichier téléchargé:
            $pj = $_FILES['filenameLect']['name'];

            $pj_text = cleanText($_POST['msgLect']);

            $chemindossier = './public/piece_jointe';
            // basename est le nom de base du fichier
            $rename = basename($_FILES['filenameLect']['name']);

            move_uploaded_file($_FILES['filenameLect']['tmp_name'], "$chemindossier/$rename");

            $lienfichier = "$chemindossier/$rename";

            var_dump($lienfichier);

            if ($pj_text && $civil && $lieu && $nom && goodMail($mail)) {
                $contact->contactMailLect($nom, $lieu, $mail, $pj, $pj_text);

                $destinataire = "darkzombrelle@gmail.com";

                $sujet = "Test envois piece jointe" . date("Y/m/d H:i:s");

                // on créé un boundary unique:
                $boundary = md5(uniqid(rand(), true));
                // $boundary = md5(time());

                // eol = end of line:
                $eol = "\r\n";

                // les entêtes: 
                $entetes = "From: LKilousse@gmail.com" . $eol;
                /* ***** on doit mettre les .= au reste sinon, le $entetes perd chaque données qu'on lui a rentrée précédemment ****/
                $entetes .= 'MIME-Version: 1.0' . $eol;
                $entetes .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"' . $eol;
                $entetes .= 'Content-Transfer-Encoding: 7bit'  . $eol;

                $corp = 'This is a multi-part message in MIME format.'  . $eol;
                /* ***** on doit mettre les .= au reste sinon, le $corp perd chaque données qu'on lui a rentrée précédemment ****/
                $corp .= '--' . $boundary  . $eol;

                // première partie corp du mail en HTML avec text/html ou pas (texte brute) avec text/plain:
                $corp .= 'Content-Type: text/html; charset=utf-8'  . $eol;
                $corp .= 'Content-Transfer-Encoding: 8bit'  . $eol;

                // on remet un second retour à la ligne pour signifier la fin des entête :
                $corp .= $eol;

                // enfin on met le texte du mail (ici en html vu qu'on a défini le Content-Type sur text/html)

                $corp .= "<p>Contact: </p>
                <p>Nom : $civil $nom</p>
                <p>Pays : $lieu</p>
                <p>E-mail: $mail</p>
                <p>Nom de la pièce-jointe : $pj</p>
                <p>Message : $pj_text</p>";

                // le texte du mail est fini, on remet un saut à la ligne:
                $corp .= $eol;

                // seconde partie du mail, qui contient la partie piece jointe !!!!
                // on refait des entetes (pour la piece jointe): 
                $corp .= '--' . $boundary  . $eol;

                // dans le Content-type on lui dit que c'est un fichier  application/octet-stream:

                $corp .= 'Content-Type: application/octet-stream; name="' . $pj . '"'  . $eol;
                $corp .= "Content-Transfer-Encoding: base64"  . $eol;
                $corp .= 'Content-Disposition: attachment; filename="' . $pj . '"'  . $eol;

                // je vais mettre le code encodé du fichier dans la base64_encode(), on la récupère avec file_get_contents(), et on met tout en forme avec chunk_split()
                // il n'y a que le $source que je ne dois pas concaténer
                $source = file_get_contents($lienfichier);
                $source = base64_encode($source);
                $source = chunk_split($source);
                // attache au corps de message la piece jointe
                $corp .= $source . $eol . $eol;
                $corp .= "--" . $boundary . "--" . $eol . $eol;

                // je referme la dernière partie:
                $corp .= $eol . $eol . "--" . $boundary . "--" . $eol . $eol;

                // enfin, j'envois le mail (ici dans une condition):
                if (mail($destinataire, $sujet, $corp, $entetes)) {
                    echo "Email envoyé avec succès à $destinataire ...";
                    header('Location: index.php?action=contact');
                } else {
                    echo "Échec de l'envoi de l'email...";
                    header('Location: index.php?action=contact');
                }
            }
        }

        require_once './view/contact.php';
    }
}
