function ClientScreen() {
	var that = this;

    var objmenu = new activeMenu();

	this.LoadClientScreen = function () {
		try{
            $(".nclient").click(function(){
                objmenu.activate(".nclient");
                $("#maincontent").empty();
                $("#maincontent").load("views/clients.php", function(){
                    
                });
            });
		} catch(x) {
			console.log("PaymentScreen: Load View - ", x.toString());
		}
	}
}