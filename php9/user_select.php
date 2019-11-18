<?php
include('func.php');
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();


$view="";
if($status==false) {
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p>';
    $view .= '<a href="user_update_view.php?id='.$result["id"].'">';
    $view .= $result["id"]."|".$result["u_name"]."|".$result["lid"]."|".$result['lpw']."|".$result['kanri_flg'];
    $view .= '</a>';
    $view .= '<a href="user_delete.php?id='.$result["id"].'">';
    $view .= '[削除]<br>';
    $view .= '</a>';
    $view .= '</p>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="user_entry.php">ユーザー登録</a>
      </div>
    </div>
  </nav>
</header>
<div>
    <div class="container jumbotron"><?=$view; ?></div>
</div>

</body>
</html>
