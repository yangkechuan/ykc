<?php
if($_POST["submit"] == "发言")
{
    $link_ID=mysql_connect("localhost","root","123456");
    mysql_select_db("users");
//            $time=date(y).date(m).date(d).date(h).date(i).date(s);//获取当前时间
    $time=date('Y-m-d H:i:s');//获取当前时间，需提前设置php.ini中的date
    @session_start();
    $user1=$_SESSION['username'];
    $words=$_POST['words'];
    $str="insert chatuser1(chtime,user1,words) values('$time','$user1','$words')";
    mysql_query($str,$link_ID);//送出发言导数据库
    mysql_close($link_ID);
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" target="_self"><!--实现本页跳转-->
    <input type="text" name="words" cols="20">
    <input type="submit" value="发言" name="submit">
</form>