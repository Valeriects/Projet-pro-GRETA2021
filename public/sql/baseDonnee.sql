
-- nouvelle base de données
CREATE DATABASE romancier;

CREATE TABLE IF NOT EXISTS romancier.contact
(
  id_contact int UNSIGNED NOT NULL AUTO_INCREMENT,
  contact_date timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  contact_pro_lect VARCHAR(25) NULL, 
  contact_organisme VARCHAR(100) NULL,
  contact_nom VARCHAR(100) NULL,
  contact_adresse VARCHAR(200) NULL,
  contact_pays VARCHAR(50) NULL,
  contact_telephone int NULL,
  contact_mail VARCHAR(50) NULL,
  contact_piece_jointe VARCHAR(250),
  contact__msg text NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE InnoDB, charset Utf8;

CREATE TABLE IF NOT EXISTS romancier.selection
(
  id_selection int UNSIGNED NOT NULL AUTO_INCREMENT,
  id_contact int,
  id_livres int,
  PRIMARY KEY (`id_selection`),
  FOREIGN KEY (`id_contact`),
  FOREIGN KEY (`id_livres`)
) ENGINE InnoDB, charset Utf8;


-- anciennes tables
CREATE TABLE IF NOT EXISTS romancier.contact_pro 
(
    id_pro int UNSIGNED NOT NULL AUTO_INCREMENT,
    pro_date timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    pro_organisme VARCHAR(50) NOT NULL,
    pro_adresse VARCHAR(200) NOT NULL,
    pro_pays VARCHAR(50) NOT NULL,
    pro_telephone int NOT NULL,
    pro_mail VARCHAR(50) NOT NULL,
    pro_piece_jointe VARCHAR(250),
    pro_texte_msg text NOT NULL,
    PRIMARY KEY (`id_pro`)
) ENGINE InnoDB, charset Utf8;

CREATE TABLE IF NOT EXISTS romancier.contact_lect 
(
    id_lect int UNSIGNED NOT NULL AUTO_INCREMENT,
    lect_date timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    lect_nom VARCHAR(50) NOT NULL,
    lect_pays VARCHAR(50) NOT NULL,
    lect_mail VARCHAR(50) NOT NULL,
    lect_piece_jointe VARCHAR(250),
    lect_texte_msg text NOT NULL,
    PRIMARY KEY (`id_lect`)
) ENGINE InnoDB, charset Utf8;
-- fin anciennes tables


CREATE TABLE IF NOT EXISTS romancier.avis 
(
    id_avis int NOT NULL AUTO_INCREMENT,
    id_userAvis int NOT NULL ,
    id_livreAvis int NOT NULL;
    avis_date timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    texte_msg text NOT NULL,
    PRIMARY KEY (`id_avis`)
) ENGINE=InnoDB, charset Utf8;

CREATE TABLE IF NOT EXISTS romancier.users
(
    id_user int NOT NULL AUTO_INCREMENT,
    user_date timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    user_nom VARCHAR(50) NOT NULL,
    user_prenom VARCHAR(50) NOT NULL,
    user_pseudo VARCHAR(50) NOT NULL,
    user_password VARCHAR(250) NOT NULL,
    PRIMARY KEY (`id_user`)
) ENGINE=InnoDB, charset UTF8;

CREATE TABLE IF NOT EXISTS romancier.livres
(
    id_livre int NOT NULL AUTO_INCREMENT,
    livre_nom VARCHAR(200) NOT NULL,
    livre_nbrPage VARCHAR(25) NOT NULL,
    livre_tome VARCHAR(50) NOT NULL,
    livre_jacquette VARCHAR(250) NOT NULL,
    PRIMARY KEY (`id_livre`)

)ENGINE=InnoDB, charset UTF8;

-- mettre CREATE TABLE avis et CREATE TABLE users et CREATE LIVRES avant ALTER TABLE avis sinon cela ne marche pas:
ALTER TABLE romancier.avis 
ADD CONSTRAINT FK_id_userAvis
  FOREIGN KEY (id_userAvis)
  REFERENCES romancier.users (id_user)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT FK_id_livreAvis
  FOREIGN KEY (id_livreAvis)
  REFERENCES romancier.livres (id_livre)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;


INSERT INTO livres (livre_nom, livre_nbrPage, livre_tome, livre_jacquette) VALUES 
("L'éveil", "352 pages", "Les Nocturnes Tome 1", "./ressources/Nocturnes_T1/Tome1_les-nocturnes.png"),
("L'ascension", "412 pages", "Les Nocturnes Tome 2", "./ressources/Nocturnes_T2/Tome2_les_nocturnes_2020-05-04.png"),
("L'illumination", "340 pages", "Les Nocturnes Tome 3", "./ressources/Nocturnes_T3/Capture_ecran_T3.png"),
("Abattu sur le chemin de Pélissanne", "", "Nouvelle", "./ressources/pelissanne/NB_abattu_sur_le_chemin_de_pélissanne.png");

-- test
SELECT livre_jacquette FROM livres WHERE id = 2;

ALTER TABLE romancier.avis
DROP pseudo;

ALTER TABLE romancier.avis
ADD id_livreAvis int NOT NULL;


ALTER TABLE romancier.avis
ADD CONSTRAINT FK_id_livreAvis
  FOREIGN KEY (id_livreAvis)
  REFERENCES romancier.livres (id_livre)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;



-- foreign key table selection :
ALTER TABLE romancier.selection
ADD CONSTRAINT FK_id_livres
  FOREIGN KEY (id_livres)
  REFERENCES romancier.livres (id_livre)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT FK_id_contact
  FOREIGN KEY (id_contact)
  REFERENCES romancier.contact (id_contact)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;


ALTER TABLE romancier.contact_lect
MODIFY lect_piece_jointe VARCHAR(250);

ALTER TABLE romancier.contact_pro
MODIFY pro_piece_jointe VARCHAR(250);

ALTER TABLE romancier.livres 
ADD livres.date_parution DATE; 

ALTER TABLE romancier.livres
ADD livres.synopsis VARCHAR(250),
ADD livres.detail VARCHAR(50),
ADD livres.dimensions VARCHAR(50),
ADD livres.langue VARCHAR(50),
ADD livres.auteur VARCHAR(100),
ADD livres.ISBN VARCHAR(100);

ALTER TABLE romancier.livres
MODIFY livres.synopsis text;


-- pour tester les pieces jointes:
CREATE TABLE IF NOT EXISTS romancier.piecejointe 
(
    id_pj int UNSIGNED NOT NULL AUTO_INCREMENT,
    pj VARCHAR(250) NOT NULL,
    pj_text text NOT NULL,
    PRIMARY KEY (`id_pj`)
) ENGINE=InnoDB, charset Utf8;


