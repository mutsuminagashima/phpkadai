<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー一覧</a></div>
    </div>
  </nav>
</header>
<?php
include('func.php');
$pdo = db_conn();
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  $row = $stmt->fetch();
}
?>



<form method="post" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
    <input type="hidden" name="id" value="<?=$row['id']?>">
     <label>名前：<input type="text" name="u_name" value="<?=$row['u_name']?>"></label><br>
     <label>URL：<input type="text" name="lid" value="<?=$row['lid']?>"></label><br>
     <label>URL：<input type="text" name="lpw" value="<?=$row['lpw']?>"></label><br>
    <label>
        <input type="checkbox" name="kanri_flg" value="1">管理者
    </label>
    <label>
        <input type="checkbox" name="kanri_flg" value="0">一般
    </label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>


</body>
</html>
