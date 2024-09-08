let urlraiz = $("#url_raiz_proyecto").val();
let miurl = urlraiz + "/rifa/agregar";


$("#newclient").on("submit", function (e) {
    e.preventDefault();

    let counter = 0;

    let start = parseInt(serie_inicial.val());
    let end = parseInt(serie_final.val());

    for (let i = start; i <= end; i++) {
        counter++;
    }

    let timerInterval;
    Swal.fire({
        title: "Generando Información",
        html: "Se cerrara en <b></b> milisegundos.",
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector("b");
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft();
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
    }).then((result) => {

        if (result.dismiss === Swal.DismissReason.timer) {

        }
    });

    var formData = {
        Nombre: $("#Nombre").val(),
        Direccion: $("#Direccion").val(),
        Nit: $("#Nit").val(),
        CorreoElectronico: $("#CorreoElectronico").val(),
        Telefono: $("#Telefono").val()
    };

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        success: function (data) {
            console.log(data)

        }
    });
});