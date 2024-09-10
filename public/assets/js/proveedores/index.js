$('#bancostb').DataTable({
    order: [[0, 'desc']],
    language: {
        decimal: "",
        emptyTable: "No se encontraron registros",
        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
        infoEmpty: "Mostrando 0 a 0 de 0 entradas",
        infoFiltered: "(filtrado de _MAX_ entradas totales)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ registros",
        loadingRecords: "Loading...",
        processing: "Processing...",
        search: "Buscar:",
        total: "total",
        zeroRecords: "No se han encontrado resultados",
        paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
        }
    },
    responsive: true,
    lengthMenu: [25, 50, 75, 100],
    stateSave: true,
});
