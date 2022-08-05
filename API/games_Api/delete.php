<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
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


//Delete post
if($game->delete()) {
    echo json_encode(
        array('message' => 'Post Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'Post Deleted')
    );

}
