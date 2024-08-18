$(document).ready(function () {
    $('#testButton').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: '/php/db_handler/get_orders.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let source = document.getElementById('orders-template').innerHTML;
                let template = Handlebars.compile(source);
                let html = template({
                    orders: data
                });
                document.getElementById('test-container').innerHTML = html;
            }
        });
    });
});