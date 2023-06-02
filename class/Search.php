<?php
    require_once ('../class/Artiste.php');
    require_once ('../class/Track.php');
    require_once ('../class/Album.php');

    class Search{
        // Get all the album with an album name for the search
        public static function search_album($name){
            $list_al = Album::albums();
            $list_final = [];
            foreach ($list_al as $elt){
                if(substr_compare(strtolower($name), strtolower($elt['titre_album']), 0, count($name))){
                    $list_final += $elt;
                }
            }
            return $list_final;
        }

        // Get all the artist with a name for the search
        public static function search_artist($name){
            $list_art = Artiste::artists();
            $list_final = [];
            foreach ($list_art as $elt){
                if(substr_compare(strtolower($name), strtolower($elt['nom_artiste']), 0, count($name))){
                    $list_final += $elt['nom_artiste'];
                }
            }
            return $list_final;
        }

        // Get all the track with a name for the search
        public static function search_track($name){
            $list_track = Track::tracks();
            $list_final = [];
            foreach ($list_track as $elt){
                if(substr_compare(strtolower($name), strtolower($elt['titre_track']), 0, count($name))){
                    $list_final += $elt;
                }
            }
            return $list_final;
        }


        public static function search_artiste_track($name){
            $list_art = self::search_artist($name);

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
