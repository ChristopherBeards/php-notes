<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,
  Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $category = new Category($db);

  // Get raw category data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to delete
  $category->id = $data->id;

  // Delete category
  if ($category->delete()) {
    echo json_encode(
      array('message' => 'Category Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Category Not Deleted')
    );
  }