<?php
session_start();
include 'connection.php'; // Memanggil koneksi database

$login_error = false; // Tambahkan variabel untuk menyimpan status login error

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'login_systems') or die("Koneksi gagal: " . mysqli_connect_error());
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $exists = mysqli_query($conn, "SELECT 1 FROM pembeli WHERE username = '$username'");
    if (mysqli_num_rows($exists)) {
        $signup_error = "Username sudah terdaftar.";
    } elseif (mysqli_query($conn, "INSERT INTO pembeli (username, password) VALUES ('$username', '$password')")) {
        header("Location: signin.php?message=success");
        // Redirect ke halaman dashboard
        header("Location: signin.php");
        exit;

    } else {
        $signup_error = "Gagal menyimpan data.";
    }

    mysqli_close($conn);
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
    <title>Login Page</title>
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
                <span>or use ID and Password</span>
                <input type="text" name="username" placeholder="Admin Id" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="sign-in">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h1>Create Account</h1>
    <div class="icons">
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                </div>
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit" name="save">Sign Up</button>
    <p class="account-link">Already have an account? <a href="signin.php">Sign in</a></p>
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

    <!--  -->
    <script src="scriptlogin.js"></script>
</body>
</html>
