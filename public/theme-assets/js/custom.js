$(function () {

    //dataTable script
    $('#transactions').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel'
        ],
        autoWidth: true,
        columnDefs: [
            {
                targets: ['_all'],
                className: 'mdc-data-table__cell'
            },
        ],
        "order": false,
        "pageLength": 50
    });
});
