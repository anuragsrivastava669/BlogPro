$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const postId = urlParams.get('id');
    // Redirect on click
    $(document).on('click', '.post-item', function () {
        const postId = $(this).data('id');
        window.location.href = `/post/show?id=${postId}`;
    });
   
    if (postId) {
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
    }
});
