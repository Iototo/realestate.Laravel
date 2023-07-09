<?php
echo "<h2> lesson 3 </h2>";
echo "<h3> 課題１ーーーーーーーーーー </h3>";
echo "<h4> 1~10まで数値をランダムで生成して、偶数か奇数かを判定し表示するようにしてください。
      <br/>生成したランダム値も表示してください。 </h4>";

$num = rand(1,10);
echo "数字を出力 => $num<br/>";

if($num % 2 == 0){
    echo "この数字は「偶数」です。";
}else{
    echo "この数字は「奇数」です。";
}

echo "<br/>";
//ここまでが課題１

echo "<h3> 課題２ーーーーーーーーーー </h3>";

echo "<h4> テストの点数をランダムで生成して、点数に応じて以下の通り成績を表示してください。</h4>
      <h5> 0点〜49点 &ensp; &ensp; 不可
      <br/> 50点〜69点 &ensp; 可
      <br/> 70点〜79点 &ensp; 良
      <br/> 80点〜99点 &ensp; 優
      <br/> 100点 &emsp; &emsp; &emsp;満点 </h5>";

$score = rand(1,100);

echo "あなたのテストの点数は $score 点です。<br/>";
echo "よって成績は「";

switch($score){
    case $score >=50 && $score <=69:
    echo '可';
    break;

    case $score >=70 && $score <=79:
    echo '良';
    break;

    case $score >=80 && $score <=99:
    echo '優';
    break;

    case '100':
    echo '満点';
    break;

    default:
    echo '不可';
    break;
}


echo "」です。<br/>";
//ここまでが課題２

echo "<h3> 課題３ーーーーーーーーーー </h3>";
echo "<h4> ２教科のテストの点数をランダムで生成して、以下の条件に応じて合格/不合格を表示してください。</h4>
      <h5>両方とも 60 点以上の場合　合格
      <br/>合計が 130 点以上の場合　合格
      <br/>合計が 100 点以上かつ　どちらかのテストが90点以上であれば合格
      <br/>上記以外は不合格 </h5>";

$mathscore = rand(1,100);
$englishscore = rand(1,100);

echo "あなたの数学の点数は $mathscore 点です。<br/>";
echo "あなたの英語の点数は $englishscore 点です。<br/>";
echo "あなたは「";

if($mathscore >=60 && $englishscore >=60){
    echo "合格";
}elseif($mathscore + $englishscore >=130){
    echo "合格";
}elseif(($mathscore + $englishscore >=100) &&
    ($mathscore >=90 || $englishscore >=90)
    ){echo "合格";
}else{
    echo "不合格";
}

echo "」です。";
//ここまでが課題３
