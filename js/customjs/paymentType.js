function paymentType() {
    var that = this;

    this.printTicket = function(ticket){
        var contenido= document.getElementById(ticket).innerHTML;
        var contenidoOriginal= document.body.innerHTML;
   
        document.body.innerHTML = contenido;
   
        window.print();
   
        document.body.innerHTML = contenidoOriginal;
    }

    this.setPayment = function (paymentid) {
        var dataPost = {
            paymentid: paymentid
        };
        console.log(dataPost);
        var ajaxF = $.ajax({
            contentType: "application/json; charset=utf-8",
            type: "POST",
            url: "include/setpayment.php",
            data: JSON.stringify(dataPost),
            dataType: 'JSON',
            async: false,
            beforeSend: function() {
            },
            success: function (response) {
                if (response.errno) {
                    toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Upps!", 5000);
                    console.log('cancelOrder - ',response.message)
                } else {
                    alert(response.data);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Atención!", 5000);
                console.log('cancelOrder - ', errorThrown);
                console.log('cancelOrder - ', XMLHttpRequest);
            }
        });
    }

    this.getPaymentType = function () {
        var ajaxF = $.ajax({
            contentType: "application/json; charset=utf-8",
            type: "POST",
            url: "include/getpayment.php",
            dataType: 'JSON',
            async: false,
            beforeSend: function() {
                $('#loading').modal();
            },
            success: function (response) {
                $('#loading').modal('hide');
                if (response.errno) {
                    toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Upps!", 5000);
                    console.log('addDish - ',response.message)
                } else {
                    var pagos = response.data;
                    $("#totalcontainer").empty();
                    $("#totalcontainer").append('<h1>Total:</h1>' + response.total);
                    $("#pagocontainer").empty();
                    for (i = 0; i < pagos.length; i++) {
                            var divpagos ='<div class="col-xs-6">'
                            + '<button data-pid="' + pagos[i][0] + '" class="btn btn-info btn-block pay">'
                            + response.data[i][1] + '</button></div>';
                            $("#pagocontainer").append(divpagos);
                    }
                    $("#cancelorder1").click(function() {
                        var ajaxF = $.ajax({
                            contentType: "application/json; charset=utf-8",
                            type: "POST",
                            url: "include/cancelOrder.php",
                            dataType: 'JSON',
                            async: false,
                            beforeSend: function() {
                            },
                            success: function (response) {
                                if (response.errno) {
                                    toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Upps!", 5000);
                                    console.log('cancelOrder - ',response.message)
                                } else {
                                    alert(response.data);
                                }
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown){
                                toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Atención!", 5000);
                                console.log('cancelOrder - ', errorThrown);
                                console.log('cancelOrder - ', XMLHttpRequest);
                            }
                        });
                        location.reload();
                    });
                    $("#ticketcontainer").empty();
                    console.log(response);
                    var ticketlogo =  '<div class="row"><div class="col-md-4 col-md-offset-4"><img src="images/burroblanco.jpg" class="img-responsive center-block" alt="" width="100" height="100"></div></div>' + response.ticketcomplete.completo;
                    $("#ticketcontainer").append(ticketlogo);
                    $(".pay").click(function(){
                        var ptype = $(this).data("pid");
                        that.setPayment(ptype);
                        that.printTicket('ticketcontainer');
                        location.reload();
                    });
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                $('#loading').modal('toggle');
                toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Atención!", 5000);
                console.log('addDish - ', errorThrown);
                console.log('addDish - ', XMLHttpRequest);
            }
        });
    }
}