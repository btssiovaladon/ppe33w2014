<?php
if(!empty($SESSION['login']))
{

?>
 <form action="page/action_connexion.php" method="post"> 
 	Login: <input type="text" name="login" value="" /> <br /> 	 	
 	Password : <input type="password" name="password" value="" /> <br /> 
 	<input type="submit" name="connexion" value="Connexion" /> 
 </form>

<?php
}
else
{
echo 'Se deconnecter';
}
?>