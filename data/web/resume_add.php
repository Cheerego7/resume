<?php

session_start();
if( intval( $_SESSION['uid'] ) <1 )
{
    header("Location: user_login.new.php");
    die("请先<a href='user_login.new.php'>登入</a>再添加简历");
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
    <title>添加简历</title>
  </head>
  <body>
    <!-- 页面内容区域 -->
    <div class="container">
      <div class="page-box">      
      <h1 class="page-title">添加简历</h1>

      <form action="resume_save.php" method="post" id="form_resume" 
      onsubmit="send_form('form_resume');return false;">
            <div id="form_resume_notice" class="form_info middle"></div>

            <div class="form-group">
                <input type="text" name="title" placeholder="简历名称" 
                class="form-control" />
            </div>

            <div class="form-group">
                <textarea rows="10" name="content" placeholder="简历内容，支持 Markdown 语法" class="form-control">
                </textarea>
            </div>

            <input type="hidden" name="id"/>

            <div class="form-group"><input type="submit" value="保存简历" class="btn btn-primary">&nbsp;
            <input type="button" value="返回" class="btn btn-outline-secondary float-right" onClick="history.back(1);void(0);">
            </div>
        </form>
      </div>
    </div>
    <!-- /页面内容区域 -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>