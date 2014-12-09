<?php
session_start();
if (!isset($_SESSION['login']))
{
?>
 <form id="commentForm" action="page/action_connexion.php" method="post">
 	<table border="0">
 		<p> 
		    <tr>
		      	<td><label for="clogin">Login </label></td>
		      	<td><input id="clogin" name="login" minlength="5" type="text" value="" required/></td>
		    </tr>
		    <tr>
		      	<td><label for="cpassword">Mot de passe </label></td>
		      	<td><input id="cpassword" name="password" minlength="5" type="password" value="" required/></td>
		      	<td><input type="submit" name="connexion" value="Connexion" /></td>
		    </tr>
		</p>
 	</table>
 </form>

<?php
}
else
{
?>
 <form action="page/action_deconnexion.php" method="post">
 	<?php echo $_SESSION['login']; ?>
 	<input type="submit" name="deconnexion" value="deconnexion"/>
 </form>
<?php
}
?>