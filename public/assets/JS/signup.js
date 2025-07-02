$(document).ready(function () {
    $('#signupForm').on('submit', function (e) {
        let name = $('input[name="name"]').val().trim();
        let email = $('input[name="email"]').val().trim();
        let password = $('input[name="password"]').val().trim();

        if (!name || !email || !password) {
            alert("All fields are required.");
            e.preventDefault();
        }
    });
});
