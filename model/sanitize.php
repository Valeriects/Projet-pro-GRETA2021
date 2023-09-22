<?php


function goodPseudo($var)
{
  //if (in_array(strtolower($pseudo),["admin","utilisateur","user"])){}
  $var = strtolower($var);
  return ($var != "admin" && $var != "user" && $var != "utilisateur" && $var != "guest");
}

function goodMail($var)
{
  // Regex pour les mails : if(!preg_match("/^([a-zA-Z][\w\.-]*[a-zA-Z0-9])@([a-zA-Z][\w\.-]*[a-zA-Z0-9])\.([a-zA-Z]{2,})$/",$courriel))

  // filter_var, permet de filtrer notre email suivant un filtre près rempli PHP
  return filter_var($var, FILTER_VALIDATE_EMAIL); // Permet de retourner directement TRUE ou FALSE
}

function goodTel($var)
{
  // + ou 00 et 33 ou 0, espace ou chiffre de 1 à 9 et répétition de 2 chiffres avec espace ou non 4 fois
  return preg_match("/^([+|00]?33|0) ?[1-9] ?(\d{2} ?){4}$/", $var); // Permet de retourner directement TRUE ou FALSE
}

function goodPassword($var, $confirm)
{
  return (preg_match("/^(?=.{8,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/", $var) && $var === $confirm);
}

function goodPwd($var)
{
  return (preg_match("/^(?=.{8,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/", $var));
}

function cleanText($var)
{

  $var = trim($var); //enlève les espaces supplementaires, enlève aller à la ligne

  $var = stripslashes($var); //enlève les antislashes

  $var = htmlspecialchars($var); //convertit les caracteres speciaux en entite html, < en &lt;   et   & en &amp;


  return $var;
}
