$(document).ready(function () {


    $.ajax({
        url: fetchUrl,
        method: 'GET',
        dataType: 'json',
        success: function (posts) {
          console.log("Received posts:", posts); 

            
            if (posts.length > 0) {
                $('#authorName').text(posts[0].author);
                $('#postCount').text(`${posts.length} Posts`);

                posts.forEach(post => {
                    $('#postList').append(`
                        <div class="post-card">
                            <h2 class="post-title">${post.title}</h2>
                            <p class="post-content">${post.content}</p>
                            <p class="post-date">${post.created_at.substring(0, 10)}</p>
                        </div>
                    `);
                });
            } else {
                $('#authorName').text("You");
                $('#postList').html("<p>No posts found.</p>");
            }
        },
        error: function () {
            alert("Failed to fetch posts.");
        }
    });
});
