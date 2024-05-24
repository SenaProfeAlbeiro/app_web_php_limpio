			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
				</h3>
				<p class="text-justify">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="?c=Users&a=userCreate"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a class="active" href="?c=Users&a=userRead"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; CONSULTAR USUARIOS</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">								
								<th>ROL</th>
								<th>CODIGO</th>
								<th>NOMBRES</th>
								<th>APELLIDOS</th>
								<th>IDENTIFICACIÓN</th>
								<th>EMAIL</th>
								<th>ESTADO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user) : ?>
								<tr class="text-center" >
									<td><?php echo $user->getRolName(); ?></td>
									<th><?php echo $user->getUserCode(); ?></th>
									<th><?php echo $user->getUserName(); ?></th>
									<th><?php echo $user->getUserLastName(); ?></th>
									<th><?php echo $user->getUserId(); ?></th>
									<th><?php echo $user->getUserEmail(); ?></th>
									<th><?php echo $state[$user->getUserState()]; ?></th>
									<td>
										<a href="?c=Users&a=userUpdate&idUser=<?php echo $user->getUserCode(); ?>" class="btn btn-success">
											<i class="fas fa-sync-alt"></i>	
										</a>
									</td>
									<td>
										<a href="?c=Users&a=userDelete&idUser=<?php echo $user->getUserCode(); ?>" class="btn btn-warning">
											<i class="far fa-trash-alt"></i>	
										</a>									
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>