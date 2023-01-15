<?php
// 時間取得
$date   = date('Y年m月d日 H時i分s秒');

//フォームから送られてきたデータを取得し変数に代入
$name   = $_POST['name'];
$age    = $_POST['age'];
$email  = $_POST['email'];
$chance = $_POST['chance'];
$reason = $_POST['reason'];
$detail = $_POST['detail'];

//書き込むデータを一つの変数にまとめる "" ''phpだとダブルとシングルは違う
$applicantData = $date."\t".$name."\t".$age."\t".$email."\t".$chance."\t".$reason."\t".$detail."\n";

// ファイルを読み込む
$file = fopen('./data/applicantData.txt', 'a'); //存在しないファイルを指定した場合、新規作成してくれる

// ファイルに書き込む
fwrite($file, $applicantData);

// ファイルを閉じる
fclose($file);

?>


<html>
<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>
<body>

<h1>お問い合わせありがとうございます</h1>
<h2>30営業日以内に折り返しご連絡差し上げるかもしれませんので期待せずにお待ちください</h2>

<h3><a href="index.html">戻る</a></h3>

</body>

<style>
body {
	width: 1200px;
	padding: 0 10px;
	margin: 20px auto;
	text-align: center;
}
</style>

</html>