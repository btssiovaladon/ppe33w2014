<?php 
$amis = fun_get_all_ami($co);
$commissions = fun_get_all_commissions($co);

if(isset($_POST['creer']))
{
fun_inscrire_commission ($co, $_POST['commission'], $_POST['amis']);
}
?> 
<table>
<tr>
<td>Séléctionnez un ami:</td>
<form name="inscription" action="" METHOD="POST">
<td><select name="amis">
<?php
foreach($amis as $ligne)
{
?>
<option value="<?php echo $ligne['N_AMIS']; ?>">
<?php echo $ligne['NOM_AMIS']. " " .$ligne['PRENOM_AMIS']; ?>
</option>
<?php 
} 
?>
</select></td>
</tr>
<tr>
<td>Séléctionnez une commission:</td>
<td><select name="commission">
<?php
foreach($commissions as $ligne)
{
?>
<option value="<?php echo $ligne['N_COMMISSION']; ?>">
<?php echo $ligne['NOM_COMMISSION']; ?>
</option>
<?php 
} 
?>
</select></td>
</tr>
<tr>
<td><input type="submit" name="creer"></td>
</table>
</form>