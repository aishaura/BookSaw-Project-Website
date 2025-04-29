<?php
require_once "connection.php"; // Pastikan koneksi database benar
session_start(); // Mulai sesi untuk menyimpan data user

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil input username dan password dari form
    $username = htmlspecialchars($_POST['username']); // Sanitasi input
    $password = htmlspecialchars($_POST['password']); // Sanitasi input

    // Tentukan username dan password untuk admin
    $admin_username = "Haura";
    $admin_password = "Haura2004@";

    // Cek apakah username dan password yang dimasukkan sesuai dengan yang ditentukan
    if ($username == $admin_username && $password == $admin_password) {
        // Jika benar, buat sesi login untuk admin
        $_SESSION['username'] = $username;

        // Redirect ke halaman dashboard
        header("Location: admin.php");
        exit;
    } else {
        $login_error = true; // Set variabel error menjadi true
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_login'])) {
    // Pastikan koneksi database tersedia
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Ambil data dari form
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = $_POST['password']; // Password akan diverifikasi menggunakan password_verify()

    // Query untuk mendapatkan user berdasarkan username
    $sql = "SELECT * FROM pembeli WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameter dan eksekusi query
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Jika login berhasil, simpan data user ke session
                $_SESSION['username'] = $user['username']; // Simpan username ke session
                $_SESSION['user_id'] = $user['id'];  // Simpan user_id ke session (jika diperlukan)

                // Redirect ke halaman utama setelah login berhasil
                header("Location: user.php");
                exit();
            } else {
                // Jika password salah
                $error_message = "Password salah!";
            }
        } else {
            // Jika username tidak ditemukan
            $error_message = "Username tidak ditemukan!";
        }
    } else {
        $error_message = "Kesalahan pada query database.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"
    />
    <title>Sign Up Page</title>
    <style>
        .container button {
    background-color: #812da8;
    color: #fff;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
  }
  .toogle {
    background-color: #7f2da8;
    height: 100%;
    background: linear-gradient(to right, #9b2dc7, #712da8);
    color: #fff;
    position: relative;
    left: -100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
  }
    </style>
  
</head>
<body>
    <div class="container" id="container">
        <div class="sign-up">
            <form action="signin.php" method="POST">
                <h1>Admin Login Page</h1>

                <div class="icons">
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                </div>

                <input type="text" name="username" placeholder="Admin Id" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="sign-in">
        <form action="signin.php" method="POST">
            <h1>User Login Page</h1>
                <div class="icons">
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                </div>
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit" name="user_login">Sign in</button>
                <p class="account-link">Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>


        </div>
        <div class="toogle-container">
            <div class="toogle">
                <div class="toogle-panel toogle-left">
                    <h1>Welcome User!</h1>
                    <p>Login here if you're user</p>
                    <button class="hidden" id="login">User Site</button>
                </div>
                <div class="toogle-panel toogle-right">
                    <h1>Hello, Admin!</h1>
                    <p>Login here if you're the owner</p>
                    <button class="hidden" id="register">Admin Site</button>
                </div>
            </div>
        </div>
    </div>


      <!-- Tampilkan Pesan -->
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?= $error_message ?></p>
    <?php endif; ?>
    
    <!--  -->
    <script src="scriptlogin.js"></script>
</body>
</html>




