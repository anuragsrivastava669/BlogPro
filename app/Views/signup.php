<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - Postify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/signup.css') ?>">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- External JS -->
     <script>
     const BASE_URL = "<?= base_url() ?>";
     </script>
    <script src="<?= base_url('assets/js/signup.js') ?>"></script>
</head>
<body>

<div class="signup-container">
    <h2>Create Your Account</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul class="errors">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form id="signupForm" method="post" >
        <?= csrf_field() ?>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <div class="login-link">
            Already have an account? 
            <a href="<?= base_url('login') ?>">Sign in</a>
        </div>
    </form>
</div>

</body>
</html>

