$(document).ready(function () {
    $('#signupForm').submit(function (e) {
        e.preventDefault(); // Stop normal form submission

        $.ajax({
            url: BASE_URL + 'signup/register',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {
                    alert('User registered successfully! Redirecting to login...');
                    setTimeout(function () {
                        window.location.href = BASE_URL + 'login';
                    }, 1500);
                     $('#signupForm')[0].reset();
                } else if (res.errors) {
                    let errorList = '<ul class="errors">';
                    $.each(res.errors, function (key, val) {
                        errorList += '<li>' + val + '</li>';
                    });
                    errorList += '</ul>';
                    $('#signupForm').before(errorList);
                }
            },
            error: function (xhr) {
                alert('AJAX Error: ' + xhr.responseText);
                console.log(xhr.responseText);
            }
        });
    });
});
