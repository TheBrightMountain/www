$(document).ready(function () {
    $.ajax({
        url: "/php/session_management/check_login.php",
        method: "POST",
        success: function (response) {
            if (response.loggedIn) {
                $("#content").load("/html/content.html");
            } else {
                $("#content").load("/html/login.html").hide().fadeIn(400);
            }
        },
        error: function () {
            alert("Failed to check login status.");
        },
    });
});
