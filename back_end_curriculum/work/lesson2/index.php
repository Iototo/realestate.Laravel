<?php
echo "<h2> lesson 2 </h2>";
//課題１
$num = "2";
echo "課題１<br/>$num<br/>";
$num = "5";
echo "$num<br/><br/>";

//課題２
$num = 10;
echo "課題２<br/>$num<br/>";
$num = $num + 15;
echo "$num<br/>";
$num += 20;
echo "$num<br/><br/>";

//課題３
$surname = "市瀬";
$name = "伊織";
echo "課題３<br/>";
echo $surname .$name;
echo "<br/><br/>";

//課題４
echo "課題４<br/>";
echo 'こんにちは！"';
echo " '今' 私は'PHP'";
echo 'を勉強しています"';

// 右の文字列を出力してください。こんにちは！ " '今' 私は’PHP’を勉強しています”
$test3 = 'こんにちは!';
$test4 = "\" '今' 私は’PHP’を勉強しています\"";
echo $test3 . $test4;
