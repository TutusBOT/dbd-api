<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Character.php';

    $database = new Database();
    $db = $database->connect();

    $survivors = new Character($db);
    
    $result = $survivors->getSurvivors();

    $survivors_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $survivor = array(
            'id' => $id,
            'name' => $name,
            'role' => $role,
            'fullname' => $fullname,
            'nationality' => $nationality,
            'perks' => $perks,
            'voice_actor' => $voice_actor,
            'is_free' => $is_free,
            'dlc_id' => $dlc_id,
        );

        array_push($survivors_arr, $survivor);
    }
    echo json_encode($survivors_arr)
?>