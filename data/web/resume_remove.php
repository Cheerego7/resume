<?php
session_start();
if( intval( $_SESSION['uid'] ) <1 )
{
    header("location: user_login.php");
    die("请先<a href='user_login.php'>登入</a>再添加简历");
}

$id = intval( $_REQUEST['id'] );
if( $id < 1 ) die("错误的简历ID");


try
{
    $dbh = new PDO( 'mysql:host=mysql.ftqq.com;dbname=fangtangdb' , 'php' , 'fangtang' );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql命令，数据库更新
    $sql = "UPDATE `resume` SET `is_deleted` = 1 , `title` = CONCAT( `title` , ? ) 
    WHERE `id` = ? AND `uid` = ? LIMIT 1 ";

    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ '_DEL_'.time() , $id , intval( $_SESSION['uid'] ) ] );
    // die("简历删除成功<script>location='resume_list.php'</script>");
    //print_r( $resume_update );
    die("done");
}
catch( Exception $Exception )
{
    die( $Exception->getMessage() );
}

