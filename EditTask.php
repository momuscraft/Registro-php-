<?php

include('DB.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "SELECT * FROM task WHERE id = $id";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_array($result);
		$title = $row['title'];
		$description = $row['description'];

	}
}

if(isset($_POST['actualizar'])){
	$id = $_GET['id'];
	$title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = '$id'";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Tarea actualizada exitosamente!';
    $_SESSION['message_type'] = 'success';
    header('Location: Index.php');
}
 

?>

<?php include('Includes/header.php');?>

<div class="container p-4">
	<div class="row">
		<!-- se centa con mx-auto -->
		<div class="col-m-d4 mx-auto">
			<div class="card card-body">
				<form action="EditTask.php?id=<?php echo $_GET['id'];?>" method="POST">
					<div class="form-group text-center">
						<h1>Actualizar</h1>
					</div>
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualisar titulo...">
					</div>
					<div class="form-group">
						<textarea name="description" rows="5" class="form-control" placeholder="Actualisar descripción..."><?php echo $description; ?></textarea>
					</div>
					<div class="text-center">
						<button class="btn btn-success btn-center" name="actualizar">
						Actualizar!
					</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include('Includes/footer.php');?>