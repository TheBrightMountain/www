$(document).ready(function () {
    $.ajax({
        url: '/php/db_handler/get_orders.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            let source = document.getElementById('rowOrder').innerHTML;
            let template = Handlebars.compile(source);
            let html = template({
                orders: data
            });
            document.getElementById('tbodyOrder').innerHTML = html;
        }
    });
});