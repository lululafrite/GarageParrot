<?php include('../Controller/home.controller.php') ?>
<form action="" method="post">

	<div class="container pt-3">
		<div class="col-12 bg-dark d-flex justify-content-center text-light mx-auto mb-3 rounded-3">
			<h2 class="px-0 py-3 m-0 w-100"><input class="text-center <?php if($_SESSION['userConnected'] === 'Guest'){echo 'text-light bg-transparent';} ?> " type="text" id="txt_titre1" name="txt_home_titre1" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';}?> value="<?php echo $Home[0]['titre1']; ?>"></h2>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>
					<textarea  class="text-left <?php if($_SESSION['userConnected'] === 'Guest'){echo 'bg-transparent';} ?>" name="txt_intro_chapter1" id="txt_intro_chapter1" rows="4" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?> style="text-align: justify;">
<?php echo $Home[0]['intro_chapter1']; ?></textarea>
				</p>
				<hr>
				<p>
					<textarea  class="text-left <?php if($_SESSION['userConnected'] === 'Guest'){echo 'bg-transparent';} ?>" name="txt_intro_chapter2" id="txt_intro_chapter2" rows="4" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?> style="text-align: justify;">
<?php echo $Home[0]['intro_chapter2']; ?></textarea>
				</p>
			</div>
		</div>
	</div>
	
	<?php
	if($_SESSION['userConnected'] != 'Guest'){
	?>
		<div class="container text-center">
			<button class="btn btn-lg btn-primary fs-4" id="bt_home" name="bt_home" type="submit">Enregistrer la page d'accueil</button>
		</div>
	<?php
	}
	?>

	<div class="container pt-3">
		<div class="col-12 bg-dark d-flex justify-content-center text-light mx-auto mb-3 rounded-3">
			<h2 class="px-0 py-3 m-0 w-100"><input class="text-center <?php if($_SESSION['userConnected'] === 'Guest'){echo 'text-light bg-transparent';} ?>" type="text" id="txt_home_titre2" name="txt_home_titre2" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?> value="<?php echo $Home[0]['titre2']; ?>"></h2>
		</div>
	</div>
	<div class="container pb-3">
		<div class="row">
			<div class="col-12 col-lg-5 mx-auto ms-lg-0">
				<h3 class="bg-dark bg-opacity-75 rounded p-0 py-3 m-0"><input class="text-center <?php if($_SESSION['userConnected'] === 'Guest'){echo 'text-light bg-transparent';} ?>" type="text" id="txt_article1_titre" name="txt_article1_titre" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?> value="<?php echo $Home[0]['article1_titre']; ?>"></h3>
				<p>
					<textarea class="text-left <?php if($_SESSION['userConnected'] === 'Guest'){echo 'bg-transparent';} ?>" name="txt_article1_chapter1" id="txt_article1_chapter1" rows="2" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article1_chapter1']; ?></textarea>
				</p>
				<hr>
				<p>
					<textarea class="text-left <?php if($_SESSION['userConnected'] === 'Guest'){echo 'bg-transparent';} ?>" name="txt_article1_chapter2" id="txt_article1_chapter2" rows="6" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article1_chapter2']; ?></textarea>
				</p>
				<hr>
			</div>
			<div class="col-12 col-lg-5 mx-auto me-lg-0">
				<h3 class="bg-dark bg-opacity-75 rounded py-3"><input class="text-center <?php if($_SESSION['userConnected'] === 'Guest'){echo 'text-light bg-transparent';} ?>" type="text" id="txt_article2_titre" name="txt_article2_titre" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?> value="<?php echo $Home[0]['article2_titre']; ?>"></h3>
				<p>
					<textarea class="text-left <?php if($_SESSION['userConnected'] === 'Guest'){echo 'bg-transparent';} ?>" name="txt_article2_chapter1" id="txt_article2_chapter1" rows="2" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article2_chapter1']; ?></textarea>
				</p>
				<hr>
				<p>
					<textarea class="text-left <?php if($_SESSION['userConnected'] === 'Guest'){echo 'bg-transparent';} ?>" name="txt_article2_chapter2" id="txt_article2_chapter2" rows="6" <?php if($_SESSION['userConnected'] === 'Guest'){echo 'readonly disabled';} ?>>
<?php echo $Home[0]['article2_chapter2']; ?></textarea>
				</p>
				<hr>
			</div>
		</div>
	</div>
	<?php
	if($_SESSION['userConnected'] != 'Guest'){
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
