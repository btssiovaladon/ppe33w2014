DROP DATABASE IF EXISTS CLUBAMIS;

CREATE DATABASE IF NOT EXISTS CLUBAMIS;
USE CLUBAMIS;
# -----------------------------------------------------------------------------
#       TABLE : FONCTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FONCTION
 (
   N_FONCTION INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_FONCTION CHAR(32) NULL  
   , PRIMARY KEY (N_FONCTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ACTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ACTION
 (
   N_ACTION INTEGER NOT NULL AUTO_INCREMENT ,
   N_AMIS INTEGER NOT NULL  ,
   DATE_DEB_ACTION DATE NULL  ,
   DUREE_ACTION INTEGER NULL  ,
   FONDS_COLLECTES REAL(5,2) NULL  
   , PRIMARY KEY (N_ACTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ACTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ACTION_AMIS
     ON ACTION (N_AMIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : DINER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DINER
 (
   N_DINER INTEGER NOT NULL AUTO_INCREMENT ,
   DATE_DINER DATE NULL  ,
   LIEU_DINER CHAR(32) NULL  ,
   RUE_DINER CHAR(32) NULL  ,
   VILLE_DINER CHAR(32) NULL  ,
   PRIX_REPAS REAL(5,2) NULL  
   , PRIMARY KEY (N_DINER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMISSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMISSION
 (
   N_COMMISSION INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_COMMISSION CHAR(32) NULL  
   , PRIMARY KEY (N_COMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : AMIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AMIS
 (
   N_AMIS INTEGER NOT NULL AUTO_INCREMENT ,
   N_FONCTION INTEGER NULL  ,
   NOM_AMIS CHAR(32) NULL  ,
   PRENOM_AMIS CHAR(32) NULL  ,
   TEL_FIX_AMIS CHAR(12) NULL  ,
   TEL_PORTABLE_AMIS CHAR(12) NULL  ,
   EMAIL_AMIS CHAR(32) NULL  ,
   RUE_AMIS CHAR(32) NULL  ,
   VILLE_AMIS CHAR(32) NULL  ,
   DATE_ENTREE_AMIS DATE NULL  ,
   MT_VERSE REAL(5,2) NULL  ,
   PARRAIN_1 INTEGER NOT NULL  ,
   PARRAIN_2 INTEGER NOT NULL  
   , PRIMARY KEY (N_AMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AMIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AMIS_FONCTION
     ON AMIS (N_FONCTION ASC);

CREATE  INDEX I_FK_AMIS_AMIS
     ON AMIS (PARRAIN_1 ASC);

CREATE  INDEX I_FK_AMIS_AMIS1
     ON AMIS (PARRAIN_2 ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARAMETRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARAMETRE
 (
   MT_COTISATION REAL(5,2) NULL  ,
   N_COTISATION INTEGER NOT NULL AUTO_INCREMENT 
   , PRIMARY KEY (N_COTISATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPER
 (
   N_AMIS INTEGER NOT NULL  ,
   N_DINER INTEGER NOT NULL  
   , PRIMARY KEY (N_AMIS,N_DINER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_AMIS
     ON PARTICIPER (N_AMIS ASC);

CREATE  INDEX I_FK_PARTICIPER_DINER
     ON PARTICIPER (N_DINER ASC);

# -----------------------------------------------------------------------------
#       TABLE : GERER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS GERER
 (
   N_COMMISSION INTEGER NOT NULL  ,
   N_AMIS INTEGER NOT NULL  ,
   N_FONCTION INTEGER NOT NULL  
   , PRIMARY KEY (N_COMMISSION,N_AMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE GERER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_GERER_COMMISSION
     ON GERER (N_COMMISSION ASC);

CREATE  INDEX I_FK_GERER_AMIS
     ON GERER (N_AMIS ASC);

CREATE  INDEX I_FK_GERER_FONCTION
     ON GERER (N_FONCTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPANT
 (
   N_AMIS INTEGER NOT NULL  ,
   N_ACTION INTEGER NOT NULL  
   , PRIMARY KEY (N_AMIS,N_ACTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPANT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPANT_AMIS
     ON PARTICIPANT (N_AMIS ASC);

CREATE  INDEX I_FK_PARTICIPANT_ACTION
     ON PARTICIPANT (N_ACTION ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ACTION 
  ADD FOREIGN KEY FK_ACTION_AMIS (N_AMIS)
      REFERENCES AMIS (N_AMIS) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_FONCTION (N_FONCTION)
      REFERENCES FONCTION (N_FONCTION) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_AMIS (PARRAIN_1)
      REFERENCES AMIS (N_AMIS) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_AMIS1 (PARRAIN_2)
      REFERENCES AMIS (N_AMIS) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_AMIS (N_AMIS)
      REFERENCES AMIS (N_AMIS) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_DINER (N_DINER)
      REFERENCES DINER (N_DINER) ;


ALTER TABLE GERER 
  ADD FOREIGN KEY FK_GERER_COMMISSION (N_COMMISSION)
      REFERENCES COMMISSION (N_COMMISSION) ;


ALTER TABLE GERER 
  ADD FOREIGN KEY FK_GERER_AMIS (N_AMIS)
      REFERENCES AMIS (N_AMIS) ;


ALTER TABLE GERER 
  ADD FOREIGN KEY FK_GERER_FONCTION (N_FONCTION)
      REFERENCES FONCTION (N_FONCTION) ;


ALTER TABLE PARTICIPANT 
  ADD FOREIGN KEY FK_PARTICIPANT_AMIS (N_AMIS)
      REFERENCES AMIS (N_AMIS) ;


ALTER TABLE PARTICIPANT 
  ADD FOREIGN KEY FK_PARTICIPANT_ACTION (N_ACTION)
      REFERENCES ACTION (N_ACTION) ;

