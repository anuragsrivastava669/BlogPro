function savePost() {
    const id = $('#post_id').val();
    const title = $('#title').val();
    const content = $('#content').val();

    if (!title || !content) {
        alert('Please fill in both title and content.');
        return;
    }

    $.post('/post/save', { id, title, content }, function (res) {
        alert("Post " + res.status);
        if (res.status === 'saved') {
            $('#post_id').val('');
            $('#title').val('');
            $('#content').val('');
        }
    });
}

function viewPost(id) {
    $.get('/post/view/' + id, function(post) {
        if (!post || !post.id) {
            alert("Post not found.");
            return;
        }

        $('#post_id').val(post.id);
        $('#title').val(post.title);
        $('#content').val(post.content);
    }).fail(function(xhr) {
        alert("Failed to fetch post: " + xhr.statusText);
    });
}


function deletePost(id) {
    if (confirm('Are you sure you want to delete this post?')) {
        $.ajax({
            url: '/post/delete/' + id,
            type: 'DELETE',
            success: function (res) {
                alert("Post " + res.status);
                $('#post_id').val('');
                $('#title').val('');
                $('#content').val('');
            }
        });
    }
}
