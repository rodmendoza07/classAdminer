<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Menu</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" >Inventario</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-12">
        <button class="btn btn-lg btn-primary" id="assetAdd">Agregar Item</button>
    </div>
</div>

<div class="row" style="margin-top: 15px;">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Elementos</div>
            <div class="panel-body">
                <div class="col-md-12" id="tableContent"></div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="modal inmodal fade" id="assetForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Agregar Item</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Código de producto</label>
                            <input type="text" class="form-control" id="codeName" required placeholder="Código producto" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="text" class="form-control" id="quantity" required placeholder="Cantidad" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Unidad de medición</label>
                            <select class="form-control" id="selectRoles"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" id="productDesc" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnAddItem">Aceptar</button>
            </div>
        </div>
    </div>
</div>
