function ModMenus() {
	var that = this;

    var objmenu = new activeMenu();

	this.LoadModMenu = function () {
		try{
            $(".modmenu").click(function () {
                objmenu.activate(".modmenu");
                $("#maincontent").empty();
                $("#maincontent").load("views/packages.php", function(){
                    $('.Paquetes').click(function(){
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