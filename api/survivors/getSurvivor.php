<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Character.php';

    $database = new Database();
    $db = $database->connect();

    $survivor = new Character($db);

    $survivor->name = isset($_GET['name']) ? urldecode($_GET['name']) : die();


    $survivor->getSurvivor();
    $survivor_arr = array(
        'id' => $survivor->id,
        'name' => $survivor->name,
        'role' => $survivor->role,
        'fullname' => $survivor->fullname,
        'nationality' => $survivor->nationality,
        'perks' => $survivor->perks,
        'voice_actor' => $survivor->voice_actor,
        'is_free' => boolval($survivor->is_free),
        'dlc_id' => $survivor->dlc_id,
    );
    
    // echo(urldecode($_GET['name']));
    if($survivor_arr['id'] == NULL){
        echo "Survivor with that name doesn't exist.";
        return;
    }
    print_r(json_encode($survivor_arr));
?>