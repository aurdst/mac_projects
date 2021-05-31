<!DOCTYPE html>
<html>
<head>
	<title>La Balaine</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<!-- FORMAT DESKTOP -->

<!-- MENU TAB Phone-->
	<div id="BurgerMenu">
		<div id="headerTab">
			<div id="BoutonBurgermenuTab">
					<div class="barre1"></div>
					<div class="barre2"></div>
			</div>
		</div>

		<ul class="menuTab">
			<a href="./produits.php"><p>Produits</p></a>
			<a href="./blog.php"><p>Blog</p></a>
			<a href="./faq.php"><p>Faq</p></a>
			<a href="./magasins.php"><p>Magasins</p></a>
			<a href="./contactez-nous.php"><p>Contactez-nous</p></a>
		</ul>
	</div>
<!-- HEADER WITH LOGO -->

	<header>
		<img src="IMG/LaBalaineLogo.png" id="imgLogo" alt="LogoBalaine">
	</header>

<!-- MENU FLOAT LEFT -->

	<div id="menu">
		<div id="LiensMenu">
			<a href="./produits.php"><p>Produits</p></a>
			<a href="./blog.php"><p>Blog</p></a>
			<a href="./faq.php"><p>Faq</p></a>
			<a href="./magasins.php"><p>Magasins</p></a>
			<a href="./contactez-nous.php"><p>Contactez-nous</p></a>			
		</div>

					<!-- ICONES FLOAT RIGHT -->
		<div id="LiensResaux">  
			<img src="IMG/facebook-logo.png" class="inconesMenu" alt="Notre_Facebook">
			<img src="IMG/Logo_Twitter.png" class="inconesMenu" alt="Notre_Twitter">
			<img src="IMG/LinkedIn_logo_initials.png" class="inconesMenu" alt="Notre_Linkedin">
			<img src="IMG/Logo-google-plus.png" class="inconesMenu" alt="Notre_GooglePlus">
		</div>
	</div>

<!-- CAROUSEL -->

		<div id="CarouselBalaine">
			<figure id="ImgCarousel">
			<p>LA BALAINE A BOSSE</p>
			<img src="IMG/Balaine1.jpg" class="imgBalaine" alt="#">
			<p>LE GRAND CACHALOT</p>
			<img src="IMG/Balaine2.jpg" class="imgBalaine" alt="#">
			<p>LA BALAINE GRISE</p>
			<img src="IMG/Balaine3.jpg" class="imgBalaine" alt="#">
			</figure>
		</div>

<!--CARDS -->

<!-- CARD 1 -->
		<div id="Conteneurcards">

			<div class="Cards1">
			  <h2>Balaine a Bosse</h2>
			 	<div class="card">
			    	<img src="IMG/Balaine1.jpg" alt="Norway" class="ClassCards">
			    	<div class="container-text">
			      		<p>The Austrian whale</p>
			    	</div>
			  </div>
			</div>
<!-- CARD 2 -->
			<div class="Cards2">
			  <h2>Cachalot Géant</h2>
			 	<div class="card">
			    	<img src="IMG/Balaine2.jpg" alt="Cachalot" class="ClassCards">
			    	<div class="container-text">
			      		<p>The Europeen whale</p>
			    	</div>
			  </div>
			</div>
		</div>
<!-- CARD 3 -->
		<div id="Conteneurcards2">
			<div class="Cards3">
			  <h2>Balaine Asian</h2>
			 	<div class="card">
			    	<img src="IMG/Balaine3.jpg" alt="Balaine_Asiatique" class="ClassCards">
			    	<div class="container-text">
			      		<p>The Asian whale</p>
			    	</div>
			  </div>
			</div>
<!-- CARD 4 -->
			<div class="Cards4">
			  <h2>L'Orque</h2>
			 	<div class="card">
			    	<img src="IMG/Orque.jpg" alt="Orque" class="ClassCards">
			    	<div class="container-text">
			      		<p>The Pacific whale</p>
			    	</div>
			  </div>
			</div>
		</div>

<!-- FAQ QUESTIONS COURANTES -->

		<div id="QuestionsConteneurImg">
			<p>Questions Fréquentes</p>
			<img src="IMG/Questions.png" id="ImgQuestions">
			<ul id="list1">
				<li>Une balaine ça pèse combien ?</li>
				<li>Pourquoi une balaine rejète de l'eau ?</li>
				<li>Comment reconnaître les espèces ?</li>
			</ul>

			<ul id="list2">
				<li>Une balmaine mesure combien ?</li>
				<li>Combiens de tonnes mangent elles ?</li>
				<li>Combiens de balaines reste il ?</li>
			</ul>

			<ul id="list3">
				<li>Une balaine ça pèse combien ?</li>
				<li>Pourquoi une balaine rejète de l'eau ?</li>
				<li>Comment reconnaître les espèces ?</li>
			</ul>
		</div>

<!-- NOS VALEURS  -->

	<div id="ConteneurValeur">
		<div id="ListValeur">
			<h2>NOS VALEURS</h2>
			<ul>
				<li>Fondée en 1977 par le capitaine Paul Watson, LA BALAINE est l'ONG de défense des océans la plus combative au monde.</li>
				<li>Exposer les abus et les pratiques non durables ou non éthiques d'atteinte à la vie marine et à l'intégrité des écosystèmes marins en alertant les médias et l'opinion publique.</li>
				<li>Sensibiliser l'opinion publique au lien essentiel qui nous relie à l'océan à travers diverses interventions en festivals, écoles, organisation de conférences, expositions, publications, films, etc...</li>
				<li>La Balaine est 100% indépendante et ne bénéficie d'aucune subvention d'Etat afin de garantir sa liberté de parole et d'action. Les dons faits à l'association permettent en revanche de bénéficier d'une déduction fiscale de 66%</li>
			</ul>
		</div>
<!-- VIDEO -->
		<div id="videoBalaine">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/-TRwh0vPquU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
			</iframe>
		</div>
	</div>
<!-- FORMULAIRE -->

<?php 

if (isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['email'])) {
	echo '<p class="textForm2">Bonjour </p> <p class="textForm">'.$_POST['nom'].'</p>';
	echo '<br><p class="textForm2">Tu as fait une demande avec ton email suivant :</p><p class="textForm">'.$_POST['email'].'</p>';
} 

else {
echo ('	<div id="FormBalaine">
		<h2>CONTACT</h2>
		<form action="index.php" method="post">
			<label>Nom</label>
			<input type="text" name="nom" required>
			<label>Adress Mail</label>
			<input type="email" name="email" required>
			<label>Message</label>
			<input type="text" name="commentaire" required>
			<input type="submit" name="submit" value="Envoyez" id="boutonSubmit">
		</form>
	</div>
	');
}?>



<!-- FOOTER -->
	<div id="Footer">
		<div id="EnteteFooter"><p>Ou nous trouvez ?</p></div>
		<div id="CarteFooter">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40492.55484406144!2d3.012141147958344!3d50.631116695994415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d579b3256e11%3A0x40af13e81646360!2sLille!5e0!3m2!1sfr!2sfr!4v1548154717885" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div id="NavigationFooter">
			<ul>
				<li><a href="./produits.php"><p>Produits</p></a></li>
				<li><a href="./blog.php"><p>Blog</p></a></li>
				<li><a href="./faq.php"><p>Faq</p></a></li>
				<li><a href="./magasins.php"><p>Magasins</p></a></li>
			</ul>
		</div>
		<div id="ContactFooter">
			<ul>
				<li><a href="./produits.php"><p>Télephone</p></a></li>
				<li><a href="./blog.php"><p>Adresse</p></a></li>
				<li><a href="./faq.php"><p>Horaires</p></a></li>
			</ul>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
</script>	
 <script src="balaine.js"></script>
</body>
</html>