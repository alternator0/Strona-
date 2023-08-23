<?php
require 'vendor/autoload.php';
$secret = new AzKeyVault\Secret('https://dbkey2147333.vault.azure.net/');
$secretValue = $secret->getSecret('KluczDoBazy');
$password = $secretValue->secret;
$con=mysqli_connect("10.0.0.7:3306","Konrad","$password","grocerydb");
if(!$con)
{
	die("cannot connect to server");
}	
?>
