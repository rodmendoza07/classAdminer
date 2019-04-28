function MainScreen() {
	var that = this;

	var objLanguage = new IdiomaDataTables();

	this.LoadMainScreen = function () {
		try{
			$("#maincontent").empty();
			$("#maincontent").load("views/main.php", function(){
				var tdt = $("#tablelist").DataTable({
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
		} catch(x) {
			console.log("MainScreen: Load View - ", x.toString());
		}
	}
}