<?php 
include("DB.php");

if(isset($_POST['buttonSend'])){
	$title = $_POST['title'];
	$description = $_POST['description'];

	$query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    #Hago la consulta y recibo un resultado
	$result = mysqli_query($conn, $query);
	
	#sí no hay resultado
    if(!$result){
    	die("Query failed");
    }
	#caso contrario
    $_SESSION['message'] = 'Tarea guardada exitosamente!';
    $_SESSION['message_type'] = 'success';

    header("Location: Index.php");
}

?>