<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Character.php';

    $database = new Database();
    $db = $database->connect();

    $killer = new Character($db);

    $killer->name = isset($_GET['name']) ? urldecode($_GET['name']) : die();

    $killer->getKiller();
    $killer_arr = array(
        'id' => $killer->id,
        'name' => $killer->name,
        'role' => $killer->role,
        'fullname' => $killer->fullname,
        'nationality' => $killer->nationality,
        'realm' => $killer->realm,
        'power' => $killer->power,
        'speed' => $killer->speed,
        'terror_radius' => $killer->terror_radius,
        'perks' => $killer->perks,
        'voice_actor' => $killer->voice_actor,
        'is_free' => $killer->is_free,
        'dlc_id' => $killer->dlc_id,
    );
    // echo $killer->name;
    if($killer_arr['id'] == NULL){
        echo "Killer with that name doesn't exist.";
        return;
    }
    print_r(json_encode($killer_arr));
?>