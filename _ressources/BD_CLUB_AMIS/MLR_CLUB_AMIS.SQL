DROP DATABASE IF EXISTS MLR_CLUB_AMIS;

CREATE DATABASE IF NOT EXISTS MLR_CLUB_AMIS;
USE MLR_CLUB_AMIS;
# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPER
 (
   N_AMIS INTEGER NOT NULL  ,
   N_DINER INTEGER NOT NULL  ,
   NOMBRE_INVITE INTEGER NULL  
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
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_AMIS (N_AMIS)
      REFERENCES AMIS (N_AMIS) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_DINER (N_DINER)
      REFERENCES DINER (N_DINER) ;

