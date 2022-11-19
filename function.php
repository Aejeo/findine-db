<?php
        
        
        if(isset($_POST['brooklyn'])) {
            $cursor = $collection->find(['borough'=>"Brooklyn"]);
        }
        if(isset($_POST['queens'])) {
            $cursor = $collection->find(['borough'=>"Queens"]);
        }
        if(isset($_POST['manhattan'])) {
            $cursor = $collection->find(['borough'=>"Manhattan"]);
        }
        if(isset($_POST['bronx'])) {
            $cursor = $collection->find(['borough'=>"Bronx"]);
        }
        if(isset($_POST['staten'])) {
            $cursor = $collection->find(['borough'=>"Staten Island"]);
        }

        if(isset($_POST['name'])){
          $searchbox = $_POST['keyword'];
          $cursor = $collection->aggregate(
            [
                ['$match' => ['name' => ['$regex' => $searchbox, '$options' => 'i']]]
            ]);
        }
        if(isset($_POST['cuisine'])){
            $searchbox = $_POST['keyword'];
            $cursor = $collection->aggregate(
              [
                  ['$match' => ['cuisine' => ['$regex' => $searchbox, '$options' => 'i']]]
              ]);
          }
?>

