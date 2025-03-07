new DataTable('#example', {
    select: true,
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            pageLength: {
                menu: [10, 25, 50, 100]
            },
        },
    },
});