<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Postify - All Posts</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/post_list.css') ?>">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">😊 BlogPost</div>
            <ul class="navbar-menu">
                <li><a href="/post/postList">Home</a></li>

                <?php if (session()->get('isLoggedIn')): ?>
                <li><a href="/logout">Logout</a></li>
                <?php else: ?>
                <li><a href="/register">Signup</a></li>
                <li><a href="/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <h1 class="logo">😊 Postify</h1>
        <div id="postsContainer"></div>
    </div>

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/js/post_list.js') ?>"></script>
</body>
</html>
