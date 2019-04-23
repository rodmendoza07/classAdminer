function Inventory() {
	var that = this;

	this.getItems = function() {
		var ajaxF = $.ajax({
            contentType: "application/json; charset=utf-8",
            type: "GET",
            url: "../include/620bf9c5c352603fab3caa482bfcc513.php",
            dataType: 'JSON',
            async: false,
            beforeSend: function() {
                $('#loading').modal();
            },
            success: function (response) {
                $('#loading').modal('hide');
                if (response.errno) {
                    toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Upps!", 5000);
                    console.log('Inventario - ',response.message)
                } else {
                    
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                $('#loading').modal('toggle');
                toastr.error("Algo ha ido mal, por favor intentalo más tarde.", "¡Atención!", 5000);
                console.log('getItems - ', errorThrown);
                console.log('getItems - ', XMLHttpRequest);
            }
        });
	};

	this.LoadInventory = function () {
		try{
            
            $(".inventory").click(function(){
                console.log("inventario");
                $("#maincontent").empty();
                $("#maincontent").load("views/inventario.php", function() {
                    $("#assetAdd").click(function() {
                        console.log("a huebo puto");
                        $("#assetForm").modal();
                    });
                    
                })
            });
			
		} catch(x) {
			console.log("Inventory: Load View - ", x.toString());
		}
	};
}