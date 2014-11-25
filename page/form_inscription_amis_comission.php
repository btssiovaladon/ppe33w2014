<?php 
$amis = fun_get_all_ami($co);
?> 
Séléctionnez un ami:
<select>
<?php
while($ligne = $amis->fetch())
{
?>
<option value="<?php echo $ligne['N_AMIS'] ?>">
<?php echo $ligne['NOM_AMIS']. " " .$ligne['PRENOM_AMIS'] ?>
</option>
<?php 
} 
?>
</select>
Séléctionnez une commission:
<?php
while($ligne = $comissions->fetch())
{
?>
<option value="<?php echo $ligne['N_COMMISSION'] ?>">
<?php echo $ligne['NOM_COMMISSION'] ?>
</option>
<?php 
} 
?>
</select>