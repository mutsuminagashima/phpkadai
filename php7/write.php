<?php
//各項目を変数に代入
$name = $_POST['name'];
$email = $_POST['email'];
$old = $_POST['old'];

//htmlspecialchars関数
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}

//入力するデータを変数に代入
$list = array(h($name),h($email),h($old));

// var_dump($list);

//ファイルを追加書き込みで開く
$fp = fopen('file.csv', 'a');
//上で作ったリストを書き込み
fputcsv($fp, $list);
//ファイルを閉じる
fclose($fp);

header('location: read.php');
?>
