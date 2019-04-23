function addDish(precio, idplatillo, nplatillo) {
    var dataPost = {
        precio: precio,
        idplatillo: idplatillo,
        nplatillo: nplatillo
    };
    var ajaxF = $.ajax({
        contentType: "application/json; charset=utf-8",
        type: "POST",
        url: "include/addDish.php",
        dataType: 'JSON',
        data: JSON.stringify(dataPost),
        async: false,
        beforeSend: function() {
            $('#loading').modal();
        },
        success: function (response) {
            $('#loading').modal('hide');
            if (response.errno) {
                toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Upps!", 5000);
                console.log('addDish - ',response.message)
            } else {}
        },
        error: function (XMLHttpRequest, textStatus, errorThrown){
            $('#loading').modal('toggle');
            toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Atención!", 5000);
            console.log('addDish - ', errorThrown);
            console.log('addDish - ', XMLHttpRequest);
        }
    });
}