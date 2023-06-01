------------------------------------------------------------
--        Script Postgre
------------------------------------------------------------



------------------------------------------------------------
-- Table: utilisateur
------------------------------------------------------------
drop table if exists utilisateur CASCADE ;
CREATE TABLE public.utilisateur(
                                   id_user             SERIAL NOT NULL ,
                                   nom                 VARCHAR (50) NOT NULL ,
                                   prenom              VARCHAR (50) NOT NULL ,
                                   date_de_naissance   TIMESTAMP  NOT NULL ,
                                   email               VARCHAR (100) NOT NULL ,
                                   mot_de_passe        VARCHAR (200) NOT NULL ,
                                   image_user          VARCHAR (200) NOT NULL  ,
                                   CONSTRAINT utilisateur_PK PRIMARY KEY (id_user)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: playlist
------------------------------------------------------------
drop table if exists playlist CASCADE ;
CREATE TABLE public.playlist(
                                id_playlist     SERIAL NOT NULL ,
                                nom_playlist    VARCHAR (50) NOT NULL ,
                                date_creation   DATE  NOT NULL ,
                                id_user         INT  NOT NULL  ,
                                CONSTRAINT playlist_PK PRIMARY KEY (id_playlist)

    ,CONSTRAINT playlist_utilisateur_FK FOREIGN KEY (id_user) REFERENCES public.utilisateur(id_user)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: style
------------------------------------------------------------
drop table if exists style CASCADE ;
CREATE TABLE public.style(
                             id_style    SERIAL NOT NULL ,
                             nom_style   VARCHAR (50) NOT NULL  ,
                             CONSTRAINT style_PK PRIMARY KEY (id_style)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: type
------------------------------------------------------------
drop table if exists type CASCADE ;
CREATE TABLE public.type(
                            id_type    SERIAL NOT NULL ,
                            nom_type   VARCHAR (5) NOT NULL  ,
                            CONSTRAINT type_PK PRIMARY KEY (id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: artiste
------------------------------------------------------------
drop table if exists artiste CASCADE ;
CREATE TABLE public.artiste(
                               id_artiste    SERIAL NOT NULL ,
                               nom_artiste   VARCHAR (50) NOT NULL ,
                               id_type       INT  NOT NULL  ,
                               CONSTRAINT artiste_PK PRIMARY KEY (id_artiste)

    ,CONSTRAINT artiste_type_FK FOREIGN KEY (id_type) REFERENCES public.type(id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: album
------------------------------------------------------------
drop table if exists album CASCADE ;
CREATE TABLE public.album(
                             id_album        SERIAL NOT NULL ,
                             titre_album     VARCHAR (50) NOT NULL ,
                             date_parution   TIMESTAMP  NOT NULL ,
                             image_album     VARCHAR (200) NOT NULL ,
                             id_artiste      INT  NOT NULL ,
                             id_style        INT  NOT NULL  ,
                             CONSTRAINT album_PK PRIMARY KEY (id_album)

    ,CONSTRAINT album_artiste_FK FOREIGN KEY (id_artiste) REFERENCES public.artiste(id_artiste)
    ,CONSTRAINT album_style0_FK FOREIGN KEY (id_style) REFERENCES public.style(id_style)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: track
------------------------------------------------------------
drop table if exists track CASCADE ;
CREATE TABLE public.track(
                             id_track      SERIAL NOT NULL ,
                             titre_track   VARCHAR (50) NOT NULL ,
                             duree         TIMESTAMP  NOT NULL ,
                             lien_track    VARCHAR (200) NOT NULL ,
                             id_album      INT  NOT NULL  ,
                             CONSTRAINT track_PK PRIMARY KEY (id_track)

    ,CONSTRAINT track_album_FK FOREIGN KEY (id_album) REFERENCES public.album(id_album)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: comprendre
------------------------------------------------------------
drop table if exists comprendre CASCADE ;
CREATE TABLE public.comprendre(
                                  id_track      INT  NOT NULL ,
                                  id_playlist   INT  NOT NULL ,
                                  date_ajout    TIMESTAMP  NOT NULL  ,
                                  CONSTRAINT comprendre_PK PRIMARY KEY (id_track,id_playlist)

    ,CONSTRAINT comprendre_track_FK FOREIGN KEY (id_track) REFERENCES public.track(id_track)
    ,CONSTRAINT comprendre_playlist0_FK FOREIGN KEY (id_playlist) REFERENCES public.playlist(id_playlist)
)WITHOUT OIDS;