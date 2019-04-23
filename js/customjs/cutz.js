function cutz() {
	var that = this;

	var objLanguage = new IdiomaDataTables();
	var objmenu = new activeMenu();

	this.LoadCutz = function () {
		try{
            $(".cutx").click(function () {
				objmenu.activate(".cutx");
                $("#maincontent").empty();
                $("#maincontent").load("views/cortecajaz.php", function(){
                    $("#tablecutzcontainer").DataTable({
						"language": objLanguage.espanol,
						"pageLength": 50,
						"order": [[ 0, "desc" ]],
						dom: 'Bfrtip',
						buttons: [
							'excel', 'pdf'
						]
					});
                });
            });
            
		} catch(x) {
			console.log("cutz: Load View - ", x.toString());
		}
	}
}