<?php
echo "<h2> lesson 5 </h2>";
echo "<h3> 課題1ーーーーーーーーーー </h3>";

echo "<h4> foreach文を使ったプログラムをfor文を使ったプログラムに書き換えてください。 </h4>";

echo "この直下に出力されたものは foreach 文を使ったもの。<br/>";

$names = ['太郎', '次郎', '三郎', '四郎', '五郎'];
foreach($names as $name) {
  echo $name . '<br>';
}

echo "<br/> この直下に出力されたものは for 文を使ったもの。（解答）<br/>";

$names = ['太郎', '次郎', '三郎', '四郎', '五郎'];

for ($i = 0 ; $i<count($names) ; $i++){
  echo $names[$i] . '<br/>';
}
//ここまでが課題１

echo "<h3> 課題2ーーーーーーーーーー </h3>";
echo "<h4> 指定の key と value の配列を繰り返し処理で全て表示してください。 </h4>";

$my_array = array(
  "key1" => "value1",
  "key2" => "value2",
  "key3" => "value3",
  "key4" => "value4",
  "key5" => "value5"
);

foreach ($my_array as $key => $value){
  echo $key . '=>' . $value . '<br/>';
}
//ここまでが課題２

echo "<h3> 課題3ーーーーーーーーーー </h3>";
echo "<h4> 1~10を表示する繰り返し処理で2で割り切れる場合は処理をスキップさせて表示してください。 </h4>";

for ($i = 0 ; $i <= 10 ; $i++){
  if ($i % 2 == 0){
    continue;
  }
  echo $i . ',';
}
//ここまでが課題３
