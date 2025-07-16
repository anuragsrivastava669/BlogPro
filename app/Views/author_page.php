<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Author Posts - Postify</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/author.css') ?>">
</head>
<body>
    <div class="container">
        <h1 class="logo">😊 Postify</h1>
        <p>Author</p>
        <h2 id="authorName">Loading...</h2>
        <p id="postCount">0 Posts</p>
        <div id="postList" class="post-list"></div>
    </div>
     
    <script>
     const fetchUrl = "<?= base_url('/author/fetch-posts') ?>";
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script src="<?= base_url('assets/js/author.js') ?>"></script>
</body>
</html>
