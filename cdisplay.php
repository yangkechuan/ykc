<html>
<head>
    <title>用户发言：</title>
<!--    <meta http-equiv="refresh" content="5,url=chat.php">//每五秒刷新一次-->
        <meta http-equiv="refresh" content="2" charset="utf-8">
</head>
<body>
<?php
    $link_ID=mysql_connect("localhost","root","123456");
    //链接数据库
    mysql_select_db("users");//选择数据库
    $str="select * from chatuser1 ORDER BY chtime";//按照时间查询
    $result=mysql_query($str,$link_ID);
    $row=mysql_num_rows($result);//取得查询结果的记录
//    @msyql_data_seek($result,$row-15);//移动记录指针到前15条
//    if($row<15)$p=$row;else $p=15;//记录条数据
//    for($i=1;$i<=$p;$i++)
//        {
//            list($chtime,$user1,$words)=mysql_fetch_row($result);
//            echo $chtime;echo " ";echo"$user1";echo" ";echo"$words";echo"<br>";
//        }
//    mysql_close($link_ID);
    while($row=mysql_fetch_assoc($result))//将result结果中取出一条
        {
            echo "<tr><td>".$row['chtime'];echo"<br>";
            echo"<tr><td>".$row['user1'].":";echo"&nbsp;&nbsp;&nbsp;&nbsp";echo$row['words'];
            echo"<br><br><br>";
        }
?>

</body>
</html>