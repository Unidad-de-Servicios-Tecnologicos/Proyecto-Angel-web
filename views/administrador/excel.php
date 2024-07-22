<?php
include("../../includes/conexion.php") ;
$query=mysqli_query($con,"SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'");
$docu="detalles.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .$docu);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=4>Reporte de encuestas</th>';
echo '</tr>';
echo '<tr><th>...</th><th>...</th><th>...</th><th>...</th></tr>';
while($row=mysql_fetch_array($query)){
    echo '<tr>';
    echo '<td>'.$row['nombre'].'</td>';
    echo '<td>'.$row['cantidad'].'</td>';
    echo '<td>'.$row['....'].'</td>';
    echo '<td>'.$row['....'].'</td>';
    echo '</tr>';

}
echo '</tr>';




include '../../includes/conexion.php';

if(isset($_GET['export'])){
    $output = "<table class='table table-bordered' border='1'>  
                <tr>  
                    <th scope='col'>ID</th>
                    <th scope='col'>Nombre</th>
                    <th scope='col'>Edad</th>
                    <th scope='col'>Departamento</th>
                </tr>";

    $sql = "SELECT * FROM employees ORDER BY id DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($data as $row){
        $output .= "<tr>  
                     <td>".($row['id'])."</td>   
                     <td>".$row['name']."</td> 
                     <td>".$row['age']."</td>  
                     <td>".$row['department']."</td>   
                 </tr>";
    }

    $output .= "</table>";

    $filename = "datos_empleados_".date('Ymd') . ".xls";         
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    echo $output;
}
?>

