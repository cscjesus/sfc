<?php

namespace App\Utilidades;

use Spipu\Html2Pdf\Html2Pdf;
use \Illuminate\Support\Facades\Storage;
use \Carbon\Carbon;
use NumerosEnLetras;

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
    //leer archivo para los jefes de departamento
    $contents = Storage::disk('local')->get('public/jefes.txt');
    $contents = json_decode($contents);
    //echo $contents->escolares." ".$contents->extraescolares;
    //return;
    //generar el arreglo de los datos que necesita la constancia
    $dato[0] = array(
      //"escolares" => "LIC. JOSÉ JOAQUÍN JIMÉNEZ JAQUIM",
      //"jefe" => "LIC. MIGUEL GUTIÉRREZ ALCÁNTARA",
      "escolares" => $contents->escolares,
      "jefe" => $contents->extraescolares,
      //"alumno" => $cal->alumno->nombre.' '.$cal->alumno->ap_pat.' '.$cal->alumno->ap_mat,
      "alumno" => $cal->alumno->nombre_completo,
      "ncontrol" => $cal->alumno->ncontrol,
      "carrera" =>  $cal->alumno->carrera->nombre,
      "periodo" => $cal->grupo->periodo,
      "creditos" => $cal->grupo->actividad->creditos,
      "calificacion" => $cal->calificacion, "fecha" => $fecha,
      "actividad" => $cal->grupo->actividad->nombre,
      "valor" => $calNum,
    //    "docente" => $cal->grupo->docente->nombre.' '.
    //   $cal->grupo->docente->ap_pat.' '.$cal->grupo->docente->ap_mat
       "docente" => $cal->grupo->docente->nombre_completo
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

    // $dias =[ "un","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once","doce","trece",
    // "catorce","quince","dieciséis","diecisiete","dieciocho","diecinueve","veinte","veintiuno"
    // ,"veintidós","veintitrés","veinticuatro","veinticinco","veintiséis","veintisiete","veintiocho"
    // ,"veintinueve","treinta","treinta y un"];

//    $diaStr = $dias[$dia-1];
        $diaStr = "";

    switch ($dia) {
        case 22: $diaStr = "veintidós";  break;
        case 23: $diaStr = "veintitrés"; break;
        case 26: $diaStr = "veintiséis"; break;
        default: $diaStr = NumerosEnLetras::convertir($dia);
    }

    // $date = \Carbon\Carbon::parse('2018-03-16 15:45')->locale('es');
    // $date->settings(['formatFunction' => 'translatedFormat']);
    // echo $date->format('g:i a l jS F Y');    // 3:45 午後 金曜日 16日 3月 2018

    Carbon::setLocale('es');
    $date = Carbon::now();
    //para el nombre del dia en espanol
    //$date->translatedFormat('l');
    $mesStr = $date->translatedFormat('F');

    //$date->settings(['formatFunction' => 'translatedFormat']);
    //echo $date->format('F'); // July
    // echo $date->subMonth()->format('F'); // June
       // return;

    /*
    $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
    $mes = (int)date("m");
    $mesStr = $meses[$mes-1];
*/
    // switch ($mes) {
    //   case 1:
    //     $mesStr = "enero";
    //     break;
    //   case 2:
    //     $mesStr = "febrero";
    //     break;
    //   case 3:
    //     $mesStr = "marzo";
    //     break;
    //   case 4:
    //     $mesStr = "abril";
    //     break;
    //   case 5:
    //     $mesStr = "mayo";
    //     break;
    //   case 6:
    //     $mesStr = "junio";
    //     break;
    //   case 7:
    //     $mesStr = "julio";
    //     break;
    //   case 8:
    //     $mesStr = "agosto";
    //     break;
    //   case 9:
    //     $mesStr = "septiembre";
    //     break;
    //   case 10:
    //     $mesStr = "octubre";
    //     break;
    //   case 11:
    //     $mesStr = "noviembre";
    //     break;
    //   case 12:
    //     $mesStr = "diciembre";
    //     break;
    // }
    //$this->fechaStr = $this->fecha;
    //return  "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
    //return strtoupper( "a los " . $diaStr . " dias del mes de " .$mesStr . " de " . date("Y"));
    return "a los " . $diaStr . " días del mes de " . $mesStr . " de " . date("Y");
  }
}

//https://carbon.nesbot.com/docs/#api-localization

// composer require villca/numeros-en-letras
// https://24villca.blogspot.com/2018/01/convierte-cualquier-numero-en-letras.html
