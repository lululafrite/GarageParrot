<?php include('../Controller/home.controller.php') ?>
<form action="" method="post">

	<div class="container pt-3">
		<div class="col-12 bg-dark d-flex justify-content-center text-light mx-auto mb-3 rounded-3">
			<h2 class="px-0 py-3 m-0 w-100"><input class="text-center <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'text-light bg-transparent';} ?> " type="text" id="txt_titre1" name="txt_home_titre1" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';}?> value="<?php echo $Home[0]['titre1']; ?>"></h2>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>
					<textarea  class="text-left <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>" name="txt_intro_chapter1" id="txt_intro_chapter1" rows="4" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?> style="text-align: justify;">
<?php echo $Home[0]['intro_chapter1']; ?></textarea>
				</p>
				<hr>
				<p>
					<textarea  class="text-left <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>" name="txt_intro_chapter2" id="txt_intro_chapter2" rows="4" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?> style="text-align: justify;">
<?php echo $Home[0]['intro_chapter2']; ?></textarea>
				</p>
			</div>
		</div>
	</div>
	
	<?php
	if($_SESSION['userConnected'] === 'Administrator'){
	?>
		<div class="container text-center">
			<button class="btn btn-lg btn-primary fs-4" id="bt_home" name="bt_home" type="submit">Enregistrer la page d'accueil</button>
		</div>
	<?php
	}
	?>

	<div class="container pt-3">
		<div class="col-12 bg-dark d-flex justify-content-center text-light mx-auto mb-3 rounded-3">
			<h2 class="px-0 py-3 m-0 w-100"><input class="text-center <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'text-light bg-transparent';} ?>" type="text" id="txt_home_titre2" name="txt_home_titre2" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?> value="<?php echo $Home[0]['titre2']; ?>"></h2>
		</div>
	</div>
	<div class="container pb-3">
		<div class="row">
			<div class="d-flex justify-content-center p-5 m-0">
				<div class="col-8 bg-light m-0 pe-5">
					<h2 class="text-center <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>"><input class="text-center" id="txt_article1_titre" name="txt_article1_titre" type="text" value="<?php echo $Home[0]['article1_titre']; ?>" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>></h2>
					<textarea class="text-left m-0 pe-5 <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>" name="txt_article1_chapter1" id="txt_article1_chapter1" rows="6" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article1_chapter1']; ?></textarea>
				</div>
				<img class="m-0 ps-5" src="../img/photo/<?php echo $Home[0]['article1_image1']; ?>" alt="photo mécanique">
			</div>
			<hr>
		</div>
	</div>
	<div class="container pb-3">
		<div class="row">
			<div class="d-flex justify-content-center p-5 m-0">
				<img class="m-0 pe-5" src="../img/photo/<?php echo $Home[0]['article1_image2']; ?>" alt="photo mécanique">
				<div class="col-8 bg-light m-0 ps-5">
				<h2 class="text-center <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>"><input class="text-center" id="txt_article1_titre2" name="txt_article1_titre2" type="text" value="<?php echo $Home[0]['article1_titre2']; ?>" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>></h2>
					<textarea class="text-left m-0 ps-5 <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>" name="txt_article1_chapter2" id="txt_article1_chapter2" rows="6" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article1_chapter2']; ?></textarea>
				</div>
			</div>
			<hr>
		</div>
	</div>
	<div class="container pb-3">
		<div class="row">
			<div class="d-flex justify-content-center p-5 m-0">
				<div class="col-8 bg-light m-0 pe-5">
				<h2 class="text-center <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>"><input class="text-center" id="txt_article2_titre" name="txt_article2_titre" type="text" value="<?php echo $Home[0]['article2_titre']; ?>" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>></h2>
					<textarea class="text-left m-0 pe-5 <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>" name="txt_article2_chapter1" id="txt_article2_chapter1" rows="6" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article2_chapter1']; ?></textarea>
				</div>
				<img class="m-0 ps-5" src="../img/photo/<?php echo $Home[0]['article2_image1']; ?>" alt="photo mécanique">
			</div>
			<hr>
		</div>
	</div>
	<div class="container pb-3">
		<div class="row">
			<div class="d-flex justify-content-center p-5 m-0">
				<img class="m-0 pe-5" src="../img/photo/<?php echo $Home[0]['article2_image2']; ?>" alt="photo mécanique">
				<div class="col-8 bg-light m-0 ps-5">
				<h2 class="text-center <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>"><input class="text-center" id="txt_article2_titre2" name="txt_article2_titre2" type="text" value="<?php echo $Home[0]['article2_titre2']; ?>" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>></h2>
					<textarea class="text-left m-0 ps-5 <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'bg-transparent';} ?>" name="txt_article2_chapter2" id="txt_article2_chapter2" rows="6" <?php if($_SESSION['userConnected'] != 'Administrator'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article2_chapter2']; ?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php
	if($_SESSION['userConnected'] === 'Administrator'){
	?>
		<div class="container text-center">
			<button class="btn btn-lg btn-primary fs-4" id="bt_home" name="bt_home" type="submit">Enregistrer la page d'accueil</button>
		</div>
	<?php
	}
	?>

</form>

<div class="container pt-3">
	<?php include("../Elements/_09_comment.php");?>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		afficherAlerte();
	});

	function afficherAlerte() {
		alert("ATTENTION! Je ne vous ai pas transmis le bon fichier *.sql. Utilisez celui qui est disponible dans le dossier 'Dossier_Technique' dans Github. Désolé pour le désagrément.");
	}
</script>