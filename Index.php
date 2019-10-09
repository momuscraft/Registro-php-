<!-- include my connection -->
<?php include("DB.php")?>
<!-- include my header -->
<?php include("Includes/header.php")?>
	
    <!-- div container with padding 4 -->
    <div class="container p-4">
    	<!-- div row (fila) -->
    	<div class="row">
    		<div class="col-md-4">

    			<?php if(isset($_SESSION['message'])){?>
    				<div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
    					<?= $_SESSION['message'] ?>
    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>
    				<?php session_unset();}?>

    			<div class="card card-body">
    				<!-- recibe los datos y los manda al metodo "post" -->
    				<form action="SaveTask.php" method="POST">
                        <!-- Title input -->
    					<div class="form-group">
    						<input type="text" name="title" class="form-control" placeholder="Titulo de la tarea..." autofocus>
    					</div>
    					<!-- Description textarea -->
    					<div class="form-group">
    						<textarea name="description" rows="5" class="form-control" placeholder="Descripción de la tarea..." autofocus></textarea>
    					</div>
    					<!-- Button send -->
    					<input type="submit" class="btn btn-success btn-block" name="buttonSend" value="Enviar">

    				</form>
    			</div>
    		</div>
    		<div class="col-md-8">

    			<table class="table table-bordered">
    				<!-- Cabeza de tabla -->
    				<thead>
    					<tr>
    						<th>Titulo</th>
    						<th>Descripción</th>
    						<th>Creacion</th>
    						<th>Acciones</th>
    					</tr>
    				</thead>
    				<!-- Cuerpo de tabla -->
    				<tbody>
    					<?php 
    					$query = "SELECT * FROM task";
    					$result_task = mysqli_query($conn, $query);

    					#Empieza el while
    					while($row = mysqli_fetch_array($result_task)){ ?>

    						<tr>
    							<td><?php echo $row['title'] ?></td>
    							<td><?php echo $row['description'] ?></td>
    							<td><?php echo $row['created_at'] ?></td>
    							<td>
    								<!-- Se concatena en la dirección el id de cada row EPIC! -->
    								<a href="EditTask.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
    									<i class="fas fa-marker"></i>
    								</a>
    								<a href="DeleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
    									<i class="far fa-trash-alt"></i>
    								</a>
    							</td>
    						</tr>
    					<!-- Termina el while -->
    					<?php } ?>
    					
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
    
<?php include("Includes/footer.php")?>