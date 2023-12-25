<?php
session_start();
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
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<!-- <script>
	// 	window.dataLayer = window.dataLayer || [];
	// 	function gtag(){dataLayer.push(arguments);}
	// 	gtag('js', new Date());

	// 	gtag('config', 'UA-119386393-1');
	// </script> -->
</head>
<body class="login-page" style="background-position: left;background-size: cover;";>
	<div class="login-header box-shadow" style="background:#28a745;">
		<div class="container-fluid d-flex justify-content-between align-items-center">

			<!-- image du logo -->
			<div class="brand-logo">
				<a href="login.php">
					<img style="width: 120px;height: 50px;" src="src/images/logogestpoint1.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="index.php" style="color:#fff;">Apprenant</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row justify-content-center">
			
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-dark">Administrateur</h2>
						</div>
						<form method="POST" action="login0.php">	
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									
								</div>
							</div>
							<div class="input-group custom">
								<input name="nom_utilisateur" required class="form-control form-control-lg" placeholder="Nom d'utilisateur">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="mot_de_passe" required required class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<!-- <div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Se souvenir</label>
									</div>
								</div> -->
								<div class="col-6">
									<div class="forgot-password"><a href="#">Mot de passe oublier!</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">

											<input class="btn btn-dark btn-lg btn-block" type="submit" value="Se connecter">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>