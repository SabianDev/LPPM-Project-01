<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="mainmenu.php" method="post" onsubmit="return validateForm()">
                <div class="logo">
                    <img src="img/logo_sipedas.png" alt="Logo Sipedas" width="130" height="130">
                </div>
                <br>
                <h1>Login</h1>
                <input type="email" id="email" placeholder="Email">
                <input type="password" id="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right image-row">
                    <img src="img/logo2.png" alt="logo" width="300" height="300">
                </div>
            </div>
        </div>
    </div>

    <script>
    function validateForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        if (email == "" || password == "") {
            alert("Email dan Password harus diisi!");
            return false;
        }
        return true;
    }
    </script>
</body>
</html>
