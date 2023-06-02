<?php
    require_once ('../class/Artiste.php');
    require_once ('../class/Track.php');
    require_once ('../class/Album.php');

    class Search{
        // Get all the album with an album result for the search
        public static function search_album($result){
            $list_al = Album::album_info();
            $list_final = [];
            foreach ($list_al as $elt){
                $titre = preg_replace(' /\s+/', '', strtolower($elt['titre_album']));
                $search = preg_replace(' /\s+/', '',strtolower($result));
                if(substr_compare($search, $titre, 0, strlen($result)) == 0){
                    array_push($list_final, $elt);
                }
            }
            return $list_final;
        }

        // Get all the artist with a result for the search
        public static function search_artist($result){
            $list_art = Artiste::artists_info();
            $list_final = [];
            foreach ($list_art as $elt){
                $nom = preg_replace(' /\s+/', '', strtolower($elt['nom_artiste']));
                $search = preg_replace(' /\s+/', '',strtolower($result));
                if(substr_compare($search, $nom, 0, strlen($result)) == 0){
                    array_push($list_final, $elt);
                }
            }
            return $list_final;
        }

        // Get all the track with a result for the search
        public static function search_track($result){
            $list_track = Track::track_info();
            $list_final = [];
            foreach ($list_track as $elt){
                $titre = preg_replace(' /\s+/', '', strtolower($elt['titre_track']));
                $search = preg_replace(' /\s+/', '',strtolower($result));
                if(substr_compare($search, $titre, 0, strlen($result)) == 0){
                    array_push($list_final, $elt);
                }
            }
            return $list_final;
        }


        public static function search_artiste_track($result){
            $list_art = self::search_artist($result);
            $list_final = [];

            foreach ($list_art as $elt) {
                array_push($list_final,Artiste::track_artist($elt['id_artiste']));
            }
            return $list_final;
        }

        public static function search_album_track($result){
            $list_al = self::search_album($result);
            $list_final = [];
            foreach ($list_al as $elt) {
                array_push($list_final, Album::liste_track($elt['id_album']));
            }


            return $list_final;
        }

        public static function search_artiste_album($result){
            $list_art = self::search_artist($result);
            $list_final = [];

            foreach ($list_art as $elt) {
                array_push($list_final, Artiste::album_artist($elt['id_artiste']));
            }
            return $list_final;
        }

        public static function all_search($result){
            $list = [];
            array_push($list ,self::search_track($result));
            array_push($list ,self::search_album_track($result));
            array_push($list , self::search_artiste_track($result));
            array_push($list , self::search_album($result));
            array_push($list , self::search_artiste_album($result));
            array_push($list , self::search_artist($result));

            return $list;
        }

    }

    // Function to show results

    function album(){
        echo '<h3>Albums</h3>';
        $result = Search::search_album($_POST['bar']);
        for ($i=0; $i < sizeof($result); $i++){
            echo $result[$i]['titre_album'];
        }
    }

    function artiste(){
        echo '<h3>Artistes</h3>';
        $result = Search::search_artist($_POST['bar']);
        for ($i=0; $i < sizeof($result); $i++){
            echo $result[$i]['nom_artiste'];
        }
    }

    function titre(){
        echo '<h3>Morceaux</h3>';
        $result = Search::search_track($_POST['bar']);
        for ($i=0; $i < sizeof($result); $i++){
            echo $result[$i]['titre_track'];
        }
    }
