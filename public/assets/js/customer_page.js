$(document).ready(function () {
    $('#search').on('keyup', function () {
        var keyword = $(this).val().toLowerCase();
        $('#myTable tbody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
        });
    });

    $('[data-toggle="tooltip"]').tooltip();

})
