<div id="myModalAdd" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" style="font-weight: bold">Agregar Calificaciones</h4>
            </div>
            <div class="modal-body">
                <input id="upload" type="file" class="btn btn-success form-control" accept=".xlsx">
                <br/>
                <br/>
                <a class="btn btn-primary" href="/sgc/public/recursos/formatos/calificaciones.xlsx">Descargar formato lista</a>
                <br>
                <table class="table table-condensed table-striped" id="tabla">
                    <thead>
                        <tr>
                            <th>NCONTROL</th>   
                            <th>NOMBRE</th>   
                            <th>AP_PATERNO</th>   
                            <th>AP_MATERNO</th>   
                            <th>CALIFICACION</th>    
                        </tr>  
                    </thead>

                    <tbody>

                    </tbody>
                </table>
                <span id="errorAgregarCalificaciones" style="color: red; font-weight: bold">
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" 
                        id="btnCancelarCalificaciones">Cerrar</button>

                <button class="btn btn-success" id='btnAgregarCalificaciones'>Agregar</button>
                <div class="col-md-3 col-lg-offset-2">
                </div>
            </div>
        </div>
    </div>
</div>