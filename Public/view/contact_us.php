<?php
	if ($user === "guest" || $user === "user" ) {
        if($_SESSION['local']===true){
            //echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
            header("Location: index.php?page=error_page");
            exit;
        }
        else{
            //echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';
            header("Location: https://www.follaco.fr/index.php?page=error_page");
            exit;
        }
        exit();
    }
?>

<section class="article__section">
	<h2 class="article__section--sousTitre">Nous sommes ici</h2>
	<iframe class="iframe__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10477.353050183938!2d1.5469892672780223!3d48.96608499154782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6b74347a16e4f%3A0x260b82c467317551!2sThiron%2C%2078980%20Br%C3%A9val!5e0!3m2!1sfr!2sfr!4v1698743184770!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<section class="aside__section">
	<article>
		<h3 class="aside__titre">Ludovic FOLLACO</h3>
	</br>
		<p>
			eMail : ludovic.follaco@free.fr
			</br>
			Adress : 20 Hameau de Thiron, 78980 BREVAL
			</br>
			Phone : 06.08.81.83.90
		</p>
	</article>
	<article>
		<h3 class="aside__titre">Style And Design</h3>
		<iframe class="iframe__map" src="https://www.youtube.com/embed/-FMOcBJUqtY?si=2LHXjBTb9bnhsD2-" allowfullscreen></iframe>
	</article>
	<article>
		<h3 class="aside__titre">Facebook Style And Design</h3>
		</br>
		<iframe style="height:200px; width:auto;" src="https://www.facebook.com/plugins/video.php?height=539&href=https%3A%2F%2Fwww.facebook.com%2FSD.atelierdecreation%2Fvideos%2F476705443848809%2F&show_text=false&width=560&t=0" width="560" height="539" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
	</article>

</section> 

