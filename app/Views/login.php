<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Postify - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link external CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://img.icons8.com/emoji/48/000000/smiling-face.png" alt="Postify Logo">
            <h1>Postify</h1>
        </div>

        <h2>Welcome Back</h2>
        <p>Please enter your credentials to log in.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('/login') ?>" id="loginForm">
            <?= csrf_field() ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>

            <div>
                <p class="register-text">
                    Don't have an account?
                  <a href="<?= base_url('register') ?>">Sign up</a>
                </p>
            </div>
        </form>
    </div>

    <!-- Link external JS -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>



