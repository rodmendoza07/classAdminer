function activeMenu(){
    var that = this;

    this.activate = function(optAnterior) {
        that.deactivate();
        var padre = $(optAnterior).parent();
        console.log(padre);
        padre.addClass("active");
    }

    this.deactivate = function() {
        $(".package").parent().removeClass("active");
        $(".extra").parent().removeClass("active");
        $(".drinks").parent().removeClass("active");
        $(".cuty").parent().removeClass("active");
        $(".cutx").parent().removeClass("active");
        $(".food").parent().removeClass("active");
        $(".modmenu").parent().removeClass("active");
    }
}