<html>

<head>
	<meta charset="utf-8">
	<title>お申し込みフォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<h1>チーズアカデミーお申し込みフォーム</h1>

<form action="02_write.php" method="POST">
	<table id="applyForm">
		<tr><th>お名前</th><td><input type="text" name="name" placeholder="MIL 太郎"></td></tr>
		<tr><th>年齢</th><td><input type="number" name="age" placeholder="30"></td></tr>
		<tr><th>EMAIL</th><td><input type="text" name="email" placeholder="mil_4@php.test"></td></tr>
		<tr>
			<th>チーズアカデミーを知ったきっかけ</th>
			<td>
				<select name="chance" id="chance">
					<option value="1">Google検索</option>
					<option value="2">SNS</option>
					<option value="3">紹介</option>
					<option value="4">たまたま通りかかった</option>
					<option value="5">その他</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>志望動機</th>
			<td>
				<input type="checkbox" name="reason" value="1">&#009起業をしたい<br>
                <input type="checkbox" name="reason" value="2">&#009チーズ系企業に就職・転職したい<br>
                <input type="checkbox" name="reason" value="3">&#009チーズと関わる仕事をしており、仕事に生かしたい<br>
                <input type="checkbox" name="reason" value="4">&#009チーズの教養を身につけたい<br>
			</td>
		</tr>
		<tr><th>一言コメント</th><td><textarea name="detail" cols="30" rows="10"></textarea></td></tr>

	</table>
	<div class="submitButton"><input type="submit" value="送信"></div>
</form>


<h3><a href="index.html">戻る</a></h3>

</body>

<style>
body {
	width: 1200px;
	padding: 0 10px;
	margin: 20px auto;
	text-align: center;
}

table {
	margin: 10px auto;
}
</style>

</html>