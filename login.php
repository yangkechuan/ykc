<?php
if (isset($_POST["submit"])&&$_POST["submit"] == "登录")
    {
        $user=$_POST["username"];
        $psw=$_POST["password"];
        if($user == ""||$psw == "")
            {
                echo "<script>alert('请输入账号密码！');history.go(-1);</script>";//跳转到前一个界面
            }
        else
        {
            $link = mysql_connect("localhost", "root", "123456");
            mysql_select_db("users", $link);
            mysql_query("SET NAMES UTF-8");
            $q = "select username,password from user_message WHERE  username='$_POST[username]'AND  password='$_POST[password]'";
            $rs = mysql_query($q);//获取数据集
            $num = mysql_num_rows($rs);
            if ($num)
                {
//                $row = mysql_fetch_array($rs);//将数据以索引方式储存在数组中
//                    echo $row[0];
                @session_start();      //利用session在多个页面中传值
                $_SESSION['username']=$user;
                $_SESSION['password']=$psw;
                header("Location:chat.php");//实现页面跳转
                exit;
                }
            else
                {
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
                }
        }
    }




elseif(isset($_POST['submit'])&&$_POST['submit'] == "注册")
    {
        $user=$_POST['username'];
        $psw=$_POST['password'];
        if($user==''||$psw=='')
            {
                echo"<script>alert('账号密码不能为空！');history.go(-1);</script>>";
            }
        else
            {
                $link=mysql_connect("localhost","root","123456");
                mysql_select_db("users",$link);
                mysql_query("set names utf-8");
                $q="select username from user_message WHERE username='$user'";
                $result=mysql_query($q);
                $num1=mysql_num_rows($result);
                if($num1)
                    {
                        echo"<script>alert('用户已存在');history.go(-1);</script>>";
                    }
                else  //用户不存在，开始注册
                    {
                         $sql_inset="INSERT  into user_message(username,password) values('$user','$psw')";
                         $re_inset=mysql_query($sql_inset);
//                       $num2=mysql_num_rows($re_inset);
//                       $num2=mysql_affected_rows($re_inset);
                         if($re_inset)
                            {
                                @session_start();
                                $_SESSION['username']=$user;
                                echo"<script>alert('注册成功')</script>>";
                                header("Location:chat.php");//实现页面跳转
                            }
                         else
                         {
                             echo"<script>alert('注册失败');history.go(-1)</script>>";
                         }
                    }
            }
    }
?>