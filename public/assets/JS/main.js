$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();

        const email = $('input[name="email"]').val().trim();
        const password = $('input[name="password"]').val().trim();

        if (!email || !password) {
            alert("All fields are required!");
            return;
        }

        $.ajax({
            url: BASE_URL + 'loginUser', 
            method: 'POST',
            data: {
                email: email,
                password: password
            },
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {
                    window.location.href = BASE_URL + 'post/postList'; 
                } else {
                    alert(res.message || 'Login failed!');
                }
            },
            error: function (xhr) {
                console.log("AJAX Error:", xhr.responseText);
                alert("An error occurred while processing your login.");
            }
        });
    });
});
