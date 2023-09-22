<?php

class Contact
{

    // creation du mail pour professionnel: 
    public function contactMailPro($org, $adresse, $pays, $tel, $email, $pj, $pj_text)
    {
        $sql = $this->_conn->prepare('INSERT INTO contact_pro (pro_organisme, pro_adresse, pro_pays, pro_telephone, pro_mail, pro_piece_jointe, pro_texte_msg) VALUES (?, ?, ?, ?, ?, ?, ?)');

        $sql->execute([$org, $adresse, $pays, $tel, $email, $pj, $pj_text]);
    }


    // creation du mail pour professionnel: 
    public function contactMailLect($nom, $lieu, $mail, $pj, $pj_text)
    {
        $sql = $this->_conn->prepare('INSERT INTO contact_lect (lect_nom, lect_pays, lect_mail, lect_piece_jointe, lect_texte_msg) VALUES (?, ?, ?, ?, ?)');

        $sql->execute([$nom, $lieu, $mail, $pj, $pj_text]);
    }


    public function mailSuccess()
    {
        return 'Félicitations ! Votre message a bien été envoyé.';
    }

    public function errorChamp()
    {
        return 'Il manque un champs.';
    }

    public function errorTout()
    {
        return 'Attention ! Vous n\'avez pas remplis tout les champs obligatoires !';
    }
}
