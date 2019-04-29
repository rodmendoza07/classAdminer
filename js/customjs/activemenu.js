function activeMenu(){
    var that = this;

    this.activate = function(optAnterior) {
        that.deactivate();
        var padre = $(optAnterior).parent();
        console.log(padre);
        padre.addClass("active");
    }

    this.deactivate = function() {
        $(".list").parent().removeClass("active");
        $(".payment").parent().removeClass("active");
        $(".nclient").parent().removeClass("active");
        $(".reports").parent().removeClass("active");
        $(".config").parent().removeClass("active");
    }
}