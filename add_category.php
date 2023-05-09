<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: access");

header("Access-Control-Allow-Methods: POST");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



require 'db_connection.php';



// POST DATA

$data = json_decode(file_get_contents("php://input"));

$Topic = mysqli_real_escape_string($db_conn, trim($data->Topic));
$Category = mysqli_real_escape_string($db_conn, trim($data->Category));
$Tags = mysqli_real_escape_string($db_conn, trim($data->Tags));
$datetime = mysqli_real_escape_string($db_conn, trim($data->datetime));

  if($data!=''){

        $insertUser = mysqli_query($db_conn,"INSERT INTO `users`(`Topic`,`Category`,`Tags`,`created_at`) VALUES('$Topic','$Category','$Tags','$datetime')");

        if($insertUser){

            $last_id = mysqli_insert_id($db_conn);

            echo json_encode(["success"=>1,"msg"=>"User Inserted.","id"=>$last_id]);

        }

        else{

            echo json_encode(["success"=>0,"msg"=>"User Not Inserted!"]);

        }
  }
    
  

