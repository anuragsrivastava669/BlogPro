$(document).ready(function () {
    fetchPosts();

    function fetchPosts() {
        $.get('/post/fetchAll', function (posts) {
            let rows = '';
            posts.forEach(post => {
                rows += `<tr>
                    <td>${post.title}</td>
                    <td>${post.author}</td>
                    <td>${post.date}</td>
                    <td>
                        <button class="editBtn" data-id="${post.id}">Edit</button>
                        <button class="deleteBtn" data-id="${post.id}">Delete</button>
                    </td>
                </tr>`;
            });
            $('#postTableBody').html(rows);
        });
    }
    
    $(document).ready(function () {
    $('#newPostBtn').on('click', function () {
        window.location.href = BASE_URL + 'post';  
    });
    });

   $(document).on('click', '.deleteBtn', function () {
    const id = $(this).data('id');
    if (confirm("Are you sure you want to delete this post?")) {
        $.ajax({
            url: BASE_URL + 'post/delete/' + id,
            method: 'DELETE',
            success: function () {
                alert('Post deleted successfully!');
                location.reload(); 
            },
            error: function () {
                alert('Failed to delete post.');
            }
        });
    }
});


    $(document).on('click', '.editBtn', function () {
        const id = $(this).data('id');
        $.get(`/post/get/${id}`, function (data) {
            $('#edit_id').val(data.id);
            $('#edit_title').val(data.title);
            $('#edit_author').val(data.author);
            $('#edit_date').val(data.date);
            $('#editModal').show();
        });
    });

    $('#editForm').submit(function (e) {
        e.preventDefault();
        $.post('/post/update', $(this).serialize(), function () {
            $('#editModal').hide();
            fetchPosts();
        });
    });
});
