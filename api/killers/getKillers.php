<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Character.php';

    $database = new Database();
    $db = $database->connect();

    $killers = new Character($db);
    
    $result = $killers->getKillers();

    $killers_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $killer = array(
            'id' => $id,
            'name' => $name,
            'role' => $role,
            'fullname' => $fullname,
            'nationality' => $nationality,
            'realm' => $realm,
            'power' => $power,
            'weapon' => $weapon,
            'speed' => $speed,
            'terror_radius' => $terror_radius,
            'perks' => $perks,
            'voice_actor' => $voice_actor,
            'is_free' => boolval($is_free),
            'dlc_id' => $dlc_id,
        );

        array_push($killers_arr, $killer);
    }
    echo json_encode($killers_arr)
?>