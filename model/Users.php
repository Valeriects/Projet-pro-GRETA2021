<?php

require_once 'BaseModel.php';
require_once './model/sanitize.php';

class User extends BaseModel
{
    // debut READ:
    public function afficheAvis($id)
    {
        $affiche = $this->_conn->prepare('SELECT avis.texte_msg, DATE_FORMAT(avis.avis_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr, avis.id_avis, livres.livre_nom FROM romancier.avis INNER JOIN romancier.livres ON avis.id_livreAvis = livres.id_livre WHERE id_userAvis= ? GROUP BY avis.avis_date DESC');

        $affiche->execute([$id]);

        $avis = $affiche->fetchAll(PDO::FETCH_ASSOC);

        return $avis;
    }
    // fin READ



    // debut UPDATE
    public function getAvisInput($id)
    {
        $getInput = $this->_conn->prepare('SELECT * FROM romancier.avis INNER JOIN romancier.livres ON avis.id_livreAvis = livres.id_livre WHERE id_avis= ?');

        $getInput->execute([$id]);
        $result = $getInput->fetch();

        return $result;
    }


    public function upAvisInput($texteMsg, $id)
    {
        $upAvis = $this->_conn->prepare('UPDATE romancier.avis SET texte_msg = ? WHERE id_avis= ?');

        $upAvis->execute(array($texteMsg, $id));
    }


    public function updateSuccess()
    {
        return '<p class="success">Félicitations ! Votre avis a bien été modifié.</p>';
    }
    // fin UPDATE



    // DELETE :

    public function deleteAvis($id)
    {
        $deleteAvis = $this->_conn->prepare("DELETE FROM romancier.avis WHERE id_avis = ?");

        $deleteAvis->execute(array($id));
    }

    public function deleteSuccess()
    {
        return '<p class="success">Félicitations !!! Votre avis a bien été supprimé.</p>';
    }
    // fin DELETE



    // DEBUT CREATE :

    // j'assigne les id_livre à mes inputs radio:
    public function readLivre()
    {
        $read = $this->_conn->prepare('SELECT id_livre FROM romancier.livres');
        $read->execute();
        $result = $read->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function createAvis($idUser, $idLivre, $msg)
    {
        $create = $this->_conn->prepare('INSERT INTO romancier.avis (id_userAvis, id_livreAvis, texte_msg) VALUES (:idUser, :idLivre, :msg)');
        $create->bindParam(':idUser', $idUser);
        $create->bindParam(':idLivre', $idLivre);
        $create->bindParam(':msg', $msg);

        $create->execute();
    }

    // fin CREATE



    // debut afficher tous les AVIS pour la page avis.php
    public function getLivre()
    {
        $getLivre = $this->_conn->prepare('SELECT id_livre, livre_nom, livre_tome, livre_jacquette, date_parution FROM romancier.livres');
        $getLivre->execute();
        $livres = $getLivre->fetchAll(PDO::FETCH_ASSOC);

        return $livres;
    }


    public function getAvis()
    {
        $getAvis = $this->_conn->prepare('SELECT user_pseudo, livre_nom, DATE_FORMAT(avis_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr, livre_jacquette, livre_nbrPage, texte_msg FROM romancier.livres 
        INNER JOIN romancier.avis ON livres.id_livre = avis.id_livreAvis
        INNER JOIN romancier.users ON avis.id_userAvis = users.id_user GROUP BY avis.avis_date DESC');

        $getAvis->execute();
        $results = $getAvis->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }


    public function getAvisTomeOne($idLivre)
    {
        $getTomeOne = $this->_conn->prepare('SELECT user_pseudo, livre_nom, DATE_FORMAT(avis_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr, livre_jacquette, livre_nbrPage, texte_msg FROM romancier.livres 
        INNER JOIN romancier.avis ON livres.id_livre = avis.id_livreAvis
        INNER JOIN romancier.users ON avis.id_userAvis = users.id_user WHERE id_livre = :idLivre GROUP BY avis.id_livreAvis, avis.avis_date DESC');

        $getTomeOne->bindParam(':idLivre', $idLivre);

        $getTomeOne->execute();

        $getSolo = $getTomeOne->fetchAll(PDO::FETCH_ASSOC);

        return $getSolo;
    }

    // fin afficher tout les AVIS pour la page avis.php



    //affiche les dernières nouveautées en page d'accueil
    public function afficheAccueil()
    {
        $afficheAccueil = $this->_conn->prepare('SELECT id_livre, livre_nom, livre_tome, livre_jacquette, DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS parution FROM romancier.livres ORDER BY livres.date_parution DESC LIMIT 1');
        $afficheAccueil->execute();
        $nouveau = $afficheAccueil->fetch();

        return $nouveau;
    }


    //deux fonctions pour s'inscrire
    public function verifPseudo($pseudo)
    {

        $prep = $this->_conn->prepare('SELECT * FROM users WHERE user_pseudo = :pseudo');

        // avantage, on a pas d'ordre, comme avec l'interrogatif:
        $prep->bindParam(':pseudo', $pseudo);
        $prep->execute();
        // soit on bind soit on met l'array dans le execute()
        // $prep->execute(array(':pseudo' => $pseudo));

        $tableau = $prep->fetchAll();

        // $prep->closeCursor();

        return $tableau;
    }

    public function inscriptionUser($nom, $prenom, $pseudo, $password)
    {
        // Debut code pour insérer des données dans la base de donnée:
        $prepare = $this->_conn->prepare('INSERT INTO users (user_nom, user_prenom, user_pseudo, user_password) VALUES (?, ?, ?, ?)');


        // on met le hashage ici :
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $prepare->execute(array($nom, $prenom, $pseudo, $hash));
        // fin code pour insérer des données

    }
    // fin deux fonctions pour s'inscrire



    // pour se connecter
    public function connexionUser($pseudo)
    {
        $prepare = $this->_conn->prepare('SELECT * FROM users WHERE user_pseudo=?');

        $prepare->execute(array($pseudo));

        $userData = $prepare->fetch();

        return $userData;
    }
    // fin se connecter




    // creation du mail pour professionnel: 
    public function contactMailPro($org, $adresse, $pays, $tel, $email, $pj, $pj_text)
    {
        $sql = $this->_conn->prepare('INSERT INTO contact_pro (pro_organisme, pro_adresse, pro_pays, pro_telephone, pro_mail, pro_piece_jointe, pro_texte_msg) VALUES (?, ?, ?, ?, ?, ?, ?)');

        $sql->execute([
            $org, $adresse, $pays, $tel, $email, $pj, $pj_text
        ]);
    }


    // creation du mail pour lecteur: 
    public function contactMailLect($nom, $lieu, $mail, $pj, $pj_text)
    {
        $sql = $this->_conn->prepare('INSERT INTO contact_lect (lect_nom, lect_pays, lect_mail, lect_piece_jointe, lect_texte_msg) VALUES (?, ?, ?, ?, ?)');

        $sql->execute([$nom, $lieu, $mail, $pj, $pj_text]);
    }
}
