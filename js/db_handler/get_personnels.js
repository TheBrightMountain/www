$(document).ready(function () {
    $('#testButton').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: '/php/db_handler/get_personnels.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let source = document.getElementById('personnels-template').innerHTML;
                let template = Handlebars.compile(source);
                let html = template({
                    personnels: data
                });
                document.getElementById('test-container').innerHTML = html;
            }
        });
    });
});