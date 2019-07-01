<?php

namespace App\Utilidades;

use Spipu\Html2Pdf\Html2Pdf;

class Utilidades
{
  function generarConstancia($calificacion)
  {
    $cal = $calificacion;//colocar alias a la variable y no sea tan grande
    require __DIR__ . '../../../vendor/autoload.php';
    //$html2pdf = new Html2Pdf();
    $fecha = $this->getFechaStr();
    $calNum = 0;//colocar numero a la calificacion
    switch ($cal->calificacion) {
      case "EXCELENTE": $calNum = 5;break;
      case "BUENO":$calNum = 4;break;
      case "REGULAR":$calNum = 3;break;
      case "SUFICIENTE": $calNum = 2;break;
    }
    //generar el arreglo de los datos que necesita la constancia
    $dato[0] = array(
      "jefa" => "LIC. MIGUEL GUTIÉRREZ ALCÁNTARA", 
      "alumno" => $cal->alumno->nombre.' '.$cal->alumno->ap_pat.' '.$cal->alumno->ap_mat,
      "ncontrol" => $cal->alumno->ncontrol, 
      "carrera" =>  $cal->alumno->carrera->nombre,
      "periodo" => $cal->grupo->periodo, 
      "creditos" => $cal->grupo->actividad->creditos, 
      "calificacion" => $cal->calificacion, "fecha" => $fecha,
      "actividad" => $cal->grupo->actividad->nombre,
      "valor" => $calNum, "docente" => $cal->grupo->docente->nombre.' '.
      $cal->grupo->docente->ap_pat.' '.$cal->grupo->docente->ap_mat
    );

    ob_start();
    include 'plantilla.php';
    $html = ob_get_clean();
    //$html2pdf = new Html2Pdf();
    $html2pdf = new Html2Pdf('P', 'LETTER', 'es', true, 'UTF-8', 3);
    //revisar el ejemplo7
    $html2pdf->pdf->SetTitle("Descargar Constancia");
    $html2pdf->writeHTML($html);
    $html2pdf->output($cal->alumno->ncontrol . ".pdf");
  }

  function getFechaStr()
  {
    $dia = (int)date("d");
    $diaStr = "";
    switch ($dia) {
      case 1:
        $diaStr = "un";
        break;
      case 2:
        $diaStr = "dos";
        break;
      case 3:
        $diaStr = "tres";
        break;
      case 4:
        $diaStr = "cuatro";
        break;
      case 5:
        $diaStr = "cinco";
        break;
      case 6:
        $diaStr = "seis";
        break;
      case 7:
        $diaStr = "siete";
        break;
      case 8:
        $diaStr = "ocho";
        break;
      case 9:
        $diaStr = "nueve";
        break;
      case 10:
        $diaStr = "diez";
        break;
      case 11:
        $diaStr = "once";
        break;
      case 12:
        $diaStr = "doce";
        break;
      case 13:
        $diaStr = "trece";
        break;
      case 14:
        $diaStr = "catorce";
        break;
      case 15:
        $diaStr = "quince";
        break;
      case 16:
        $diaStr = "dieciséis";
        break;
      case 17:
        $diaStr = "diecisiete";
        break;
      case 18:
        $diaStr = "dieciocho";
        break;
      case 19:
        $diaStr = "diecinueve";
        break;
      case 20:
        $diaStr = "veinte";
        break;
      case 21:
        $diaStr = "veintiuno";
        break;
      case 22:
        $diaStr = "veintidós";
        break;
      case 23:
        $diaStr = "veintitrés";
        break;
      case 24:
        $diaStr = "veinticuatro";
        break;
      case 25:
        $diaStr = "veinticinco";
        break;
      case 26:
        $diaStr = "veintiséis";
        break;
      case 27:
        $diaStr = "veintisiete";
        break;
      case 28:
        $diaStr = "veintiocho";
        break;
      case 29:
        $diaStr = "veintinueve";
        break;
      case 30:
        $diaStr = "treinta";
        break;
      case 31:
        $diaStr = "treinta y un";
        break;
    }
    $mes = (int)date("m");
    $mesStr = "";
    switch ($mes) {
      case 1:
        $mesStr = "enero";
        break;
      case 2:
        $mesStr = "febrero";
        break;
      case 3:
        $mesStr = "marzo";
        break;
      case 4:
        $mesStr = "abril";
        break;
      case 5:
        $mesStr = "mayo";
        break;
      case 6:
        $mesStr = "junio";
        break;
      case 7:
        $mesStr = "julio";
        break;
      case 8:
        $mesStr = "agosto";
        break;
      case 9:
        $mesStr = "septiembre";
        break;
      case 10:
        $mesStr = "octubre";
        break;
      case 11:
        $mesStr = "noviembre";
        break;
      case 12:
        $mesStr = "diciembre";
        break;
    }
    //$this->fechaStr = $this->fecha;
    //return  "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
    //return strtoupper( "a los " . $diaStr . " dias del mes de " .$mesStr . " de " . date("Y"));
    return "a los " . $diaStr . " días del mes de " . $mesStr . " de " . date("Y");
  }
}
