function AppBegin() {
	var that = this;

	try {

		var objMainScreen = new MainScreen();
		var objSideMenu = new SideMenu();
		var objInventario = new Inventory();
		var objPaquetes = new Paquetes();
		var objExtras = new Extras();
		var objBebidas = new Bebidas();
		var objCortey = new cuty();
		var objCortez= new cutz();
		var objModMenu = new ModMenus();

		objMainScreen.LoadMainScreen();
		objSideMenu.LoadLeftMenu();
		objInventario.LoadInventory();
		objPaquetes.LoadPaquetes();
		objExtras.LoadExtras();
		objBebidas.LoadDrinks();
		objCortey.LoadCuty();
		objCortez.LoadCutz();
		objModMenu.LoadModMenu();

	} catch(x) {
		console.log("Error en AppBegin - ", x.toString());
	}
}