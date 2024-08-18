$(document).ready(function () {
    $('#logoutButton').click(function (event) {
        event.preventDefault(); // Prevent the default button action

        $.ajax({
            url: "php/session_management/logout.php",
            method: "POST",
            success: function (response) {
                if (response.success) {
                    $('#content').fadeOut(400, function () {
                        $('#content').load('/html/login.html').fadeIn(400);
                    })
                } else {
                    alert('Logout failed.');
                }
            },
            error: function () {
                alert('An error occurred. Please try again.');
            }
        });
    });
});