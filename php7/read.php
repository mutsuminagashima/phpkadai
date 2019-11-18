<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>表示</title>
</head>
<body>
    <table>
        <tr>
            <th>名前</th>
            <th>メール</th>
            <th>年齢</th>
        </tr>
<?php
// ファイルが存在しているかチェックする
if (($handle = fopen("file.csv", "r")) !== false) {
    while (($data = fgetcsv($handle))) {
        //データを配列から取り出しテーブルタグの中に記入
        echo '<tr>';
        echo '<td>'.$data[0].'</td>';
        echo '<td>'.$data[1].'</td>';
        echo '<td>'.$data[2].'</td>';
        echo '</tr>';
    }
    fclose($handle);
}
?>

    <a href="index.php">書き込みに戻る</a>
    </table>
</body>
</html>