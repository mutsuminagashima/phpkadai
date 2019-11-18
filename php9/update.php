<?php
$name   = $_POST["name"];
$url  = $_POST["url"];
$comment = $_POST["comment"];
$id     = $_POST["id"];

include("func.php");
$pdo = db_conn();

$stmt = $pdo->prepare("UPDATE gs_bm_table SET name=:name,url=:url,comment=:comment WHERE id=:id");
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url',  $url,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

if($status==false){
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  header('location: select.php');
}
?>
