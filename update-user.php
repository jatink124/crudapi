<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: access");

header("Access-Control-Allow-Methods: POST");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



require 'db_connection.php';



$data = json_decode(file_get_contents("php://input"));
$id = $_GET['id'];
    //   $id = mysqli_real_escape_string($db_conn, trim($data->id));
      $Topic = mysqli_real_escape_string($db_conn, trim($data->Topic));
       $Category = mysqli_real_escape_string($db_conn, trim($data->Category));
        $Tags = mysqli_real_escape_string($db_conn, trim($data->Tags));
        $datetime = mysqli_real_escape_string($db_conn, trim($data->datetime));

        $updateUser = mysqli_query($db_conn,"UPDATE `users` SET `Topic`='$Topic', `Category`='$Category'
        ,`Tags`='$Tags',`created_at`='$datetime'  WHERE `id`='$id'");

        if($updateUser){

            echo json_encode(["success"=>1,"msg"=>"User Updated."]);

        }

        else{

            echo json_encode(["success"=>0,"msg"=>"User Not Updated!"]);

        }

    

