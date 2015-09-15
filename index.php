<html>
<title>用户登录</title>
<style>
    #form1
    {
        border: double;
        border-color: blueviolet;
        padding: 15px;
        margin: 30px;
        width: auto;
        background-color: aqua;
    }
</style>
<body>
<form action="login.php" method="post" id="form1">
   用户名：<input type="text" name="username" >
    <br/>
    密码：<input type="password" name="password" >
    <br/>
    <input type="submit" name="submit" value="登录">
    <input type="submit" name="submit" value="注册">

</form>
</body>
</html>