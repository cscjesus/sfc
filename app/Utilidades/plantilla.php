
<style>
    <!--   .cuerpo{
        font-size:16px;
    }
    -->
</style>
<!--title>Titulo del documento</title-->
<!--page backimg="http://localhost/sgc/public/recursos/img/tec.jpg" backimgx="center" backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm"-->
<page backimg="<?php echo Request::root() . '/recursos/img/tec.jpg'?>" backimgx="center" backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <br><br><br><br><br><br>
    <h2 style="text-align: center">Actividades Complementarias</h2>
    <br>
    <p class="cuerpo"><b><?php echo $dato[0]["escolares"]?></b>
        <br>
        <b>Jefe(a) de Departamento de Servicios Escolares</b>
        <br>
        <br>
        <b>Presente</b>
    </p>
    <br>
    <p style="text-align:justify; line-height: 1.6;text-indent: 80px" class="cuerpo">La(El) que suscribe <b>
            <?php echo $dato[0]["jefe"]?></b>, Jefa(e) del Departamento de
        Actividades Extraescolares, por este medio se permite
        hacer de su conocimiento que la(el) estudiante<b>
            <?php echo $dato[0]['alumno']?>
        </b> con número de control <b>
            <?php echo   $dato[0]['ncontrol']?>
        </b>de la carrera de <b><?php echo$dato[0]['carrera']?>
        </b>ha cumplido su actividad complementaria
        <b>(<?php echo$dato[0]['actividad']?>)</b> con el nivel de desempeño
        <b> <?php echo $dato[0]['calificacion']?></b> y un valor numérico de
        <?php echo $dato[0]['valor']?> durante el
        periodo escolar<b> <?php echo $dato[0]['periodo']?></b> con un
        valor curricular de (<b><?php echo $dato[0]['creditos']?></b>) crédito(s).</p>
    <br>
    <p class="cuerpo" style="text-align: justify;line-height: 1.6">Se extiende la presente en la Ciudad de Libres, Puebla <?php echo $dato[0]['fecha']?>.</p>
    <br>
    <br>

    <p style="font-size: 18; font-weight: bold; text-align: center">Atentamente</p>
    <br>
    <br>
    <br>
    <br>
    <br>

    <table cellspacing="0" style="width: 100%; text-align: center;">
        <tr>
            <td style="width:50%;">
                <p class="cuerpo"> _____________________________<br><br>
                    <strong><?php echo $dato[0]['docente']?> <br>
                        Encargado(a)</strong></p>
            </td>
            <td style="width:50%;">
                <p class="cuerpo">  _____________________________<br><br>
                    <strong>  <b> <?php echo $dato[0]['jefe']?></b><br>
                        Jefa(e) de Departamento</strong></p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <p>
        <b>c.c.p. Archivo<br>
            c.c.p. Interesado
        </b>
    </p>
</page>
