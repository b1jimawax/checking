<?php
require_once('verifi.php');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Gest-Point</title>

	<!-- Site favicon -->
	<!-- <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<!-- <script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script> -->

	<?php
// Inclure le fichier de connexion à la base de données
include("connexion.php"); 

// Récupérer les données de la table "Apprenant"
$sql = "SELECT * FROM `apprenant` ORDER BY `idapprenant` asc";
$result = $conn->query($sql);

$conn->close();
?>
</head>
<body>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Recherche">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
					</a>
				</div>
			</div>
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
						<i class="icon-copy fa fa-user-o" aria-hidden="true"></i>
						</span>
						<span class="user-name">Admin</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="deconnexion.php"><i class="dw dw-logout"></i>Se déconnecter</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="left-side-bar" style="background:#28a745;">
		<div class="brand-logo">
			<a href="login.php">
			<img style="width: 120px;height: 50px;" src="src/images/logogestpoint1.png" alt="">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Accueil</span>
						</a>
						<ul class="submenu">
							<li><a href="lsapprenant.php">Apprenants</a></li>
							<li><a href="lspoint.php">Pointages</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-apartment"></span><span class="mtext"> Option1 </span>
						</a>
						<ul class="submenu">
							<li><a href="#">Sous op1</a></li>
							<li><a href="#">Sous op2</a></li>
						</ul>
					</li>
			
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="accueil.php">Accueil</a></li>
									<li class="breadcrumb-item active" aria-current="page">Liste des apprenants</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pb-20">
						<table class="table table-striped table-sm">
							<thead> 
							<tbody>      		
							<?php
								if ($result->num_rows > 0) {
								echo "
								<tr>
								    <th style='padding: 1rem;'>#ID</th>
									<th style='padding: 1rem;'>Prénom</th>
									<th style='padding: 1rem;'>Cohorte</th>
									<th style='padding: 1rem;'>Action</th>
								</tr>
							</thead>";

								while ($row = $result->fetch_assoc()) {
									echo "

									
										<tr>
										<td>" . $row["idapprenant"] . "</td>
										<td>" . $row["prenom"] . "</td>
										<td>" . $row["referenciel"] . "</td>
										<td>
										<div class='dropdown'>
											<a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
												<i class='dw dw-more'></i>
											</a>
											<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
												<a class='dropdown-item' href='#'><i class='dw dw-eye'></i> Voir</a>
												<a class='dropdown-item' href='#'><i class='dw dw-edit2'></i> Modifier</a>
												<a class='dropdown-item' href='#'><i class='dw dw-delete-3'></i> Supprimer</a>
											</div>
										</div>
									</td>
											
										</tr>";
								}

								echo "</table>";
							} else {
								echo "Aucun apprenant enregistré en base de données.";
							}

							?>
									</tbody>
									</table>



					</div>
				</div>
				<!-- Simple Datatable End -->
				</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Application de gestion de pointages de apprenants  <a href="" target="_blank">Benji@mawax</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>