<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>CRUD</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="/">Project</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/">Home</a>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<i class="bi-search" style="font-size: 1.5rem; color: lightgray;"></i>
				</form>
			</div>
		</div>
	</nav>

	<div class="container text-center">
		<div class="row">
	    	<div style="">
	    		<br>
				<h3>CreateReadUpdateDelete</h3><hr>
				
				<a type="button" class="btn btn-primary" href="/create.php">
					<i class="bi bi-person-plus-fill" style="font-size: 1rem"></i>
					New client
				</a>
				<br><br>

				<table class="table table-dark table-striped rounded rounded-3 overflow-hidden">
					<nav class="nav nav-pills flex-column flex-sm-row" style="padding-bottom: 5px;">
						<a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Active</a>
						<a class="flex-sm-fill text-sm-center nav-link" href="#">Link1</a>
						<a class="flex-sm-fill text-sm-center nav-link" href="#">Link2</a>
						<a class="flex-sm-fill text-sm-center nav-link disabled">Link3</a>
					</nav>

					<thread>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Adress</th>
							<th>Created at</th>
							<th>Action</th>
						</tr>
					</thread>
					<tbody>
						<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "CRUD";

							// Create connection
							$connection = new mysqli($servername, $username, $password, $dbname);

							// Check connection
							if ($connection->connect_error){
								die("Connection failed: " . $connection->connect_error);
							};

							// Read all rows from database table
							$sql = "SELECT * FROM clients";
							$result = $connection->query($sql);

							if (!$result){
								die("Invalid query: " . $connection->error);
							}

							// Read data from each row
							while($row = $result->fetch_assoc()){
								echo "
								<tr>
									<td>$row[id]</td>
									<td>$row[name]</td>
									<td>$row[email]</td>
									<td>$row[phone]</td>
									<td>$row[address]</td>
									<td>$row[created_at]</td>
									<td>
										<a class='btn btn-info' href='/edit.php?id=$row[id]'>
											<i class='bi bi-pencil-fill' style='font-size: 1rem;'></i>
											Edit
										</a>
										<a class='btn btn-danger' href='/delete.php?id=$row[id]'>
											<i class='bi bi-trash3-fill' style='font-size: 1rem'></i>
											Delete
										</a>
									</td>
								</tr>
								";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>