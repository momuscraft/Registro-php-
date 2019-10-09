<?php 
   
    include('DB.php');

    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	$query = "DELETE FROM task WHERE id = $id";
    	$result = mysqli_query($conn, $query);

    	#sí no hay resultado
    	if(!$result){
    		die ("Error al eliminar..");
    	}

    	#caso contrario
    	$_SESSION['message'] = "Tarea eliminada con exito";
    	$_SESSION['message_type'] = "danger";

    	header("Location: Index.php");
    }

?>