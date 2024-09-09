let urlraiz = $("#url_raiz_proyecto").val();
let miurl = urlraiz + "/bancos/update";


$("#editbanc").on("submit", function (e) {
    e.preventDefault();

    let timerInterval;
    Swal.fire({
        title: "Actualizando Información",
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
        ClienteID: $("#ClienteID").val(),
        Nombre: $("#Nombre").val(),
        SaldosCuentas: $("#SaldosCuentas").val(),
        Estatus: $("#Estatus").val()
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
            //console.log(data)
            if (data==200) {
                window.location.href = urlraiz+'/clientes';
                
            } else {
                console.log('error')
            }

        }
    });
});