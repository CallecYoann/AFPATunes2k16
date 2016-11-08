<?php
// Dans les versions de PHP antiéreures à 4.1.0, la variable $HTTP_POST_FILES
// doit être utilisée à la place de la variable $_FILES.

$fichier = basename($_FILES['userfile']['name']);
$extensions = array(".png", ".jpeg", ".mp3");
$extension = strrchr($_FILES['userfile']['name'], '.');
$taille_maxi = 10000000;
$taille = filesize($_FILES['userfile']['tmp_name']);
$image_size = getimagesize($_FILES['userfile']['tmp_name']);
$maxwidth = 1000;
$maxheigth = 1000;


if(!in_array($extension, $extensions)) {
  $erreur = 'Vous devez utiliser une extenion de type .png, .jpeg ou .mp3';
}
if($taille>$taille_maxi) {
  $erreur = 'Fichier trop volumineux';
}
if($_FILES['userfile']['error'] > 0) {
  $erreur = "Erreur lors du transfert";
}
if(($image_size[0] > $maxwidth) OR ($image_size[1] > $maxheigth)) {
  $erreur = 'Image trop grande';
}
if(!isset($erreur)) {
  // on clean le nom en élinant tous caractères spéciaux
  $fichier = strtr($fichier,
    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
  $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

   $dossier = 'uploadfiles/';
   if(move_uploaded_file($_FILES['userfile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
   {
        echo 'Upload effectué avec succès !';
   }
   else //Sinon (la fonction renvoie FALSE).
   {
        echo 'Echec de l\'upload !';
   }
}
else {
  echo $erreur;
}
?>
