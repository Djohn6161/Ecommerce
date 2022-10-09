<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../models/games.php';

//intantiate DB & connct
$database = new Database();
$db = $database->connect();


//Instantantiate games object
$game = new Games($db);

//Games query
$result = $game->read();
//get row count 
$num = $result->rowCount();

//check if any games
if($num>0) {
    $games_arr = array();
    $games_arr['datas'] = array();
    
    
    while($row= $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $img = file_get_contents('../../' . $game_image);
        $dataimg = base64_encode($img);

        $game_item = array(
            'id' => $id,
            'Game_name' => $Game_name,
            'game_image' => $dataimg,
            'game_price' => $game_price,
            'Description' => $Description,
            'Rating' => $Rating
        );
        array_push($games_arr['datas'], $game_item);
    }
    //array_push($games_arr['datas'], $game_item);

    //turn to JSON &output
    echo json_encode($games_arr);
}else {
    echo json_encode(
        array('message' => 'No games Found')
    );

}
