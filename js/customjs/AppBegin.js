function AppBegin() {
	var that = this;

	try {

		var objMainScreen = new MainScreen();
		var objPaymentScreen = new PaymentScreen();
		var objClientScreen = new ClientScreen();

		objMainScreen.LoadMainScreen();
		objPaymentScreen.LoadPaymentScreen();
		objClientScreen.LoadClientScreen();

	} catch(x) {
		console.log("Error en AppBegin - ", x.toString());
	}
}