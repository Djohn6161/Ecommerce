<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/database.php';
include_once '../models/games.php';

//intantiate DB & connct
$database = new Database();
$db = $database->connect();


//Instantantiate games object
$game = new Games($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$game->id = $data->id;

$game->Game_name = $data->Game_name;
$game->game_image = $data->game_image;
$game->game_price = $data->game_price;
$game->Description = $data->Description;
$game->Rating = $data->Rating;

//create post
if($game->update()) {
    echo json_encode(
        array('message' => 'Post Updated')
    );
} else {
    echo json_encode(
        array('message' => 'Post Not Updated')
    );

}
