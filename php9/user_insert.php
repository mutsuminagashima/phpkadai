<?php
include('func.php');
$pdo = db_conn();

$u_name = $_POST['u_name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];

echo $u_name;
echo $lid;
echo $lpw;
echo $kanri_flg;

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table VALUES(null, :u_name, :lid, :lpw, :kanri_flg)");
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  header('location: user_select.php');
}
?>
