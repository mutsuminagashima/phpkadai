<?php
$u_name   = $_POST["u_name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST['kanri_flg'];
$id     = $_POST["id"];

include("func.php");
$pdo = db_conn();

$stmt = $pdo->prepare("UPDATE gs_user_table SET u_name=:u_name,lid=:lid,lpw=:lpw, kanri_flg=:kanri_flg WHERE id=:id");
$stmt->bindValue(':u_name',   $u_name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',  $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

if($status==false){
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  header('location: user_select.php');
}
?>
