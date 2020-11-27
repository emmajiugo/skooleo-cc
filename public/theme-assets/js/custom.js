$(function () {

    //dataTable script
    $('#transactions').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel'
        ],
        autoWidth: false,
        columnDefs: [
            {
                targets: ['_all'],
                className: 'mdc-data-table__cell'
            },
        ],
        "pageLength": 50
    });
});
