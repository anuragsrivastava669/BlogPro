$(document).ready(function () {
    $.ajax({
        url: '/post/fetchPublishedPosts', 
        type: 'GET',
        dataType: 'json',
        success: function (posts) {
            let html = '';
            posts.forEach(function (post) {
                html += `
                <div class="post-card">
                    <h2>${post.title}</h2>
                    <p>${post.excerpt}</p>
                    <small>${post.date} , ${post.author}</small>
                </div>`;
            });
            $('#postsContainer').html(html);
        },
        error: function () {
            $('#postsContainer').html('<p>Failed to load posts.</p>');
        }
    });
});
