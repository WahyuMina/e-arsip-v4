<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>E-Arsip - Login</title>



    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: url(file/bg.jpg) no-repeat;
        background-size: cover;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/floating-labels.css" rel="stylesheet">
</head>

<body>
    <form class="form-signin" method="post" action="cek_login.php">
        <div class="text-center mb-4">
            <img class="mb-2 rounded-circle" src="file/96d0a8d5124080d559d37fcd0b802571-removebg-preview.png" alt=""
                width="120" height="120">
            <h1 class="h3 mb-3 font-weight-normal text-white">Login E-Arsip</h1>
            <p class="text-white">Selamat Datang di E-Arsip
                </a></p>
        </div>

        <div class="form-label-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan UserName"
                required autofocus>
            <label for="username">UserName</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center text-white">&copy; 2024</p>
    </form>
</body>

</html>