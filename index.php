<!DOCTYPE html>
<html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire (id et prénom de l'apprenant)
    $idapprenant = $_POST["idapprenant"];

    // Ici, tu devrais effectuer la logique d'authentification avec les valeurs fournies

    include("connexion.php");

    // Enregistrer l'heure de connexion
    $heure_de_connexion = date("Y-m-d H:i:s");
    $heure_de_connexion_avancee = date("Y-m-d H:i:s", strtotime($heure_de_connexion . " +1 hour"));
    
    $sql = "INSERT INTO Connexion (idapprenant, heure_de_connexion) VALUES ('$idapprenant', '$heure_de_connexion_avancee')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Succès !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 Votre présence a bien été enregistrée !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>';
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}
?>


<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Gest-Point</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script> -->
</head>

<body style="background-image: url(src/images/ref.jpg);background-position: top;background-size: cover;";>
	<div class="login-header box-shadow" style="background:#28a745;">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo ">
				<a href="login.html">
				<img style="width: 120px;height: 50px;" src="src/images/logogestpoint1.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login.php" style="color:#fff;">Administrateur</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ml-auto"> <!-- Ajoutez la classe ml-auto ici -->
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center">APPRENANT</h2>
                    </div>
                    <h6 class="mb-20">Entrez votre identifiant</h6>
                    <form method="POST" action="">
                        <div class="input-group custom">
                            <input type="text" name="idapprenant" required class="form-control form-control-lg" placeholder="Identifiant">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <input class="btn btn-success btn-lg btn-block" type="submit" value="Pointer ma présence">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionne la modale par son ID
    var successModal = document.getElementById("successModal");

    // Crée une instance Bootstrap Modal
    var modal = new bootstrap.Modal(successModal);

    // Lorsque l'enregistrement est réussi, affiche la modale
    // Appelle cette ligne de code lorsque tu veux afficher la modale
    // Par exemple, après avoir enregistré la présence
    modal.show();
});
</script>

	
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>

	<!-- add sweet alert js & css in footer -->
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>