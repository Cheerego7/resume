<!doctype html>
<html lang="zh-cn">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="app.css" />
    <title>用户登入</title>
  </head>
  <body>
    <!-- 页面内容区域 -->
    <div class="container">
      <?php $is_login=false; include 'header.php'; ?>
      <div class="page-box">      
      <h1 class="page-title">用户登入</h1>

      <form action="user_login_check.php" method="post" id="form_login" 
        onsubmit="send_form('form_login');return false;" >
            <div id="form_login_notice" class="form_info middle"></div>

            <div class="form-group">
              <input type="text" name="email" placeholder="Email" 
              class="form-control"/>
            </div>

            <div class="form-group">
              <input type="password" name="password" placeholder="密码(6~12个字符)"
              class="form-control"/>
            </div>

            <div class="form-group"><input type="submit" value="登陆" class="btn btn-primary"></div>
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