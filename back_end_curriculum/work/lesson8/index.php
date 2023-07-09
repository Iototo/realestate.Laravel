<?php
session_start();

echo "<h2> lesson 8 </h2>";

echo "<h3> 課題１ーーーーーーーーーーーーーーー </h3>";

echo "<h4> お問い合わせフォームを作成してください。<br/>
      機能要件は以下になります。<br/>
     ・名前の記入欄 <br/>
     ・電話番号の記入欄 <br/>
     ・メールアドレスの記入欄 <br/>
     ・質問等の記入欄 <br/> <br/> ";

echo "<br/><h5>「お問い合わせフォーム」</h5>";

$mode ='input';
$errmessage = array();

if(!empty($_POST['back']) && $_POST['back']){
  //何もしない
}elseif(!empty($_POST['confirm']) && $_POST['confirm']){

  //確認画面でのエラー処理
  if(!$_POST['fullname']){
    $errmessage[] = "・名前を入力してください。";
    }elseif(mb_strlen($_POST ['fullname']) >= 20 ){
    $errmessage[] = "・名前は２０文字以内にしてください。";
  }
  $_SESSION['fullname'] = htmlspecialchars($_POST ['fullname'] , ENT_QUOTES);
  //ここまでが名前の処理

  if(!$_POST['tell']){
    $errmessage[] = "・電話番号を入力してください。";
    }elseif(mb_strlen($_POST ['tell']) > 12){
    $errmessage[] = "・電話番号はハイフン無しで１１文字以内にしてください。";
  }
  $_SESSION['tell'] = htmlspecialchars($_POST ['tell'] , ENT_QUOTES);
  //ここまでが電話番号の処理

  if(!$_POST['email']){
    $errmessage[] = "・Ｅメールを入力してください。";
    }elseif(mb_strlen($_POST ['email']) >= 100 ){
    $errmessage[] = "・Ｅメールは１００文字以内にしてください。";
    }elseif(!filter_var($_POST ["email"] , FILTER_VALIDATE_EMAIL)){
    $errmessage[] = "・メールアドレスが不正です。";
  }
  $_SESSION['email'] = htmlspecialchars($_POST ['email'] , ENT_QUOTES);
  //ここまでがＥメールの処理

  if(!$_POST['message']){
    $errmessage[] = "・ご質問等お問い合わせ内容を入力してください。";
    }elseif(mb_strlen($_POST ['message']) > 1001 ){
    $errmessage[] = "・ご質問等お問い合わせ内容は１０００文字以内にしてください。";
  }
  $_SESSION['message'] = htmlspecialchars($_POST ['message'] , ENT_QUOTES);
  //ここまでが質問等の記入欄の処理

  if($errmessage){
    $mode = 'input';
    }else{
    $mode = 'confirm';
  }
  //ここまでが確認画面でのエラー処理

  //送信ボタンを押してエラーが無かった時の処理
}elseif(!empty($_POST['send']) && $_POST['send']){
  $message = " お問い合わせを受け付けました。\r\n"
           . "名前:" . $_SESSION['fullname'] . "\r\n"
           . "電話番号:" . $_SESSION['tell'] . "\r\n"
           . "Email:" . $_SESSION['email'] . "\r\n"
           . "ご質問等お問い合わせ内容：\r\n"
           . preg_replace("/\r\n|\r|\n/" , "\r\n" , $_SESSION["message"]);

  mail($_SESSION['email'] , 'お問い合わせありがとうございます。' , $message);
  mail('ioriicchii@gmail.com' , 'お問い合わせありがとうございます。' , $message);

  try {
    $dsn = "mysql:host=cc43ecf17e36;dbname=convi;charset=utf8";
    $user = "user";
    $password = "conviction";

    $pdo = new PDO($dsn, $user, $password);
    echo "接続成功";

    $name = $_SESSION['fullname'];
    $tell = $_SESSION['tell'];
    $email = $_SESSION['email'];
    $message = $_SESSION['message'];

    $sql = "INSERT INTO users (name, tel, mail, others) VALUES (:name, :tel, :mail, :others)";
    // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく
    $stmt = $pdo->prepare($sql);
    //値が空のままSQL文をセット
    $params = array(':name' => $name, ':tel' => $tell, ':mail' => $email, ':others' => $message);
    // 挿入する値を配列に格納
    $stmt->execute($params);
    //挿入する値が入った変数をexecuteにセットしてSQLを実行

    // 登録内容確認・メッセージ
    echo "<br/>名前：" . $name;
    echo "<br/>電話番号：" . $tell;
    echo "<br/>Eメール：" . $email;
    echo "<br/>お問い合わせ内容：" . $message;
    echo "<br/>上記の内容をデータベースへ登録しました。";

  } catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
  }

  $_SESSION = array(); //初期化
  $mode = 'send';

//データを保存
}else{
  $_SESSION['fullname'] = "";
  $_SESSION['tell'] = "";
  $_SESSION['email'] = "";
  $_SESSION['message'] = "";
}
?>
<!-- ここまでがＰＨＰ -->

<!DOCTYPE html> <!--htmlが始まる-->
<html lang = "ja">
<head>
  <meta charset = "utf-8">
  <title> lesson 07 </title>
</head>

<body>
<?php //PHP
if($mode == 'input'){
  if($errmessage){
    echo '<div style = "color : red ;">';
    echo implode('<br>' , $errmessage);  //各エラーに改行を付与
    echo '</div>';
  }
?>

<!-- 入力画面 -->
<form action = "./index.php" method = "post">

<div><label for = "name">名前</label> <input type = "text" name = "fullname" placeholder = "鈴木 太郎"
value = "<?php echo $_SESSION['fullname'] ?>"></div><br>

<div><label for = "tell">電話番号</label> <input type = "tell" name = "tell" placeholder = "08012345678"
value = "<?php echo $_SESSION['tell'] ?>"></div><br>

<div><label for = "email">Ｅメール</label> <input type = "email" name = "email" placeholder = "example@example.com"
value = "<?php echo $_SESSION['email'] ?>"></div><br>

<div><label for = "message">ご質問等お問い合わせ内容</label><br>
<textarea cols = "40" rows = "8" name = "message"><?php echo $_SESSION['message'] ?></textarea></div><br>

<input type = "submit" name = "confirm" value = "確認" />
</form>

<!-- 確認画面 -->
<?php
} elseif($mode == 'confirm'){
?> 

<form action = "./index.php" method = "post">

名前 : <?php echo $_SESSION['fullname'] ?> <br>

電話番号 : <?php echo $_SESSION['tell'] ?> <br>

Eメール :  <?php echo $_SESSION['email'] ?> <br>

お問い合わせ内容 <br>
<?php
echo nl2br($_SESSION['message'])
?> <br> <!--ユーザーが改行したことを確認画面にも適応させる-->

<input type = "submit" name = "back" value = "戻る" />
<input type = "submit" name = "send" value = "送信" />
</form>

<!-- 完了画面 -->
<?php
}else{
?>

送信しました。お問い合わせありがとうございました。 <br>

<?php
}
?>

</body>
</html>

<?php
echo "<br/><h3> 課題２ーーーーーーーーーーーーーーー </h3>";

echo "<h4>フォームの情報を保存するためのテーブルを作成してください。</h4>";

echo "コード上の７８行目から１０９行目までにテーブルを作成したコードを書き込みました。";

echo "<br/><h3> 課題３ーーーーーーーーーーーーーーー </h3>";

echo "<h4>課題１で作ったフォームから送られるデータを課題２で作成したテーブルに保存してください。</h4>";

echo "コード上の８６行目から１０５行目までに保存するコードを書き込みました。";

?>

