<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Postify - Full Blog</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/post_view.css') ?>">
</head>
<body>
    <div class="container">
        <div class="post-container">
            <h1 class="logo">😊 Postify</h1>
            <h1 id="post-title">Loading...</h1>
            <p class="meta">Published on : <span id="post-date"></span> | <span id="post-author"></span></p>
            <div id="post-content"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/js/post_view.js') ?>"></script>
</body>
</html>
