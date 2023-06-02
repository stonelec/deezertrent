<?php
    require_once ('../class/Artiste.php');
    require_once ('../class/Track.php');
    require_once ('../class/Album.php');

    class Search{
        // Get all the album with an album name for the search
        public static function search_album($name){
            $list_al = Album::album_info();
            $list_final = [];
            foreach ($list_al as $elt){
                if(substr_compare(strtolower($name), strtolower($elt['titre_album']), 0, strlen($name))){
                    $list_final += $elt;
                }
            }
            return $list_final;
        }

        // Get all the artist with a name for the search
        public static function search_artist($name){
            $list_art = Artiste::artist_info();
            $list_final = [];
            var_dump($list_art);
            foreach ($list_art as $elt){
                if(substr_compare(strtolower($name), strtolower($elt['nom_artiste']), 0, strlen($name))){
                    $list_final += $elt;
                }
            }
            var_dump($list_final);
            return $list_final;
        }

        // Get all the track with a name for the search
        public static function search_track($name){
            $list_track = Track::track_info();
            $list_final = [];
            foreach ($list_track as $elt){
                if(substr_compare(strtolower($name), strtolower($elt['titre_track']), 0, strlen($name))){
                    $list_final += $elt;
                }
            }
            return $list_final;
        }

        /*
        public static function search_artiste_track($name){
            $list_art = self::search_artist($name);
            $list_final = [];

            foreach ($list_art as $elt) {
                $list_final += Artiste::track_artist($elt['nom_artiste']);
            }
            return $list_final;
        }

        public static function search_album_track($name){
            $list_al = self::search_album($name);
            $list_final = [];

            foreach ($list_al as $elt) {
                var_dump($elt);
                $list_final += Album::liste_track(intval($elt['id_album']));
            }
            return $list_final;
        }

        public static function search_artiste_album($name){
            $list_art = self::search_artist($name);
            $list_final = [];
            var_dump($list_art);
            foreach ($list_art as $elt) {
                $list_final += Artiste::album_artist($elt['id_artiste']);
            }
            return $list_final;
        }*/

        public static function all_search($name){
            $list = [];
            //$list += self::search_track($name);
            //$list += self::search_album_track($name);
            //$list += self::search_artiste_track($name);
            //$list += self::search_album($name);
            //$list += self::search_artiste_album($name);
            $list += self::search_artist($name);

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
