<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../assets/login.css">
    <title>Login</title>
</head>
<body>
    <section>
        <div class="container">
            <form action="../process/cekLogin.php" method="POST">
                <h1>Login</h1>
                <div class="input">
                    <span class="icon">
                        <img src="../assets/email.png" alt="email">
                    </span>
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input">
                    <span class="icon">
                        <img src="../assets/padlock.png" alt="password">
                    </span>
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class ="submit">
                    <button type="submit"><p>Login</p></button>
                </div>
                <div class="register">
                    <p>Belum punya akun? <a href="register.php">Buat akun</a></p>
                </div>
            </form>           
        </div>
    </section>   
</body>
</html>
