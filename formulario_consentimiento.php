<!DOCTYPE html>
<html lang="en">
<head>

   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon"  href="images/pestania.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  
  <style>
    .data{
    /*width: 100px;
    word-wrap: break-word;*/
    }
    </style>
	<title>Formulario Consentimiento</title>
    <?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
  }
  ?>
    </head>
    <body>
      <?php 
      include_once 'Conexion/Conexion.php'; 
      include_once 'modelo/Cita.php';
      include_once 'modelo/Profesional.php';
      include_once 'modelo/Examen.php';
      
      $cita = new Cita();
      $prof = new Profesional();
      $examen = new Examen();
      $id_cita = $_GET["id_cita"];
      $id_consentimiento = $_GET["cod_consentimiento"];
      $cod_examen = $_GET["cod_examen"];
      $datos = $cita->Consultar_Cita_por_Id($id_cita);
      
      

include_once 'modelo/Consentimiento.php';
$consentimiento = new Consentimiento();


$conexion = new conexion();
$conexion = $conexion->connect(); ?>
<?php include "includes/header.php";
if($_GET["cod_consentimiento"] != "9. FT-PA-GI-HC-064"){
$consulta = "SELECT * FROM consentimiento_detalle where cod_consentimiento = '$id_consentimiento'";?>
    
    <?php foreach ($conexion->query($consulta) as $row) { ?>
    <div class="container-fluid col-11 mx-auto" style="margin-top: 60px;">
          <div class="row">
              <div class="col-12 d-xl-flex align-items-center justify-content-center" style="width:100%;">
                <div class="alert alert-success alert-dismissible" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Consentimiento Informado</strong> Formato a Diligenciar
  </div>
                </div>
                <div class="col-sm-12 card shadow mb-3">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-pencil-square-o"></i> Ingresar Informaci??n</h6>
            </div>
            <div class="col-sm-12 card-body">
            <form method="POST" action="Controlador/Crear_Consentimiento.php?id_cita=<?php echo $id_cita?>&cod_consentimiento=<?php echo $id_consentimiento?>&cod_examen=<?php echo $cod_examen?>" ENCTYPE='multipart/form-data'> 
            <label for="validationCustomNombre">Nombre del Paciente <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[1]; ?>" name="nombre_paciente" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>

<label for="validationCustomNombre">Apellidos del Paciente <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[2]; ?>" name="apellido_paciente" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomSelect">Tipo de Documento <span style="color:red;">(*)</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-address-card"></i></label>
  </div>
         <select class="custom-select" id="validationCustomSelect" name="selecttipodocumento" aria-describedby="inputGroupPrepend" required>
                    
                        <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                        <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>  
                        <option value="Permiso Especial de Permanencia">Permiso Especial de Permanencia</option>   
                        <option value="Registro Civil">Registro Civil</option>
                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>      
                        <option value="Pasaporte">Pasaporte</option>       
  </select>
</div>
<label for="validationCustomNombre">Documento <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[3]; ?>" name="documento" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomNombre">Aseguradora <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[6]; ?>" name="aseguradora" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomNombre">Regimen <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[7]; ?>" name="regimen" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomNombre">Edad <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[4]; ?>" name="edad" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomSelect">Sexo del Paciente <span style="color:red;">(*)</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-address-card"></i></label>
  </div>
         <select class="custom-select" id="validationCustomSelect" name="selectsexo" aria-describedby="inputGroupPrepend" required>
                    
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>  
                        <option value="Otro / No Responde">Otro / No Responde</option>         
  </select>
</div>
<label for="validationCustomNombre">Fecha <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-calendar"></i></span>
  </div>
    <input type="date" class="form-control" value="<?php echo $datos[8]; ?>" name="fecha" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomNombre">Hora <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-clock-o"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[9]; ?>" name="hora" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<?php $datoscargo = $prof->Consultar_Cargo_por_Descripcion($row['profesional_firma']); 
$cargo = $datoscargo[0];?>
<?php $consul_cargo = "SELECT * FROM profesional as prof where prof.id_estado=1 and prof.id_cargo= $cargo";?>
<label for="validationCustomSelect"><?php echo $row['profesional_firma']; ?><span style="color:red;"> (*)</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-user"></i></label>
  </div>
         <select class="custom-select" id="validationCustomSelect" name="selectprofesional" aria-describedby="inputGroupPrepend" required>
         <?php if($cargo == "1"){
          $datosprof = $prof->Consultar_Profesional_por_Cedula($datos[10]);?>
         <option value="<?php echo $datosprof[0]; ?>"><?php echo $datosprof[1]; ?></option>
         <?php }?>
         <?php foreach ($conexion->query($consul_cargo) as $ro) { ?>
                        <option value="<?php echo $ro['documento']; ?>"><?php echo $ro['nombre_completo'];?></option>
                        <?php } ?>  
              
  </select>
</div>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th class="text-center" scope="col">NOMBRE DEL TRATAMIENTO O PROCEDIMIENTO PROPUESTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><?php echo nl2br($row['nombre']);?></td>
    </tr>
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" scope="col">DESCRIPCI??N DEL TRATAMIENTO O PROCEDIMIENTO PROPUESTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><?php echo nl2br($row['descripcion']);?></td>
    </tr>
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" scope="col">OBJETIVO DEL TRATAMIENTO O PROCEDIMIENTO PROPUESTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><?php echo nl2br($row['objetivo']);?></td></tr>
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" scope="col">BENEFICIOS QUE RAZONABLEMENTE SE PUEDEN ESPERAR DEL TRATAMIENTO O PROCEDIMIENTO PROPUESTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><?php echo nl2br($row['beneficio']);?></td>
    </tr>
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" scope="col">RIESGOS, EFECTOS ADVERSOS Y/O COMPLICACIONES DEL TRATAMIENTO O PROCEDIMIENTO PROPUESTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><?php echo nl2br($row['riesgo']);?></td>
</tr>
  </tbody>
  </table>
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th class="text-center" colspan="4">ALTERNATIVAS AL TRATAMIENTO O PROCEDIMIENTO PROPUESTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
  
  <?php if($row['existe_alternativa'] == "Si"){?>
  <td class="text-left border data" >SI, EXISTEN OTRAS ALTERNATIVAS</td>
  <td class="text-left border data" ><strong><?php echo "X"; ?></strong></td>
  <td class="text-left border data" >NO, LA ??NICA ALTERNATIVA ES NO TRATAR O NO APLICAR EL PROCEDIMIENTO</td>
  <td class="text-left border data" ><strong></strong></td>
  <?php }else{?>
  <td class="text-left border data" >SI, EXISTEN OTRAS ALTERNATIVAS</td>
  <td class="text-left border data" ><strong></strong></td>
  <td class="text-left border data" >NO, LA ??NICA ALTERNATIVA ES NO TRATAR O NO APLICAR EL PROCEDIMIENTO</td>
  <td class="text-left border data" ><strong><?php echo "X"; ?></strong></td>
  <?php }?>
 </tr>
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" colspan="4">DESCRIBA LAS ALTERNATIVAS AL TRATAMIENTO O PROCEDIMIENTO PROPUESTO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><?php echo nl2br($row['alternativa']);?></td>
 </tr>
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" colspan="4">RESPUESTAS A INQUIETUDES MANIFESTADAS POR EL PACIENTE O SU REPRESENTANTE LEGAL</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td class="border" colspan="4">
     <label for="validationCustomNombre">Descripci??n de las Inquietudes</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <textarea class="form-control"  name="inquietudes" id="validationCustomNombre" aria-describedby="basic-addon3"></textarea>
</div>
<label for="validationCustomNombre">Respuesta del Medico Tratante</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <textarea class="form-control"  name="respuesta" id="validationCustomNombre" aria-describedby="basic-addon3"></textarea>
</div>
      <td>
 </tr>
 
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" colspan="4">DECISI??N DEL PACIENTE</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <td colspan="4" ><?php echo nl2br($row['decision']);?></td>
 </tr>
  </tbody>
</table>
<table class="table border">
<thead class="thead-light">
<tr>
      <th class="text-center" colspan="4">Acepta o No Acepta el Procedimiento</th>
    </tr>
</thead>
<tbody>
  <tr>
  <td colspan="4">
  <div class="input-group mb-3" >
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="S??" name="flexRadioDefault" id="flexRadioDefault1" onchange="mostrar(this.value);">
  <label class="form-check-label" for="flexRadioDefault">
    S??
  </label>
</div>
<div class="form-check ">
  <input class="form-check-input" type="radio" value="No" name="flexRadioDefault" id="flexRadioDefault2" onchange="mostrar(this.value);">
  <label class="form-check-label" for="flexRadioDefault">                
    No
  </label>
</div>
</div>
<td>
</tr>
<tr >
  <td colspan="4">
  <label for="validationCustomNombre" style="display:none;" id="encabezado_persona_firmante">Persona que Firma el Consentimiento</label>
  <div class="input-group mb-3" style="display:none;" id="persona_firmante">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="Paciente" name="flexRadioFirma" id="flexRadioFirma1" onchange="mostrar2(this.value);">
  <label class="form-check-label" for="flexRadioFirma1">
    Paciente
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="Representante_Legal" name="flexRadioFirma" id="flexRadioFirma2" onchange="mostrar2(this.value);">
  <label class="form-check-label" for="flexRadioFirma2">
    Representante legal
  </label>
</div>
<div class="form-check" style="display:none;">
  <input class="form-check-input" type="radio" value="" name="flexRadioFirma" id="flexRadioFirma3" onchange="mostrar2(this.value);" checked>
  <label class="form-check-label" for="flexRadioFirma3">
  </label>
</div>
</div>
  </td>
</tr>
</tbody>
</table>
<div class="container-fluid col-12" style="display:none;" id="firma_paciente">
<table class="table border firma_paciente"> 
<thead class="thead-light">
<tr>
      <th class="text-center" >FIRMA DEL PACIENTE</th>
    </tr>
</thead>
<tbody>
  <tr>
</tr>
</tbody>
</table>
</div>
<div class="container-fluid col-12" style="display:none;" id="firma_representante">
<table class="table border representante_legal">
<thead class="thead-light">
<tr>
      <th class="text-center" >DATOS DEL REPRESENTANTE LEGAL</th>
    </tr>
</thead>
<tbody>
  <tr>
    <td>
    <label for="validationCustomNombre">Nombre <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="" name="nombre_representante" id="validationCustomNombre" aria-describedby="basic-addon3">
</div>
</td>
</tr>
<tr>
    <td>
    <label for="validationCustomNombre">Parentesco <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="" name="parentesco_representante" id="validationCustomNombre" aria-describedby="basic-addon3">
</div>
</td>
</tr>
<tr>
    <td>
    <label for="validationCustomNombre">Numero de Documento de Identidad <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-address-card"></i></span>
  </div>
    <input type="text" class="form-control" value="" name="documento_representante" id="validationCustomNombre" aria-describedby="basic-addon3">
</div>
</td>
</tr>
<tr>
<th class="bg-primary text-white">
Firma Representante
</th>
</tr>
</tr>
</tbody>
</table>
</div>
<div class="container-fluid col-12" style="display:none;" id="revocatoria">
<table class="table border revocatoria">
<thead class="thead-light">
<tr>
      <th class="text-center" >REVOCATORIA DEL CONSENTIMIENTO</th>
    </tr>
</thead>
<tbody>
  <tr>
    <td><?php echo nl2br($row['revocatoria']);?>
</td>
</tr>
<tr>
<th class="bg-primary text-white">
Firma Paciente o Representante Legal
</th>
</tr>
<tr>
</tr>
</tbody>
</table>

</div>
<!--<div class="col-12 text-center justify-content-center row">

<input class="btn btn-success btn-acepta" type="button" name="btnAcepta" onclick='GuardarTrazado()' value="Aceptar" /> 
    
                          </div>-->
                         
                          
</div>

<div id="canva" style="visibility: hidden;">
<canvas id='canvas' width="600" height="200" style='border: 1px solid #CCC;'>
    <p>Tu navegador no soporta canvas</p>
</canvas>
<firma id="firma"></firma>
<signature></signature>

<!-- creamos el form para el envio -->
<!--<form id='formCanvas' method='post' action='Controlador/control_imagen.php' ENCTYPE='multipart/form-data'>
  --> <button type='button' onclick='LimpiarTrazado()'>Borrar</button>
    <!--<button type="button" onclick='GuardarTrazado()'>Guardar</button>-->
    <input class="btn btn-success btn-acepta" type="submit" name="btnAcepta" onclick='GuardarTrazado()' value="Aceptar" /> 

    <input type='hidden' name='imagen' id='imagen' />

  </div>
  
            </div>
</div>      
</div>
</div>
</form>
 <?php } }else{?> 
  <div class="container-fluid col-11 mx-auto" style="margin-top: 60px;">
          <div class="row">
              <div class="col-12 d-xl-flex align-items-center justify-content-center" style="width:100%;">
                <div class="alert alert-success alert-dismissible" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Encuesta Pre Sedaci??n</strong> Formato a Diligenciar
  </div>
                </div>
                <div class="col-sm-12 card shadow mb-3">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-pencil-square-o"></i> Diligenciar Encuesta</h6>
            </div>
            <div class="col-sm-12 card-body">
            <form id="formulario" method="POST" action="Controlador/Crear_Consentimiento.php?id_cita=<?php echo $id_cita?>&cod_consentimiento=<?php echo $id_consentimiento?>&cod_examen=<?php echo $cod_examen?>"> 
            <label for="validationCustomNombre">Nombre del Paciente <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[1] . " ". $datos[2]; ?>" name="nombre_paciente" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomNombre">Identificaci??n <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[3] ?>" name="documento" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<?php $examendesc = $examen->Consultar_Examen_Por_ID($cod_examen); ?>
<label for="validationCustomNombre">Procedimiento a Realizar <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-medkit"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $examendesc; ?>" name="procedimiento" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomNombre">N?? Telefono</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-phone"></i></span>
  </div>
    <input type="text" class="form-control" value="" name="telefono" id="validationCustomNombre" aria-describedby="basic-addon3" >
</div>
<label for="validationCustomSelect">Sexo del Paciente <span style="color:red;">(*)</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-address-card"></i></label>
  </div>
         <select class="custom-select" id="validationCustomSelect" name="selectsexo" aria-describedby="inputGroupPrepend" required>
                    
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>  
                        <option value="Otro / No Responde">Otro / No Responde</option>         
  </select>
</div>
<label for="validationCustomNombre">Edad <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-sort-numeric-asc"></i></span>
  </div>
    <input type="text" class="form-control" value="<?php echo $datos[4]; ?>" name="edad" id="validationCustomNombre" aria-describedby="basic-addon3" readonly="">
</div>
<label for="validationCustomNombre">Peso <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-male"></i></span>
  </div>
    <input type="text" class="form-control" value="" name="peso" id="validationCustomNombre" placeholder="KG" aria-describedby="basic-addon3">
</div>
<label for="validationCustomNombre">Talla <span style="color:red;">(*)</span></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3"><i class="fa fa-male"></i></span>
  </div>
    <input type="text" class="form-control" value="" name="talla" id="validationCustomNombre" aria-describedby="basic-addon3" placeholder="CM">
</div>
<table class="table border">
  <thead class="thead-light">
    <tr>
      <th class="text-center" colspan="2">Lea las siguientes preguntas con atenci??n, marque seg??n corresponda. Especifique las respuestas que fueron marcadas con SI</th>
    </tr>
  </thead>
  <tbody>
    <tr>
<td>??Tiene alergia conocida a alg??n medicamento, comida?</td>
<td>

  <div class="input-group mb-3" id="tiene_alergia" >
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_alergia" id="flex_alergia1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_alergia1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_alergia" id="flex_alergia2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_alergia2">
    NO
  </label>
</div>
<div class="cual_alergia" id="cual_alergia" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_alergia">  Cual: </label> <input type="text" class="form-control" value="" name="cual_alergia" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Sufre de Enfermedad cardiaca?</td>
<td>

  <div class="input-group mb-3" id="tiene_cardiaca">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_cardiaca" id="flex_cardiaca1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_cardiaca1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_cardiaca" id="flex_cardiaca2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_cardiaca2">
    NO
  </label>
</div>
<div class="cual_cardiaca" id="cual_cardiaca" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_cardiaca">  Cual: </label> <input type="text" class="form-control" value="" name="cual_cardiaca" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Sufre de enfermedad Pulmonar?</td>
<td>

  <div class="input-group mb-3" id="tiene_pulmonar">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_pulmonar" id="flex_pulmonar1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_pulmonar1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_pulmonar" id="flex_pulmonar2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_pulmonar2">
    NO
  </label>
</div>
<div class="cual_pulmonar" id="cual_pulmonar" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_pulmonar">  Cual: </label> <input type="text" class="form-control" value="" name="cual_pulmonar" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Ha presentado ronquidos al dormir?</td>
<td>

  <div class="input-group mb-3" id="tiene_ronquidos">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_ronquidos" id="flex_ronquidos1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_ronquidos1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_ronquidos" id="flex_ronquidos2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_ronquidos2">
    NO
  </label>
</div>
</div>
</td>
    </tr>
    <tr>
<td>??Usa CPAP?
<div class="input-group mb-3" id="tiene_cpap">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_cpap" id="flex_cpap1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_cpap1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_cpap" id="flex_cpap2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_cpap2">
    NO
  </label>
</div>
</div>
</td>
<td>??Usa Oxigeno en la casa?

  <div class="input-group mb-3" id="tiene_oxigeno">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_oxigeno" id="flex_oxigeno1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_oxigeno1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_oxigeno" id="flex_oxigeno2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_oxigeno2">
    NO
  </label>
</div>
</div>
</td>
    </tr>
    <tr>
<td>??Sufre de enfermedad neurol??gica/psiqui??trica?</td>
<td>

  <div class="input-group mb-3" id="tiene_psiquiatria">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_psiquiatria" id="flex_psiquiatria1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_psiquiatria1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_psiquiatria" id="flex_psiquiatria2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_psiquiatria2">
    NO
  </label>
</div>
<div class="cual_psiquiatria" id="cual_psiquiatria" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_psiquiatria">  Cual: </label> <input type="text" class="form-control" value="" name="cual_psiquiatria" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Sufre de enfermedad de ri????n y/o h??gado?</td>
<td>

  <div class="input-group mb-3" id="tiene_higado">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_higado" id="flex_higado1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_higado1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_higado" id="flex_higado2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_higado2">
    NO
  </label>
</div>
<div class="cual_higado" id="cual_higado" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_higado">  Cual: </label> <input type="text" class="form-control" value="" name="cual_higado" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Consume medicamentos que interfieren con la coagulaci??n?</td>
<td>

  <div class="input-group mb-3" id="tiene_coagulacion">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_coagulacion" id="flex_coagulacion1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_coagulacion1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_coagulacion" id="flex_coagulacion2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_coagulacion2">
    NO
  </label>
</div>
<div class="cual_coagulacion" id="cual_coagulacion" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_coagulacion">  Cual: </label> <input type="text" class="form-control" value="" name="cual_coagulacion" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Ha tenido antecedentes de sangrados previos?</td>
<td>
<div class="input-group mb-3" id="tiene_sangrados">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_sangrados" id="flex_sangrados1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_sangrados1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_sangrados" id="flex_sangrados2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_sangrados2">
    NO
  </label>
</div>
</div>
</td>
 </tr>
 <tr>
<td>??Consume frecuentemente alcohol o drogas?</td>
<td>
<div class="input-group mb-3" id="tiene_alcohol">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_alcohol" id="flex_alcohol1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_alcohol1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_alcohol" id="flex_alcohol2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_alcohol2">
    NO
  </label>
</div>
</div>
</td>
 </tr>
 <tr>
<td>??Si es mujer cree estar en embarazo?</td>
<td>
<div class="input-group mb-3" id="tiene_embarazo">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_embarazo" id="flex_embarazo1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_embarazo1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_embarazo" id="flex_embarazo2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_embarazo2">
    NO
  </label>
</div>
</div>
</td>
 </tr>
 <tr>
<td>??Le han realizado cirug??as?</td>
<td>
  <div class="input-group mb-3" id="tiene_cirugias">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_cirugias" id="flex_cirugias1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_cirugias1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_cirugias" id="flex_cirugias2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_cirugias2">
    NO
  </label>
</div>
<div class="cual_cirugias" id="cual_cirugias" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_cirugias">  Cual: </label> <input type="text" class="form-control" value="" name="cual_cirugias" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Presento alguna complicaci??n con sedaciones y/o anestesias previas?</td>
<td>
  <div class="input-group mb-3" id="tiene_sedaciones">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_sedaciones" id="flex_sedaciones1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_sedaciones1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_sedaciones" id="flex_sedaciones2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_sedaciones2">
    NO
  </label>
</div>
<div class="cual_sedaciones" id="cual_sedaciones" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_sedaciones">  Cual: </label> <input type="text" class="form-control" value="" name="cual_sedaciones" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Se fatiga con sus actividades diarias?</td>
<td>
  <div class="input-group mb-3" id="tiene_fatiga">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_fatiga" id="flex_fatiga1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_fatiga1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_fatiga" id="flex_fatiga2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_fatiga2">
    NO
  </label>
</div>
</div>
</td>
    </tr>
    <tr>
<td>??Ha estado hospitalizado en los ??ltimos tres meses?</td>
<td>
  <div class="input-group mb-3" id="tiene_hospitalizacion">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_hospitalizacion" id="flex_hospitalizacion1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_hospitalizacion1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_hospitalizacion" id="flex_hospitalizacion2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_hospitalizacion2">
    NO
  </label>
</div>
<div class="cual_hospitalizacion" id="cual_hospitalizacion" style="visibility:hidden;">
<label for="validationCustomNombre" id="encabezado_tiene_hospitalizacion">  ??Por qu???: </label> <input type="text" class="form-control" value="" name="cual_hospitalizacion" id="validationCustomNombre" aria-describedby="basic-addon3">
 </div>
</div>
</td>
    </tr>
    <tr>
<td>??Desea recibir sedaci??n en su procedimiento?</td>
<td>
  <div class="input-group mb-3" id="tiene_procedimiento">
  <div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="SI" name="flex_procedimiento" id="flex_procedimiento1" onchange="mostrar3();">
  <label class="form-check-label" for="flex_procedimiento1">
    SI
  </label>
</div>
<div class="form-check col-md-2">
  <input class="form-check-input" type="radio" value="NO" name="flex_procedimiento" id="flex_procedimiento2" onchange="mostrar3();">
  <label class="form-check-label" for="flex_procedimiento2">
    NO
  </label>
</div>
</div>
</td>
    </tr>
  </tbody>
  <thead class="thead-light">
    <tr>
      <th class="text-center" colspan="2">Liste los medicamentos que usa actualmente:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td><div class="form-group row">
    <label for="medicamento1" class="col-sm-2 col-form-label">Medicamento:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="medicamento1" name="medicamento1">
    </div></td>
<td>
<div class="form-group row">
    <label for="dosis1" class="col-sm-2 col-form-label">Dosis:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dosis1" name="dosis1">
    </div>
</div>
</td>
    </tr>
    <tr>
    <td><div class="form-group row">
    <label for="medicamento2" class="col-sm-2 col-form-label">Medicamento:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="medicamento2" name="medicamento2">
    </div></td>
<td>
<div class="form-group row">
    <label for="dosis2" class="col-sm-2 col-form-label">Dosis:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dosis2" name="dosis2">
    </div>
</div>
</td>
    </tr>
    <tr>
    <td><div class="form-group row">
    <label for="medicamento3" class="col-sm-2 col-form-label">Medicamento:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="medicamento3" name="medicamento3">
    </div></td>
<td>
<div class="form-group row">
    <label for="dosis3" class="col-sm-2 col-form-label">Dosis:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dosis3" name="dosis3">
    </div>
</div>
</td>
    </tr>
    <tr>
    <td><div class="form-group row">
    <label for="medicamento4" class="col-sm-2 col-form-label">Medicamento:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="medicamento4" name="medicamento4">
    </div></td>
<td>
<div class="form-group row">
    <label for="dosis4" class="col-sm-2 col-form-label">Dosis:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dosis4" name="dosis4">
    </div>
</div>
</td>
    </tr>
    <tr>
    <td><div class="form-group row">
    <label for="medicamento5" class="col-sm-2 col-form-label">Medicamento:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="medicamento5" name="medicamento5">
    </div></td>
<td>
<div class="form-group row">
    <label for="dosis5" class="col-sm-2 col-form-label">Dosis:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dosis5" name="dosis5">
    </div>
</div>
</td>
    </tr>
  </tbody>
 </table>
 <div class="col-12 text-center justify-content-center row">

<input class="btn btn-success btn-acepta" type="submit" name="btnConfirmar" id="btnConfirmar" value="Aceptar" /> 
    
                          </div>
 </form>
            </div>
</div>
      
</div>
</div>
            <?php }?>
   
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>   
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>

$(document).ready(function() {
          
          $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
      });

      function mostrar(dato) {
        
  if (dato == "No") {
    document.getElementById("revocatoria").style.display = "block";
    document.getElementById("firma_paciente").style.display = "none";
    document.getElementById("firma_representante").style.display = "none";
    document.getElementById("persona_firmante").style.display = "none";
    document.getElementById("canva").style.visibility = "visible";
    //resetRadioButtons("flexRadioFirma");
  }
  if (dato == "S??") {
    document.getElementById("encabezado_persona_firmante").style.display = "block";
    document.getElementById("persona_firmante").style.display = "block";
    document.getElementById("revocatoria").style.display = "none";
    document.getElementById("firma_paciente").style.display = "none";
    document.getElementById("firma_representante").style.display = "none";
    document.getElementById("canva").style.visibility = "hidden";
    resetRadioButtons("flexRadioFirma");
  }

}
function mostrar2(dato2) {
  if (dato2 == "Paciente") {
    document.getElementById("persona_firmante").style.visibility = "visible";
    document.getElementById("revocatoria").style.display = "none";
    document.getElementById("firma_paciente").style.display = "block";
    document.getElementById("firma_representante").style.display = "none";
    document.getElementById("canva").style.visibility = "visible";
  }
  if (dato2 == "Representante_Legal") {
    document.getElementById("persona_firmante").style.visibility = "visible";
    document.getElementById("revocatoria").style.display = "none";
    document.getElementById("firma_paciente").style.display = "none";
    document.getElementById("firma_representante").style.display = "block";
    document.getElementById("canva").style.visibility = "visible";
  }
}

function mostrar3(dato3) {
  let alergia = $('input[name="flex_alergia"]:checked').val();
  let cardiaca= $('input[name="flex_cardiaca"]:checked').val();
  let pulmonar= $('input[name="flex_pulmonar"]:checked').val();
  let psiquiatria= $('input[name="flex_psiquiatria"]:checked').val();
  let higado= $('input[name="flex_higado"]:checked').val();
  let coagulacion= $('input[name="flex_coagulacion"]:checked').val();
  let cirugias= $('input[name="flex_cirugias"]:checked').val();
  let sedaciones= $('input[name="flex_sedaciones"]:checked').val();
  let hospitalizacion= $('input[name="flex_hospitalizacion"]:checked').val();

  if (alergia == "SI") {
    document.getElementById("cual_alergia").style.visibility = "visible";
  }else{document.getElementById("cual_alergia").style.visibility = "hidden";}
  if (cardiaca == "SI") {
    document.getElementById("cual_cardiaca").style.visibility = "visible";
  }else{document.getElementById("cual_cardiaca").style.visibility = "hidden";}
  if (pulmonar == "SI") {
    document.getElementById("cual_pulmonar").style.visibility = "visible";
  }else{document.getElementById("cual_pulmonar").style.visibility = "hidden";}
  if (psiquiatria == "SI") {
    document.getElementById("cual_psiquiatria").style.visibility = "visible";
  }else{document.getElementById("cual_psiquiatria").style.visibility = "hidden";}
  if (higado == "SI") {
    document.getElementById("cual_higado").style.visibility = "visible";
  }else{document.getElementById("cual_higado").style.visibility = "hidden";}
  if (coagulacion == "SI") {
    document.getElementById("cual_coagulacion").style.visibility = "visible";
  }else{document.getElementById("cual_coagulacion").style.visibility = "hidden";}
  if (cirugias == "SI") {
    document.getElementById("cual_cirugias").style.visibility = "visible";
  }else{document.getElementById("cual_cirugias").style.visibility = "hidden";}
  if (sedaciones == "SI") {
    document.getElementById("cual_sedaciones").style.visibility = "visible";
  }else{document.getElementById("cual_sedaciones").style.visibility = "hidden";}
  if (hospitalizacion == "SI") {
    document.getElementById("cual_hospitalizacion").style.visibility = "visible";
  }else{document.getElementById("cual_hospitalizacion").style.visibility = "hidden";}
}

  $(document).ready(function()
		{
		$("#btnConfirmar").click(function () {	 
			if( $("#formulario input[name='flex_alergia']:radio").is(':checked') && $("#formulario input[name='flex_cardiaca']:radio").is(':checked') && 
      $("#formulario input[name='flex_pulmonar']:radio").is(':checked') && $("#formulario input[name='flex_ronquidos']:radio").is(':checked') &&
      $("#formulario input[name='flex_cpap']:radio").is(':checked') && $("#formulario input[name='flex_oxigeno']:radio").is(':checked') &&
      $("#formulario input[name='flex_psiquiatria']:radio").is(':checked') && $("#formulario input[name='flex_higado']:radio").is(':checked') &&
      $("#formulario input[name='flex_coagulacion']:radio").is(':checked') && $("#formulario input[name='flex_sangrados']:radio").is(':checked') &&
      $("#formulario input[name='flex_alcohol']:radio").is(':checked') && $("#formulario input[name='flex_embarazo']:radio").is(':checked') &&
      $("#formulario input[name='flex_cirugias']:radio").is(':checked') && $("#formulario input[name='flex_sedaciones']:radio").is(':checked') &&
      $("#formulario input[name='flex_fatiga']:radio").is(':checked') && $("#formulario input[name='flex_hospitalizacion']:radio").is(':checked') &&
      $("#formulario input[name='flex_procedimiento']:radio").is(':checked')) {  
				$("#formulario").submit();  
        /*if($("#formulario input[name='flex_alergia']:radio").is(':checked')){
          if($("#formulario input[name='flex_cardiaca']:radio").is(':checked')){
            $("#formulario").submit();
          }*/
        }
         else{  
					alert("Verifique que todas las preguntas hayan sido respondidas, Gracias"); 
          return false; 
					}  
		});
	 });

function resetRadioButtons(groupName) {
    var arRadioBtn = document.getElementsByName(groupName);

    for (var ii = 0; ii < arRadioBtn.length; ii++) {
        var radButton = arRadioBtn[ii];
        radButton.checked = false;
    }
}
    </script>
    <?php /*echo $id_cita;
          echo $id_consentimiento;*/?>
    <?php include "includes/footer.php";?> 
    <script type="text/javascript">
    /* Variables de Configuracion */
    var idCanvas='canvas';
    var idForm='formCanvas';
    var inputImagen='imagen';
    var estiloDelCursor='crosshair';
    var colorDelTrazo='#555';
    var colorDeFondo='#fff';
    var grosorDelTrazo=2;

    /* Variables necesarias */
    var contexto=null;
    var valX=0;
    var valY=0;
    var flag=false;
    var imagen=document.getElementById(inputImagen); 
    var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
    var altoCanvas=document.getElementById(idCanvas).offsetHeight;
    var pizarraCanvas=document.getElementById(idCanvas);

    /* Esperamos el evento load */
    window.addEventListener('load',IniciarDibujo,false);

    function IniciarDibujo(){
      /* Creamos la pizarra */
      pizarraCanvas.style.cursor=estiloDelCursor;
      contexto=pizarraCanvas.getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
      contexto.strokeStyle=colorDelTrazo;
      contexto.lineWidth=grosorDelTrazo;
      contexto.lineJoin='round';
      contexto.lineCap='round';
      /* Capturamos los diferentes eventos */
      pizarraCanvas.addEventListener('mousedown',MouseDown,false);// Click pc
      pizarraCanvas.addEventListener('mouseup',MouseUp,false);// fin click pc
      pizarraCanvas.addEventListener('mousemove',MouseMove,false);// arrastrar pc

      pizarraCanvas.addEventListener('touchstart',TouchStart,false);// tocar pantalla tactil
      pizarraCanvas.addEventListener('touchmove',TouchMove,false);// arrastras pantalla tactil
      pizarraCanvas.addEventListener('touchend',TouchEnd,false);// fin tocar pantalla dentro de la pizarra
      pizarraCanvas.addEventListener('touchleave',TouchEnd,false);// fin tocar pantalla fuera de la pizarra
    }

    function MouseDown(e){
      flag=true;
      contexto.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
      contexto.moveTo(valX,valY);
    }

    function MouseUp(e){
      contexto.closePath();
      flag=false;
    }

    function MouseMove(e){
      if(flag){
        contexto.beginPath();
        contexto.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
        contexto.lineTo(valX,valY);
        contexto.closePath();
        contexto.stroke();
      }
    }

    function TouchMove(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseMove(touch);
      }
    }

    function TouchStart(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseDown(touch);
      }
    }

    function TouchEnd(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseUp(touch);
      }
    }

    function posicionY(obj) {
      var valor = obj.offsetTop;
      if (obj.offsetParent) valor += posicionY(obj.offsetParent);
      return valor;
    }

    function posicionX(obj) {
      var valor = obj.offsetLeft;
      if (obj.offsetParent) valor += posicionX(obj.offsetParent);
      return valor;
    }

    /* Limpiar pizarra */
    function LimpiarTrazado(){
      contexto=document.getElementById(idCanvas).getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
    }

    /* Enviar el trazado */
    function GuardarTrazado(){
      imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
      document.forms[idForm].submit();
    }
</script>


</body>
</html>