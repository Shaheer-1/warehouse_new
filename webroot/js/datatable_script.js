
new DataTable('#example', {
    order: [[1, 'asc']],
    layout: {
        topStart: {
            buttons: ['copy', 'excel', 'pdf', 'print'],
            pageLength: {
                menu: [10, 25, 50, 100, 200]
            }
        }
    }
});