<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>4eachblog 掲示板</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
  
<body>

<?php
mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
$stmt = $pdo -> query("select * from 4each_keijiban");
    
?>

<header>
    <img src="4eachblog_logo.jpg" class="logo">
    <div class="top_menu">
        <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </div>
</header>
    <main>
        <div class="main_container">
            <div class="right">
                <h1>プログラミングに役立つ掲示板</h1>
                <div class="inputform">
                  <h2>入力フォーム</h2>
                  <form method="post" action="insert.php">
                    <div>
                        <label>ハンドルネーム</label>
                        <br>
                        <input type="text" size="35" class="handlename" name="handlename">
                        <br>
                    </div>
                    <div>
                        <label>タイトル</label>
                        <br>
                        <input type="text" size="35" class="title" name="title">
                        <br>
                    </div>
                    <div>
                        <label>コメント</label>
                        <br>
                        <textarea class="comments" cols="70" rows="12" name="comments"></textarea>
                        <br>
                    </div>
                    <div>
                      <input type="submit" class="button" value="投稿する">
                    </div>
                  </form>
                </div>
            </div>
            <div class="left">
                <h2 class="left_top">人気の記事</h2>
                <ul>
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ Top5</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h2>オススメリンク</h2>
                <ul>
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <h2>カテゴリ</h2>
                <ul>
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
        </div>
        
        <div class="bottom">
        <?php        
        while ($row = $stmt -> fetch()) {
            echo "<div class='kiji'>";
                echo "<h3>".$row['title']."</h3>";
                echo "<div class='contents'>";
                    echo $row['comments'];
                    echo "<div class='handlename2'>posted by ".$row['handlename']."</div>";
                echo "</div>";
            echo "</div>";
        }
        ?>
        </div>
        
    </main>
<footer>
    copyright©internouse | 4each blog the which provides A to Z about programming.
</footer>
</body>
</html>