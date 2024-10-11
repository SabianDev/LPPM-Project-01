<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link css  -->
    <link rel="stylesheet" href="css/login-style.css">

    <!-- link icons  -->
    <script src="https://kit.fontawesome.com/59784df54a.js" crossorigin="anonymous"></script>
    <title>Halaman Login</title>
</head>

<body>
    <div class="container">
        <div class="github-logo">
            <img src="img/logopiksi.png" alt="Logo Piksi" style="width: 100px; height: auto;"> <!-- Perbesar ukuran gambar -->
        </div>
        <h1 class="github-head">
           Welcome to SIPEDAS
        </h1>
        <div class="login-wrapper">
            <form action="mainmenu.php" method="post">
                <div class="input-box">
                    <div class="input-label">Username</div>
                    <input type="text" placeholder="Masukkan username" required>
                </div>

                <div class="input-box">
                    <div class="input-label">
                        <span>Password</span>
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="password-wrapper">
                        <input type="password" id="password" placeholder="Masukkan password" required>
                        <i class="fa fa-eye toggle-password" id="togglePassword"></i>
                    </div>
                </div>
            
                <button class="submit-btn" type="submit">
                    Masuk
                </button>
            </form>
        </div>
 
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>