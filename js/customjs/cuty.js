function cuty() {
	var that = this;

	var objLanguage = new IdiomaDataTables();
	var objmenu = new activeMenu();

	this.LoadCuty = function () {
		try{
            $(".cuty").click(function () {
				objmenu.activate(".cuty");
                $("#maincontent").empty();
                $("#maincontent").load("views/cortecaja.php", function(){
                    $("#tablecutycontainer").DataTable({
						"language": objLanguage.espanol,
						"pageLength": 50,
						dom: 'Bfrtip',
						buttons: [
							'excel', 'pdf'
						]
					});
                });
            });
            
		} catch(x) {
			console.log("cuty: Load View - ", x.toString());
		}
	}
}