<?php 
$amis = fun_get_all_ami($co);
$comissions = fun_get_all_comissions($co);
?> 
S�l�ctionnez un ami:
<form 
<select id="amis">
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
</select><br>
S�l�ctionnez une commission:
<select id="commission">
<?php
foreach($comissions as $ligne)
{
?>
<option value="<?php echo $ligne['N_COMMISSION']; ?>">
<?php echo $ligne['NOM_COMMISSION']; ?>
</option>
<?php 
} 
?>
</select><br>
<input type="submit">