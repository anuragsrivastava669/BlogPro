$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const postId = urlParams.get('id');

    if (!postId) {
        $('#post-title').text("Post not found.");
        return;
    }

    $.ajax({
        url: `/post/postShow/${postId}`,
        method: 'GET',
        success: function (data) {
            $('#post-title').text(data.title);
            $('#post-date').text(data.date);
            $('#post-author').text(`Written by : ${data.author}`);
            $('#post-content').html(data.content);
        },
        error: function () {
            $('#post-title').text("Error loading post.");
        }
    });
});
