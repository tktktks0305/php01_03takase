<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表</title>
</head>

<body>
    <table>
        <?php
        //表のタイトル・項目名を表示
        echo "<caption><h2>お問い合わせ一覧</h2></caption>";
        echo "<tr>\n";
        echo "<th>お問い合わせ日時</th><th>お名前</th><th>年齢</th><th>EMAIL</th><th>きっかけ</th><th>志望動機</th><th>一言コメント</th>";
        echo "</tr>\n";
        
        //回答カウント用の変数
        $countChance1 = 0;
        $countChance2 = 0;
        $countChance3 = 0;
        $countChance4 = 0;
        $countChance5 = 0;

        $countReason1 = 0;
        $countReason2 = 0;
        $countReason3 = 0;
        $countReason4 = 0;

        //ファイルを開く
        $fp = fopen('./data/applicantData.txt', 'r');
        //ファイルの終わりまで1行ずつ読み込み→表の形式で書き出し
        while (!feof($fp)) {
            $line = fgets($fp);
            if (trim($line) != null) { //trimは文字列から前後のスペースや改行文字を取り除く
                list ($date, $name, $age, $email, $chance, $reason, $detail) = explode("\t", $line);
                echo "<tr>\n";
                echo "<td>$date</td><<td>$name</td><td>$age</td><td>$email</td><td>$chance</td><td>$reason</td><td>$detail</td>\n";
                echo "</tr>\n";

                if ($chance == 1) {
                    $countChance1++;
                }
                else if ($chance == 2) {
                    $countChance2++;
                }
                else if ($chance == 3) {
                    $countChance3++;
                }
                else if ($chance == 4) {
                    $countChance4++;
                }
                else {
                    $countChance5++;
                };
    
                if ($reason == 1) {
                    $countReason1++;
                }
                else if ($reason == 2) {
                    $countReason2++;
                }
                else if ($reason == 3) {
                    $countReason3++;
                }
                else {
                    $countReason4++;
                };
            }
        };
        //ファイルを閉じる
        fclose($fp);
        ?>
    </table>

    <section id="graphArea">

        <?php
            //円グラフ用に各回答の割合を積み上げ
            $countChanceTotal   = $countChance1 + $countChance2 + $countChance3 + $countChance4 + $countChance5;
            $ratioChance1       = $countChance1 / $countChanceTotal * 100;
            $ratioChance2       = ($countChance1 + $countChance2) / $countChanceTotal * 100;
            $ratioChance3       = ($countChance1 + $countChance2 + $countChance3) / $countChanceTotal * 100;
            $ratioChance4       = ($countChance1 + $countChance2 + $countChance3 + $countChance4) / $countChanceTotal * 100;
            $ratioChance5       = ($countChance1 + $countChance2 + $countChance3 + $countChance4 + $countChance5) / $countChanceTotal * 100;

            $countReasonTotal   = $countReason1 + $countReason2 + $countReason3 + $countReason4;
            $ratioReason1       = $countReason1 / $countReasonTotal * 100;
            $ratioReason2       = ($countReason1 + $countReason2) / $countReasonTotal * 100;
            $ratioReason3       = ($countReason1 + $countReason2 + $countReason3) / $countReasonTotal * 100;
            $ratioReason4       = ($countReason1 + $countReason2 + $countReason3 + $countReason4) / $countReasonTotal * 100;

            //円グラフ用のCSSを変数で定義
            $graph1Design       = "conic-gradient(#0F0 0% $ratioChance1%, #0FF $ratioChance1% $ratioChance2%, #FF0 $ratioChance2% $ratioChance3%, #F00 $ratioChance3% $ratioChance4%, #F0F $ratioChance4% $ratioChance5%)";
            $graph2Design       = "conic-gradient(#00F 0% $ratioReason1%, #000080 $ratioReason1% $ratioReason2%, #008080 $ratioReason2% $ratioReason3%, #008000 $ratioReason3% $ratioReason4%)";
        ?>
        
        <div class="graph1Box">
            <h3>きっかけ</h3>
            
            <div class="graph graph1"></div>

            <div>
                <ul>
                    <li class="chance1">1: Google検索</li>
                    <li class="chance2">2: SNS</li>
                    <li class="chance3">3: 紹介</li>
                    <li class="chance4">4: たまたま通りかかった</li>
                    <li class="chance5">5: その他</li>
                </ul>
            </div>

        </div>

        <div class="graph2Box">
            <h3>志望動機</h3>

            <div class="graph graph2"></div>

            <div>
                <ul>
                    <li class="reason1">1: 起業をしたい</li>
                    <li class="reason2">2: チーズ系企業に就職・転職したい</li>
                    <li class="reason3">3: チーズと関わる仕事をしており、仕事に生かしたい</li>
                    <li class="reason4">4: チーズの教養を身につけたい</li>
                </ul>
            </div>

        </div>

        
    </section>

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
        border-collapse: collapse;
        border: 1px solid #666;
        margin: 0 auto;
    }

    td, th {
        border: 1px solid #666;
        padding: 0.3em 0.5em; 
    }

    #graphArea {
        width: 800px;
        margin: 20px auto;
        padding: 20px;
        display: flex;
        justify-content: space-between;
    }

    .graph {
        position: relative;
        margin: 0 auto;
        width: 300px;
        height: 300px;
        border-radius: 50%;
    }

    .graph1 {
        background: <?= $graph1Design; ?>;
    }

    .graph2 {
        background: <?= $graph2Design; ?>;
    }

    /*グラフの判例*/
	li {
		list-style-type: none;
		margin: 2px;
		padding: 0.5em 0.5em 0.5em 0.5em;
		background: white;
		width: 300px;
        text-align: left;
	}

	/*リストの各要素に前要素として■を付ける*/
	li:before {
		content: "";
		display: inline-block;
		height: 15px;
		width: 15px;
		margin-right: 5px;
	}

	/*リストの各要素の前要素のデザインを設定 きっかけ*/
	li.chance1:before {
		background: #0F0;
		border-radius:10;
	}
	li.chance2:before {
		background: #0FF;
		border-radius:10;
	}
	li.chance3:before {
		background: #FF0;
		border-radius:10;
	}
	li.chance4:before {
		background: #F00;
		border-radius:2;
	}
	li.chance5:before {
		background: #F0F;
		border-radius:2;
    }

    /*リストの各要素の前要素のデザインを設定 志望動機*/
	li.reason1:before {
		background: #00F;
		border-radius:10;
	}
	li.reason2:before {
		background: #000080;
		border-radius:10;
	}
	li.reason3:before {
		background: #008080;
		border-radius:10;
	}
	li.reason4:before {
		background: #008000;
		border-radius:2;
	}
    
</style>

</html>