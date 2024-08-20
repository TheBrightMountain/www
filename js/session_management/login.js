$(document).ready(function () {
    $("#formLogin").submit(function (event) {
        event.preventDefault();
        let email = $("#inputEmail").val();
        let password = $("#inputPassword").val();
        
        $.ajax({
            url: "/php/session_management/login.php",
            method: "POST",
            data: {
                email: email,
                password: password,
            },
            success: function (response) {
                if (response.success) {
                    $("#content").fadeOut(400, function () {
                        $("#content").load("/html/content.html").fadeIn(400);
                        
                    });
                    // alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert("An error occurred");
            },
        });
    });
});
 