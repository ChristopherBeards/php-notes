<?php 

  # Object Oriented Style
  # Connecting to the DB
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

  # SAVE: Check if `save` has been pressed
  if (isset($_POST['save'])) {
    # Store the name and location in variables
    $name = $_POST['name'];
    $location = $_POST['location'];

    # Insert records into the DB
    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);
  }

  # DELETE: If `delete` has been pressed
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysquli->error);
  }