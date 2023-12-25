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
	$sql = "select heure_de_connexion, prenom, referenciel from connexion inner join apprenant on connexion.idapprenant=apprenant.idapprenant ORDER BY `idconnexion` DESC";
	$result = $conn->query($sql);
	
	// Fermer la connexion à la base de données
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
						<a class="dropdown-item" href="login.php"><i class="dw dw-logout"></i>Se déconnecter</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="left-side-bar" style="background:#28a745;">
		<div class="brand-logo">
			<a href="accueil.php">
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
							<span class="micon dw dw-apartment"></span><span class="mtext"> UI Elements </span>
						</a>
						<ul class="submenu">
							<li><a href="ui-modals.html">Modals</a></li>
							<li><a href="ui-sweet-alert.html">Sweet Alert</a></li>
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
								<h4>Pointage des apprenants</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="accueil.html">Accueil</a></li>
									<li class="breadcrumb-item active" aria-current="page">Pointage des apprenants</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				
				<!-- Export Datatable start -->
				<div class="card-box mb-30">
					<div class="pb-20">
						<table class="table table-striped table-sm">
						<tbody> 
								<?php
									if ($result->num_rows > 0) {
									echo "
									<th scope='col' style='padding: 1rem;'>Prénom</th>
									<th scope='col' style='padding: 1rem;'>Cohorte</th>
									<th scope='col' style='padding: 1rem;'>Pointage</th>
									</tr>
								</thead>";

									while ($row = $result->fetch_assoc()) {
										echo "
											<tr>
												<td>". $row["prenom"] ."</td>
												<td>". $row["referenciel"] ."</td>
												<td style='color:green';><i class='icon-copy fa fa-clock-o' aria-hidden='true' ></i>   
												". $row["heure_de_connexion"] ."      
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
				<!-- Export Datatable End -->
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