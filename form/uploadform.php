<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>upload your picture</title>
  </head>
  <body>
    <!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
<form enctype="multipart/form-data" action="uploads/upload.php" method="post">
<!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
<!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
Envoyez ce fichier : <input name="userfile" type="file" />
<input  type="submit" value="Envoyer le fichier" />
</form>
  </body>
</html>
