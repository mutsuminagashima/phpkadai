<?php
function db_conn(){
  try {
    return new PDO('mysql:dbname=BMDB;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DB Connection Error:'.$e->getMessage());
  }
}



?>