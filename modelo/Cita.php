<?php

class Cita extends conexion{
    private $id;
    private $nombre_paciente;
    private $apellido_paciente;
    private $documento;
    private $tipo_documento;
    private $edad;
    private $plan_afiliacion;
    private $aseguradora;
    private $sexo;
    private $fecha;
    private $hora;
    private $ced_medico;
    private $consultorio;
    private $tipo_examen;
    private $cod_examen;
    private $sede;
    private $esquema_clinico;
    private $id_estado;
       private $result_mes = "";
    private $posicion = 0;
    private $sub_fech = "";
    public function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function Consultar_Cod_Examen($nombre){
        $sq="SELECT * FROM examen as exam WHERE exam.descripcion= :descripcion";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':descripcion' =>"".$nombre.""
  ));
$results = $result -> fetchAll();

foreach($results as $fila):
        $codigo = $fila["codigo"];
endforeach;
    return $codigo;
    }

public function Validar_Fecha($fecha){
    $sub_fecha = $fecha;
    $partes = explode("/", $sub_fecha);
    $dia = $partes[0];
    $mes = $partes[1];  
    $anio = $partes[2];  
    $meses = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
           'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
    if(in_array($mes, $meses))
    {
        $posicion = array_search($mes, $meses);
        $result_mes =$posicion+1;
    } else {
        $result_mes = 0;
    }
    
    $sub_fech = $anio . '-' . $result_mes . '-' . $dia;
    return $sub_fech;
}
public function Guardar_Cita($nombre_p,$apellido_p,$documento,$edad,$afiliacion,$aseguradora,$regimen,$fecha,$hora,$ced_medico,$consultorio,$tipo_examen,$cod_examen,$sede,$id_estado){
    $consulta = "INSERT INTO cita(nombre_paciente,apellido_paciente,documento,edad,plan_afiliacion,aseguradora,regimen,fecha,hora,ced_medico,consultorio,tipo_examen,cod_examen,sede,id_estado) 
VALUES(:nombre_p,:apellido_p,:documento,:edad,:afiliacion,:aseguradora,:regimen,:fecha,:hora,:ced_medico,:consultorio,:tipo_examen,:cod_examen,:sede,:id_estado)";
    
$sql = $this->conexion->prepare($consulta);

$sub_fech = Cita::Validar_Fecha($fecha);

$sql->bindValue(':nombre_p',$nombre_p);
$sql->bindValue(':apellido_p',$apellido_p);
$sql->bindValue(':documento',$documento);
$sql->bindValue(':edad',$edad);
$sql->bindValue(':afiliacion',$afiliacion);
$sql->bindValue(':aseguradora',$aseguradora);
$sql->bindValue(':regimen',$regimen);
$sql->bindValue(':fecha',$sub_fech);
$sql->bindValue(':hora',$hora);
$sql->bindValue(':ced_medico',$ced_medico);
$sql->bindValue(':consultorio',$consultorio);
$sql->bindValue(':tipo_examen',$tipo_examen);
$sql->bindValue(':cod_examen',$cod_examen);
$sql->bindValue(':sede',$sede);
$sql->bindValue(':id_estado',$id_estado);  
$sql->execute();
return $this->conexion->lastInsertId();
}
public function Obtener_Id_Cita(){
    $sq="SELECT MAX(id_cita) ultimo FROM cita";
$result=$this->conexion->prepare($sq);
$results = $result -> fetchAll();
foreach($results as $fila):
    $cod = $fila["ultimo"];
endforeach;
return $cod;
}

public function Listar_Agenda(){
    $consulta = "SELECT * FROM cita where fecha=Now()";
    foreach ($this->conexion->query($consulta) as $row) {
        print $row['id_cita'] . "\t";
        print $row['nombre_paciente'] . "\t";
        print $row['edad'] . "\n";

    }
}

public function Consultar_Cita_por_Id($id){
    $sq="SELECT * FROM cita as cit WHERE cit.id_cita= :id";
$result=$this->conexion->prepare($sq);
$result->execute(array(
':id' =>"".$id.""
));
$results = $result -> fetchAll();
$dir = array();
$cont = 0;
foreach($results as $fila):
        $dir[$cont] = $fila["id_cita"];
        $cont++;
        $dir[$cont] = $fila["nombre_paciente"];
        $cont++;
        $dir[$cont] = $fila["apellido_paciente"];
        $cont++;
        $dir[$cont] = $fila["documento"];
        $cont++;
        $dir[$cont] = $fila["edad"];
        $cont++;
        $dir[$cont] = $fila["plan_afiliacion"];
        $cont++;
        $dir[$cont] = $fila["aseguradora"];
        $cont++;
        $dir[$cont] = $fila["regimen"];
        $cont++;
        $dir[$cont] = $fila["fecha"];
        $cont++;
        $dir[$cont] = $fila["hora"];
        $cont++;
        $dir[$cont] = $fila["ced_medico"];
        $cont++;
        $dir[$cont] = $fila["consultorio"];
        $cont++;
        $dir[$cont] = $fila["tipo_examen"];
        $cont++;
        $dir[$cont] = $fila["cod_examen"];
        $cont++;
        $dir[$cont] = $fila["sede"];
        $cont++;
        $dir[$cont] = $fila["esquema_clinico"];
        $cont++;
        $dir[$cont] = $fila["id_estado"];
        $cont++;
endforeach;
return $dir;
}

public function Consultar_Cita($id_cita, $id_consentimiento){
    $sq="SELECT cita.documento,cons.nombre FROM cita as cita, cita_consent as cit, consentimiento_detalle as cons WHERE cita.id_cita=cit.id_cita and cons.cod_consentimiento=cit.cod_consentimiento and cit.id_cita= :id_cita and cit.cod_consentimiento= :id_consentimiento";
$result=$this->conexion->prepare($sq);
$result->execute(array(
':id_cita' =>"".$id_cita."",
':id_consentimiento' =>"".$id_consentimiento.""
));
$results = $result -> fetchAll();
$dir = array();
$cont = 0;
foreach($results as $fila):
        $dir[$cont] = $fila["documento"];
        $cont++;
        $dir[$cont] = $fila["nombre"];
        $cont++;
endforeach;
return $dir;
}

public function Consultar_Cita2($id_cita, $id_consentimiento){
    $sq="SELECT cita.documento,cons.descripcion FROM cita as cita, cita_consent as cit, consentimiento as cons WHERE cita.id_cita=cit.id_cita and cons.codigo=cit.cod_consentimiento and cit.id_cita= :id_cita and cit.cod_consentimiento= :id_consentimiento";
$result=$this->conexion->prepare($sq);
$result->execute(array(
':id_cita' =>"".$id_cita."",
':id_consentimiento' =>"".$id_consentimiento.""
));
$results = $result -> fetchAll();
$dir = array();
$cont = 0;
foreach($results as $fila):
        $dir[$cont] = $fila["documento"];
        $cont++;
        $dir[$cont] = $fila["descripcion"];
        $cont++;
endforeach;
return $dir;
}

public function Agregar_Consentimiento_Cita($id_cita,$cod_consentimiento,$id_estado){
    $consulta = "INSERT INTO cita_consent(id_cita,cod_consentimiento,id_estado) 
    VALUES(:id_cita,:cod_consentimiento,:id_estado)";
        
    $sql = $this->conexion->prepare($consulta);
        
    $sql->bindValue(':id_cita',$id_cita);
    $sql->bindValue(':cod_consentimiento',$cod_consentimiento);
    $sql->bindValue(':id_estado',$id_estado);  
    $sql->execute();

}

public function Cita_No_Asistida($id_cita){

    $sq ="UPDATE cita SET id_estado= 5 WHERE id_cita= :id_cit";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
        ':id_cit' =>"".$id_cita.""
      ));
      return $result->rowCount();
}

public function Eliminar_Consentimientos_Cita($id_cita){
    $sq = "DELETE FROM cita_consent WHERE id_cita= :id_cita";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
        ':id_cita' =>"".$id_cita.""
      ));
      return $result ;
}

public function Guardar_Cita_Extraordinaria($nombre_p,$apellido_p,$documento,$tipo_documento,$edad,$afiliacion,$aseguradora,$regimen,$sexo,$fecha,$hora,$ced_medico,$consultorio,$tipo_examen,$cod_examen,$sede,$id_estado){
    $consulta = "INSERT INTO cita(nombre_paciente,apellido_paciente,documento,tipo_documento,edad,plan_afiliacion,aseguradora,regimen,sexo,fecha,hora,ced_medico,consultorio,tipo_examen,cod_examen,sede,id_estado) 
VALUES(:nombre_p,:apellido_p,:documento,:tipo_documento,:edad,:afiliacion,:aseguradora,:regimen,:sexo,:fecha,:hora,:ced_medico,:consultorio,:tipo_examen,:cod_examen,:sede,:id_estado)";
    
$sql = $this->conexion->prepare($consulta);

//$sub_fech = Cita::Validar_Fecha($fecha);

$sql->bindValue(':nombre_p',$nombre_p);
$sql->bindValue(':apellido_p',$apellido_p);
$sql->bindValue(':documento',$documento);
$sql->bindValue(':tipo_documento',$tipo_documento);
$sql->bindValue(':edad',$edad);
$sql->bindValue(':afiliacion',$afiliacion);
$sql->bindValue(':aseguradora',$aseguradora);
$sql->bindValue(':regimen',$regimen);
$sql->bindValue(':sexo',$sexo);
$sql->bindValue(':fecha',$fecha);
$sql->bindValue(':hora',$hora);
$sql->bindValue(':ced_medico',$ced_medico);
$sql->bindValue(':consultorio',$consultorio);
$sql->bindValue(':tipo_examen',$tipo_examen);
$sql->bindValue(':cod_examen',$cod_examen);
$sql->bindValue(':sede',$sede);
$sql->bindValue(':id_estado',$id_estado);  
$sql->execute();
return $this->conexion->lastInsertId();
}
}
 ?>