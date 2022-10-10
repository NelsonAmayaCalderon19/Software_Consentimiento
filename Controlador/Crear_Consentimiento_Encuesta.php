<?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
  }
  ?>
  <?php 
      include_once '../Conexion/Conexion.php'; 
      include_once '../modelo/Consentimiento.php';
      require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
      //use PhpOffice\PhpWord\IOFactory;
      //use PhpOffice\PhpWord\Settings;
      //require('fpdf/fpdf.php');
      \PhpOffice\PhpWord\Autoloader::register();
      $consentimiento = new Consentimiento();
      use PhpOffice\PhpWord\TemplateProcessor;
      $id_cita = $_GET["id_cita"];
      $id_consentimiento = $_GET["cod_consentimiento"];
      $cod_examen = $_GET["cod_examen"];
      //$id_estado;
      if(filter_input(INPUT_POST, 'btnConfirmar')){
        echo $id_consentimiento;
      $ruta = $consentimiento->Consultar_Archivo_Consentimiento($id_consentimiento);
      echo $ruta;
      $templateWord = new TemplateProcessor('../formatos/'.$ruta);
//$templateWord = new TemplateProcessor('../formatos/Hola.docx');
      $nombre_paciente = $_POST['nombre_paciente'];
      $documento = $_POST['documento'];
      $procedimiento = $_POST['procedimiento'];
      $telefono = $_POST['telefono'];
      $selectsexo = $_POST['selectsexo'];
      $edad = $_POST['edad'];
      $peso = $_POST['peso'];
      $talla = $_POST['talla'];
      $flex_alergia = $_POST['flex_alergia'];
      $cual_alergia = $_POST['cual_alergia'];
      $flex_cardiaca = $_POST['flex_cardiaca'];
      $cual_cardiaca = $_POST['cual_cardiaca'];
      $flex_pulmonar = $_POST['flex_pulmonar'];
      $cual_pulmonar = $_POST['cual_pulmonar'];
      $flex_ronquidos = $_POST['flex_ronquidos'];
      $flex_cpap = $_POST['flex_cpap'];
      $flex_oxigeno = $_POST['flex_oxigeno'];
      $flex_psiquiatria = $_POST['flex_psiquiatria'];
      $cual_psiquiatria = $_POST['cual_psiquiatria'];
      $flex_higado = $_POST['flex_higado'];
      $cual_higado = $_POST['cual_higado'];
      $flex_coagulacion = $_POST['flex_coagulacion'];
      $cual_coagulacion = $_POST['cual_coagulacion'];
      $flex_sangrados = $_POST['flex_sangrados'];
      $flex_alcohol = $_POST['flex_alcohol'];
      $flex_embarazo = $_POST['flex_embarazo'];
      $flex_cirugias = $_POST['flex_cirugias'];
      $cual_cirugias = $_POST['cual_cirugias'];
      $flex_sedaciones = $_POST['flex_sedaciones'];
      $cual_sedaciones = $_POST['cual_sedaciones'];
      $flex_fatiga = $_POST['flex_fatiga'];
      $flex_hospitalizacion = $_POST['flex_hospitalizacion'];
      $cual_hospitalizacion = $_POST['cual_hospitalizacion'];
      $flex_procedimiento = $_POST['flex_procedimiento'];
      $medicamento1 = $_POST['medicamento1'];
      $dosis1 = $_POST['medicamento_1'];
      $medicamento2 = $_POST['medicamento2'];
      $dosis2 = $_POST['medicamento_2'];
      $medicamento3 = $_POST['medicamento3'];
      $dosis3 = $_POST['medicamento_3'];
      $medicamento4 = $_POST['medicamento4'];
      $dosis4 = $_POST['medicamento_4'];
      $medicamento5 = $_POST['medicamento5'];
      $dosis5 = $_POST['medicamento_5'];

      $templateWord->setValue('nombre_completo',$nombre_paciente);
$templateWord->setValue('documento',$documento);
$templateWord->setValue('examen',$procedimiento);
$templateWord->setValue('telefono',$telefono);
$templateWord->setValue('sexo',$selectsexo);
$templateWord->setValue('edad',$edad);
$templateWord->setValue('peso',$peso);
$templateWord->setValue('talla',$talla);
if($flex_alergia == "SI"){
  $templateWord->setValue('ale_si',"X");
  $templateWord->setValue('ale_no',"");
}else if($flex_alergia =="NO"){
  $templateWord->setValue('ale_no',"X");
  $templateWord->setValue('ale_si',"");
}
$templateWord->setValue('ale_cual',$cual_alergia);
if($flex_cardiaca == "SI"){
  $templateWord->setValue('card_si',"X");
  $templateWord->setValue('card_no',"");
}else if($flex_cardiaca =="NO"){
  $templateWord->setValue('card_no',"X");
  $templateWord->setValue('card_si',"");
}
$templateWord->setValue('card_cual',$cual_cardiaca);
if($flex_pulmonar== "SI"){
  $templateWord->setValue('pul_si',"X");
  $templateWord->setValue('pul_no',"");
}else if($flex_pulmonar =="NO"){
  $templateWord->setValue('pul_no',"X");
  $templateWord->setValue('pul_si',"");
}
$templateWord->setValue('pul_cual',$cual_pulmonar);
if($flex_ronquidos== "SI"){
  $templateWord->setValue('ronq_si',"X");
  $templateWord->setValue('ronq_no',"");
}else if($flex_ronquidos =="NO"){
  $templateWord->setValue('ronq_no',"X");
  $templateWord->setValue('ronq_si',"");
}
if($flex_cpap== "SI"){
  $templateWord->setValue('cpap_si',"X");
  $templateWord->setValue('cpap_no',"");
}else if($flex_cpap =="NO"){
  $templateWord->setValue('cpap_no',"X");
  $templateWord->setValue('cpap_si',"");
}
if($flex_oxigeno== "SI"){
  $templateWord->setValue('oxi_si',"X");
  $templateWord->setValue('oxi_no',"");
}else if($flex_oxigeno =="NO"){
  $templateWord->setValue('oxi_no',"X");
  $templateWord->setValue('oxi_si',"");
}
if($flex_psiquiatria== "SI"){
  $templateWord->setValue('neu_si',"X");
  $templateWord->setValue('neu_no',"");
}else if($flex_psiquiatria =="NO"){
  $templateWord->setValue('neu_no',"X");
  $templateWord->setValue('neu_si',"");
}
$templateWord->setValue('neu_cual',$cual_psiquiatria);
if($flex_higado== "SI"){
  $templateWord->setValue('hig_si',"X");
  $templateWord->setValue('hig_no',"");
}else if($flex_higado =="NO"){
  $templateWord->setValue('hig_no',"X");
  $templateWord->setValue('hig_si',"");
}
$templateWord->setValue('hig_cual',$cual_higado);
if($flex_coagulacion== "SI"){
  $templateWord->setValue('coag_si',"X");
  $templateWord->setValue('coag_no',"");
}else if($flex_coagulacion =="NO"){
  $templateWord->setValue('coag_no',"X");
  $templateWord->setValue('coag_si',"");
}
$templateWord->setValue('coag_cual',$cual_coagulacion);
if($flex_sangrados== "SI"){
  $templateWord->setValue('sang_si',"X");
  $templateWord->setValue('sang_no',"");
}else if($flex_sangrados =="NO"){
  $templateWord->setValue('sang_no',"X");
  $templateWord->setValue('sang_si',"");
}
if($flex_alcohol== "SI"){
  $templateWord->setValue('alc_si',"X");
  $templateWord->setValue('alc_no',"");
}else if($flex_alcohol =="NO"){
  $templateWord->setValue('alc_no',"X");
  $templateWord->setValue('alc_si',"");
}
if($flex_embarazo== "SI"){
  $templateWord->setValue('emb_si',"X");
  $templateWord->setValue('emb_no',"");
}else if($flex_embarazo =="NO"){
  $templateWord->setValue('emb_no',"X");
  $templateWord->setValue('emb_si',"");
}
if($flex_cirugias== "SI"){
  $templateWord->setValue('cir_si',"X");
  $templateWord->setValue('cir_no',"");
}else if($flex_cirugias =="NO"){
  $templateWord->setValue('cir_no',"X");
  $templateWord->setValue('cir_si',"");
}
$templateWord->setValue('cir_cual',$cual_cirugias);
if($flex_sedaciones== "SI"){
  $templateWord->setValue('sed_si',"X");
  $templateWord->setValue('sed_no',"");
}else if($flex_sedaciones =="NO"){
  $templateWord->setValue('sed_no',"X");
  $templateWord->setValue('sed_si',"");
}
$templateWord->setValue('sed_cual',$cual_sedaciones);
if($flex_fatiga== "SI"){
  $templateWord->setValue('fat_si',"X");
  $templateWord->setValue('fat_no',"");
}else if($flex_fatiga =="NO"){
  $templateWord->setValue('fat_no',"X");
  $templateWord->setValue('fat_si',"");
}
if($flex_hospitalizacion== "SI"){
  $templateWord->setValue('hosp_si',"X");
  $templateWord->setValue('hosp_no',"");
}else if($flex_hospitalizacion =="NO"){
  $templateWord->setValue('hosp_no',"X");
  $templateWord->setValue('hosp_si',"");
}
$templateWord->setValue('hosp_cual',$cual_hospitalizacion);
if($flex_procedimiento== "SI"){
  $templateWord->setValue('rec_sed_si',"X");
  $templateWord->setValue('rec_sed_no',"");
  $id_estado="7";
}else if($flex_procedimiento =="NO"){
  $templateWord->setValue('rec_sed_no',"X");
  $templateWord->setValue('rec_sed_si',"");
  $id_estado="8";
}

$templateWord->setValue('medicamento1',$medicamento1);
$templateWord->setValue('medicamento_1',$dosis1);
$templateWord->setValue('medicamento2',$medicamento2);
$templateWord->setValue('medicamento_2',$dosis2);
$templateWord->setValue('medicamento3',$medicamento3);
$templateWord->setValue('medicamento_3',$dosis3);
$templateWord->setValue('medicamento4',$medicamento4);
$templateWord->setValue('medicamento_4',$dosis4);
$templateWord->setValue('medicamento5',$medicamento5);
$templateWord->setValue('medicamento_5',$dosis5);
$templateWord->saveAs('../formatos/Plantilla/'.$ruta);
$archivo_binario = (file_get_contents('../formatos/Plantilla/'.$ruta));
$consentimiento->Actualizar_Cita_Consentimiento($id_cita,$id_consentimiento,$id_estado,$archivo_binario);
$validarConsentCita=$consentimiento->Validar_Consentimientos_Cita_Firmados($id_cita);
if($validarConsentCita=="0"){
$consentimiento->Actualizar_Estado_Cita($id_cita);
}
      header("location:../ver_consentimientos.php"  . "?id_cita=" . $id_cita ."&cod_examen=" . $cod_examen);
      unlink('../formatos/Plantilla/'. $ruta);
      echo "Hola";
    }
?>