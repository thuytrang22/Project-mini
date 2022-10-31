$(document).ready(function () {
    $('#view_icon').on('keyup', function () {
        console.log('jquery is running..');
    })
    $('#search').on('keyup', function () {
        var keyword = $(this).val().toLowerCase();
        $('#myTable tbody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
        });
    });
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
})
