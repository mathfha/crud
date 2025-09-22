<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
<link rel="stylesheet" href="assets/css/style_login.css?v=2">
    </head>
    <body>
        <div style="color:white; position:absolute; left: 590px; top: 120px; 
        font-size: 30px; background-color: black;">
        </div>
        <div class="container">
            <h1>Login ADMIN</h1>
            <form method="post" action="cek_login.php">
                <label>Username</label><br>
                <input type="text" name="user"><br>
                <label>Password</label><br>
                <input type="password" name="pass"><br>
                <button type="submit" name="submit">Log in</button>
            </form>
        </div>
    </body>
</html>