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

//Get ID
$game->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get post
$game->read_single();

//create array
$game_arr = array(
    'id' => $game->id,
    'Game_name' => $game->Game_name,
    'game_image' => $game->game_image,
    'game_price' => $game->game_price,
    'Description' => $game->Description,
    'Rating' => $game->Rating
);

print_r(json_encode($game_arr));

