<?php
echo "<h2> lesson 6 </h2>";
echo "<h3> 課題１ーーーーーーーーーーーーーーー </h3>";
echo "<h4>変数の文字列の長さを関数を使って取得し、ABCDEFGHIの文字列の長さを表示してください。 <br/> </h4>";

$str = 'ABCDEFGHI';

function getstrlength($str){
  return strlen($str);
}

echo "文字列の長さは「" . getstrlength($str) . "」です。";
//ここまでが課題１



echo "<h3> 課題２ーーーーーーーーーーーーーーー </h3>";
echo "<h4>3の倍数のみを表示する関数を作成し、表示してください。<br/>
      引数はランダムな数値を関数を使い定義してください。(乱数の最大値は100) <br/> </h4>";


function multiple3() {
$n = rand(1, 100);
$i = $n % 3;
if ($i == 0) {
  echo $n . "は3の倍数です。";
  } else {
  $n -= $i;
  echo $n . "は3の倍数です。";
  }
}
multiple3();
