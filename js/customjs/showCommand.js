function showCommand () {
    var ajaxF = $.ajax({
        contentType: "application/json; charset=utf-8",
        type: "POST",
        url: "include/showCommand.php",
        //dataType: 'JSON',
        async: false,
        beforeSend: function() {
            $('#loading').modal();
        },
        success: function (response) {
            $('#loading').modal('hide');
            if (response.errno) {
                toastr.error("Algo ha ido mal, por favor intentalo más tarde1.", "¡Upps!", 5000);
                console.log('showCommand - ',response.message)
            } else {
                $("#ordencontainer").empty();
                $("#ordencontainer").append(
                    '<table class="table table-bordered table-hober"><thead><tr><th>Platillo</th><th>Precio</th></tr>'
                    + '</thead><tbody>' + response + '</tbody></table>'
                );
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown){
            $('#loading').modal('toggle');
            toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Atención!", 5000);
            console.log('showCommand - ', errorThrown);
            console.log('showCommand - ', XMLHttpRequest);
        }
    });
}