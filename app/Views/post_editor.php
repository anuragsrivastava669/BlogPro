<!DOCTYPE html>
<html>
<head>
    <title>Postify - Post Editor</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/postify.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
 

<div class="container">
    <div class="header">
        <h1>😊 Postify</h1>
        <div class="actions">
            <button onclick="viewPost(1)" class="view-btn">View Post</button>
            <button onclick="deletePost(1)" class="delete-btn">Delete</button>
            <button onclick="savePost()" class="save-btn">Save Post</button>
        </div>
    </div>

    <input type="hidden" id="post_id">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" id="title" placeholder="Enter post title">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea id="content" rows="10" placeholder="Type or paste your content here!"></textarea>
    </div>

    
</div>

<script src="<?= base_url('assets/js/postify.js') ?>"></script>

</body>
</html>
