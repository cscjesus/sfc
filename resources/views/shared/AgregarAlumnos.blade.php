<div id="myModalAdd" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" style="font-weight: bold">Agregar Estudiantes</h4>
            </div>
            <div class="modal-body">
                <input id="upload" type="file" class="btn btn-success form-control" accept=".xlsx">
                <br/>
                <br/>
                <a class="btn btn-primary" href="/sgc/public/recursos/formatos/lista.xlsx">Descargar formato lista</a>
                <br>
                <table class="table table-condensed table-striped" id="tabla">
                    <thead>
                        <tr>
                            <th>NCONTROL</th>   
                            <th>NOMBRE</th>   
                            <th>AP_PATERNO</th>   
                            <th>AP_MATERNO</th>   
                            <th>CARRERA</th>    
                        </tr>  
                    </thead>

                    <tbody>

                    </tbody>
                </table>
                <span id="errorAgregarAlumnos" style="color: red; font-weight: bold">
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" 
                        id="btnCancelarAlumnos">Cerrar</button>

                <button class="btn btn-success" id='btnAgregarAlumnos'>Agregar</button>
                <div class="col-md-3 col-lg-offset-2">
                </div>
            </div>
        </div>
    </div>
</div>