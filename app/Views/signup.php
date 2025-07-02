<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="<?= base_url('css/signup.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('js/signup.js') ?>"></script>
</head>
<body>

<div class="container">
        <div class="logo">
            <img src="https://img.icons8.com/emoji/48/000000/smiling-face.png" alt="Postify Logo">
            <h1>Postify</h1>
        </div>

    <h2>Please Register</h2>

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

    <form id="signupForm" method="post" action="<?= base_url('signup/register') ?>">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
        <div>
             <a href="<?= base_url('login') ?>">Sign in</a>
        </div>
    </form>
</div>

</body>
</html>
