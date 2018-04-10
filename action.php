<?php
include "db.php";  //include the connection

// extend so that it can can use con variable for connections
class dataOperaion extends Database {

  // create a function insert that takes two arguments as parameters
  public function insert($table, $fields){
    // INSERT INTO <table-name>(, ,) VALUES ('medicine', 'quantity')";
    $query = "";
    $query .= "INSERT INTO " .$table;

    //
    $query .= "(".implode(", ", array_keys($fields)).") VALUES ";

    // used to get an array of values from another array that may contain key-value pairs or just values
    $query .= "('".implode("', '", array_values($fields))."')";
    //echo $query;
    $result = mysqli_query($this -> con, $query);
    if($result){
      return true;
    }
  }

  // now function for fetching data from Database
  public function fetch($table){
    $query = "SELECT * FROM ".$table;
    $array = array();
    $result = mysqli_query($this->con, $query);
    while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
    }
    return $array;
  }


}

 $obj = new dataOperaion;

 if(isset($_POST['submit'])){
   $myArray = array(
     "medicine_name" => strip_tags(trim($_POST['name'])),
     "quantity" => strip_tags(trim($_POST['quantity']))
   );

   if($obj -> insert("medicines", $myArray)){
     header("location:index.php?message=Record Saved!");
   }
 }
 ?>
