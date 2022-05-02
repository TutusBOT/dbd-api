<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Killers.php';

    $database = new Database();
    $db = $database->connect();

    $killers = new Killers($db);
    
    $result = $killers->getKillers();

    $killers_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $killer = array(
            'id' => $id,
            'name' => $name,
            'role' => $role,
            'fullname' => $fullname,
            'realm' => $realm,
            'power' => $power,
            'weapon' => $weapon,
            'speed' => $speed,
            'terror_radius' => $terror_radius,
            'dlc' => $dlc,
            'perks' => $perks
        );

        array_push($killers_arr, $killer);
    }
    echo json_encode($killers_arr)
?>