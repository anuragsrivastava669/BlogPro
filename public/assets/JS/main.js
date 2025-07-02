$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        const email = $('input[name="email"]').val().trim();
        const password = $('input[name="password"]').val().trim();

        if (!email || !password) {
            e.preventDefault();
            alert("Please fill in both email and password.");
        }
    });
});
