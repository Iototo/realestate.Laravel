<?php

echo "<h2> lesson 9 </h2>";

echo "<h3> 課題１ーーーーーーーーーーーーーーー </h3>";

echo "<h4> クラス、プロパティ、メソッドを利用して\"Hello World\"(プロパティ定義)を画面上に表記してください。</h4>";

class Lesson09{
  public $message = "Hello World";

  public function desplayHW(){
    echo $this->message;
  }
};

$hw = new Lesson09();
$hw->desplayHW();



echo "<h3> 課題２ーーーーーーーーーーーーーーー</h3>";

echo "<h4> ①親クラスで設定した\"Hello World\"を継承する。
  ②継承したクラスをインスタンス化する際に任意のパラメータ(\"!!!\")を設定し、そちらと継承した\"Hello World\"をまとめて\"Hello World!!!\"(びっくりマークを三つ)を表記する。</h4>";

class HW2 extends Lesson09{
  public function __construct($exclamation){
    $this->message .= $exclamation;
  }
};

$hwae = new HW2("!!!");
$hwae->desplayHW();



echo "<h3> 課題３ーーーーーーーーーーーーーーー </h3>";

echo "<h4> staticプロパティ(\"Hello World\")・メソッドを利用し、\"Hello World!!!!!!\"(びっくりマークを六つ)を表記して下さい。</h4>";

class StaticHW {
  public static $message = "Hello World";

  public static function desplayHWE6(){
    echo self::$message . "!!!!!!";
  }
}

StaticHW::desplayHWE6();
