function Bebidas() {
	var that = this;

    var objmenu = new activeMenu();
    
	this.LoadDrinks = function () {
		try{
            $(".drinks").click(function () {
                objmenu.activate(".drinks");
                $("#maincontent").empty();
                $("#maincontent").load("views/bebidas.php", function(){
                    $('.Bebidas').click(function(){
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