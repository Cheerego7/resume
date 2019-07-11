<?php

session_start();
if( intval( $_SESSION['uid'] ) <1 )
{
    header("Location: user_login.php");
    die("请先<a href='user_login.php'>登入</a>再添加简历");
}

$id = intval( $_REQUEST['id'] );
if( $id < 1 ) die("错误的简历ID");

try
{
    $dbh = new PDO( 'mysql:host=mysql.ftqq.com;dbname=fangtangdb' , 'php' , 'fangtang' );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM `resume` WHERE `id` = ? LIMIT 1";

    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ $id ] );
    //按字段名连起来
    $resume = $sth->fetch(PDO::FETCH_ASSOC);

    if( $resume['uid'] != $_SESSION['uid'] )die("只能修改自己的简历");

}
catch( Exception $Exception )
{
    die( $Exception->getMessage() );
}
?><!doctype html>
<html lang="zh-cn">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="app.css" />
    <title>修改简历</title>
  </head>
  <body>
    <!-- 页面内容区域 -->
    <div class="container">
      <div class="page-box">      
      <h1 class="page-title">修改简历</h1>

      <form action="resume_update.php" method="post" id="form_resume" 
      onsubmit="send_form('form_resume');return false;">
            <div id="form_resume_notice" class="form_info middle"></div>

            <div class="form-group">
                <input type="text" name="title" placeholder="简历名称" 
                class="form-control" value="<?=$resume['title']?>"/>
            </div>

            <div class="form-group">
                <textarea rows="10" name="content" placeholder="简历内容，支持 Markdown 语法" class="form-control">
                <?=htmlspecialchars( $resume['content'] ) ?></textarea>
            </div>

            <input type="hidden" name="id" value="<?=$resume['id']?>"/>

            <div class="form-group"><input type="submit" value="更新简历" class="btn btn-primary">&nbsp;
            <input type="button" value="返回" class="btn btn-outline-secondary float-right" onClick="history.back(1);void(0);">
            </div>
        </form>
      </div>
    </div>
    <!-- /页面内容区域 -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>