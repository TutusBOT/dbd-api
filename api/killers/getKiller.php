<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Killer.php';

    $database = new Database();
    $db = $database->connect();

    $killer = new Killer($db);

    $killer->name = isset($_GET['name']) ? $_GET['name'] : die();

    $killer->getKiller();
    $killer_arr = array(
        'id' => $killer->id,
        'name' => $killer->name,
        'role' => $killer->role,
        'fullname' => $killer->fullname,
        'realm' => $killer->realm,
        'power' => $killer->power,
        'speed' => $killer->speed,
        'terror_radius' => $killer->terror_radius,
        'dlc' => $killer->dlc,
        'perks' => $killer->perks,
    );
    // echo $killer->name;
    if($killer_arr['id'] == NULL){
        echo "Killer with that name doesn't exist.";
        return;
    }
    print_r(json_encode($killer_arr));
?>