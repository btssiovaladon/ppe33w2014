<<<<<<< HEAD
<header>
	<div class="main">
		<div class="border-top">
			<?php
				include ("page/form_connexion.php"); 
			?>
		</div>
	</div>

	<div class="main">
		<div class="border-top">
			<div class="wrapper">
				<?php
					include("include/inc_menu.php");
				?>
			</div>
		</div>
		<div class="slider-bg">
			<div class="slider">
									                  
			</div>
		</div>
	</div>
</header>
=======

<?php
	 include ("page/form_connexion.php"); 
?>


				<div class="main">
					<div class="border-top">
						<div class="wrapper">
							<h1><a href="index.php">Le Club des Amis</a></h1>
							<?php include("include/inc_menu.php");?>
						</div>
					</div>
<?php
if(!isset($_GET['page'])){
?>					<div class="slider-bg">
						<div class="slider">
							
                            
						</div>
					</div>
<?php } ?>
				</div>
>>>>>>> 8e9043dbaf9d43d09e78d6dbda558bc01ddc81cb
