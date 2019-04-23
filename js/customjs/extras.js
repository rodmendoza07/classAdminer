function Extras() {
	var that = this;

    var objmenu = new activeMenu();

	this.LoadExtras = function () {
		try{
            $(".extra").click(function(){
                objmenu.activate(".extra");
                $("#maincontent").empty();
                $("#maincontent").load("views/extras.php", function(){
                    $('.Extras').click(function(){
                        var precio = $(this).data("price");
                        var idplatillo = $(this).data("dishid");
                        var nplatillo = $(this).data("dish");
                        var objaddDish = new addDish(precio, idplatillo, nplatillo);
                    });
                });
            });
            
		} catch(x) {
			console.log("MainScreen: Load View - ", x.toString());
		}
	}
}