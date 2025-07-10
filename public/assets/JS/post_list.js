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
                    <div class="post-title">${post.title}</div>
                    <div class="post-excerpt">${post.excerpt}</div>
                    <div class="post-meta">${post.date}, ${post.author}</div>
                </div>`;
            });
            $('#postsContainer').html(html);
        },
        error: function () {
            $('#postsContainer').html('<p>Failed to load posts.</p>');
        }
    });
});
