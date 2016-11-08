<?php
session_start();

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>AFPATunes</title>
    </head>
<?php $class="" ?>
    <body class= <?php $class ?>>

        <?php

        include 'config/config.php';

$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

$stmt = $pdo->query("SELECT * FROM track;");
?>
            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">

                            <?php
                            if (isset($_SESSION["login"]))
                          			{
                             echo "Welcome " . $_SESSION['login'];}
                             else{ ?>

                               <button type="submit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addBtnSignupModal">Sign up</button>

                               <?php

                             } ?>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            </li>
                            <?php
                          if (isset($_SESSION["login"]))
                        			{
                                ?>
                                <li>
                                  <form class="navbar-form navbar-right" id="deco" action="function/deco.php" method="post">
                                    <div class="form-group">
                                      <input class="btn btn-info btn-sm" type="submit" name="decoBtn" value="Disconnect">
                                    </div>
                                  </form>
                                </li>
                        			<?php  }
                              else {
                              ?>


                              <li>
                                <form class="navbar-form navbar-right" id="login" action="function/auth.php" method="post">
                                  <div class="form-group">
                                    <input type="text" name="logintext" placeholder="Login">
                                    <input type="password" name="pwdtext" placeholder="Password">
                                    <input class="btn btn-info btn-sm" type="submit" name="loginBtn" value="Connexion">
                                  </div>
                                </form>
                              </li>
                        		<?php }
                            ?>
                        </ul>
                    </div>

                </div>

						</nav>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="grand">Artist</th>
                        <th class="grand">Title</th>
                        <th class="moyen">Duration</th>
                        <th class="moyen">Year</th>           <!-- CREATION DE CLASSES POUR ESSAYER DE BIEN CADRER LE TABLEAU, GENRE PETITE COLONNE POUR LES BUTTONS -->
                        <th class="petit">Edit</th>
                        <th class="petit">Del</th>
												<th class="petit">Add</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

while( $ligne = $stmt->fetch() ) // boucle sur chaque enregistrement
{
		echo '<tr><td class="grand">' . $ligne['artist']  . '</td>';
		echo '<td class="grand">' . $ligne['title']  . '</td>';
		echo '<td class="moyen">' . $ligne['duration']  . '</td>';
		echo '<td class="moyen">' . $ligne['year']  . '</td>';
    echo '<td class="petit"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addBtnEditModal" name="'.$ligne['id'].'">Editmodal</button></td></tr>';

		echo '<td class="petit"><a name = "'. $ligne['id'].'" class="btn btn-warning btn-sm" href=function/edit.php?id=' . $ligne['id']  . '>edit</a></td>';
		echo '<td class="petit"><a class="btn btn-danger btn-sm" href=function/del.php?id=' . $ligne['id']  . '>del</a></td>';
		echo '<td class="petit"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addBtnModal">add</button></td></tr>';
    
}
echo "</tbody>";
echo "</table>";

?>


<!-- FOOTER -->
<footer class="footer">
    <form class="container" action="form/uploadform.php" method="post"> <!-- ANCIEN FORM POUR FOOTER -->
        <!-- <input id="addbtn" class="btn btn-primary" type="submit" value="Ajouter un son, WESH !" /> -->  <!-- ANCIEN BOUTON -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addBtnTrackModal">Add track</button>
        <input class="btn btn-success btn-sm" type="submit" name="name" value="UPLOAD">
    </form>
</footer>



<!-- DEBUT FENETRE MODAL BOUTON ADD -->
  <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="addBtnModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>         <!-- BOUTON CLOSE MODAL -->
          <h4 class="modal-title">Add track into playlist</h4>    <!--  HEADER MODAL -->
        </div>
        <div class="modal-body">    <!-- BODY MODAL-->
        <p>Select playlist :</p>
        <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary">
          <input type="radio" name="options" id="option1" autocomplete="off"> Playlist 1
        </label>
        <label class="btn btn-primary">
          <input type="radio" name="options" id="option2" autocomplete="off"> Playlist 2
        </label>
      </div>
      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#">Add</button><br><br>
        <p>Create new playlist</p>
        <input type="text" name="name" value="">
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#">+</button>
        </div>
        <div class="modal-footer">      <!-- FOOTER MODAL -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- FIN FENETRE MODAL BOUTON ADD -->


<!-- DEBUT FENETRE MODAL BOUTON AJOUTER SON -->
<div class="container">
<!-- Modal -->
<div class="modal fade" id="addBtnTrackModal" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>         <!-- BOUTON CLOSE MODAL -->
        <h4 class="modal-title">Add track</h4>    <!--  HEADER MODAL -->
      </div>
      <div class="modal-body">    <!-- BODY MODAL-->
        <?php include 'form/modal_add_track.php'; ?>
      <div class="modal-footer">      <!-- FOOTER MODAL -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- FIN FENETRE MODAL BOUTON AJOUTER SON -->


<!-- DEBUT FENETRE MODAL SIGNUP -->
<div class="container">
<!-- Modal -->
<div class="modal fade" id="addBtnSignupModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>         <!-- BOUTON CLOSE MODAL -->
        <h4 class="modal-title">Please enter your personnal information</h4>    <!--  HEADER MODAL -->
      </div>
      <div class="modal-body">    <!-- BODY MODAL-->
        <?php include 'form/modal_add_user.php'; ?>
      <div class="modal-footer">      <!-- FOOTER MODAL -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- FIN FENETRE MODAL BOUTON AJOUTER SIGNUP -->

<!-- DEBUT FENETRE MODAL BOUTON EDIT -->
<div class="container">
  <!-- Modal -->

<!-- FIN FENETRE MODAL BOUTON EDIT -->

    </body>

    </html>
