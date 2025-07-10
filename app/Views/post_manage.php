<!DOCTYPE html>
<html>
<head>
    <title>Post Management</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/post_manage.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="container">

        <div class="logo">
            <img src="https://img.icons8.com/emoji/48/000000/smiling-face.png" alt="Postify Logo">
            <h1>Postify</h1>
        </div>

         <div class="header">
            <h1>All Post</h1>
            <button id="newPostBtn">+ New post</button>
        </div>
       
        <table>
            <thead>
                <tr>
                    <th>Title</th><th>Author</th><th>Date</th><th>Actions</th>
                </tr>
            </thead>
            <tbody id="postTableBody">
                <?php foreach ($posts as $post): ?>
            <tr>
            <td><?= esc($post['title']) ?></td>
            <td><?= esc($post['author']) ?></td>
            <td><?= esc($post['date']) ?></td>
            <td>
                <button class="editBtn" data-id="<?= $post['id'] ?>">Edit</button>
                <button class="deleteBtn" data-id="<?= $post['id'] ?>">Delete</button>
            </td>
            </tr>
           <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" style="display:none; padding: 20px; background: #f3f3f3; border: 1px solid #ccc;">
        <h2>Edit Post</h2>
        <form id="editForm">
            <input type="hidden" name="id" id="edit_id">
            <label>Title:</label>
            <input type="text" name="title" id="edit_title" required><br><br>
            <label>Author:</label>
            <input type="text" name="author" id="edit_author" required><br><br>
            <label>Date:</label>
            <input type="date" name="date" id="edit_date" required><br><br>
            <button type="submit">Update</button>
            <button type="button" onclick="$('#editModal').hide()">Cancel</button>
        </form>
    </div>
     
    <script>
        const BASE_URL = "<?= base_url(); ?>";
    </script>

    <script src="<?= base_url('assets/js/post_manage.js') ?>"></script>
</body>
</html>
