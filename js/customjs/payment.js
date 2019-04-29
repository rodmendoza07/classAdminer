function PaymentScreen() {
	var that = this;

    var objLanguage = new IdiomaDataTables();
    var objmenu = new activeMenu();

	this.LoadPaymentScreen = function () {
		try{
            $(".payment").click(function(){
                objmenu.activate(".payment");
                $("#maincontent").empty();
                $("#maincontent").load("views/payment.php", function(){
                    var tdt = $("#tablelistpayment").DataTable({
                        "language": objLanguage.espanol,
                        "pageLength": 50,
                        "order": [[ 0, "desc" ]],
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
    
                    $('#tablelist tbody').on('click', 'tr', function () {
                        var data = tdt.row(this).data();
                        console.log(data);
                    } );
                });
            });
		} catch(x) {
			console.log("PaymentScreen: Load View - ", x.toString());
		}
	}
}