function MainScreen() {
	var that = this;

	this.LoadMainScreen = function () {
		try{
			$("#maincontent").empty();
			$("#maincontent").load("views/main.php", function(){
				$('.Alimentos').click(function(){
					var precio = $(this).data("price");
					var idplatillo = $(this).data("dishid");
					var nplatillo = $(this).data("dish");
					var objaddDish = new addDish(precio, idplatillo, nplatillo);
				});
			});
		} catch(x) {
			console.log("MainScreen: Load View - ", x.toString());
		}
	}
}