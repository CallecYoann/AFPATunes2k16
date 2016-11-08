<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Add track</title>
  </head>

<style media="screen">
  .addTrack {
    text-align: center;
    margin: 5px 0 5px 0;
  }
  .btn-primary {
    margin: 10px 0 5px 0;
  }

</style>

  <body>
      <form class="addTrack" action="function/add_track_ok.php" method="post">
        <input class="addTrack" type="text" name="artist" value="" placeholder="Artist"><br>
        <input class="addTrack" type="text" name="title" value="" placeholder="Title"><br>
        <input class="addTrack" type="text" name="duration" value="" placeholder="Duration"><br>
        <input class="addTrack" type="text" name="year" value="" placeholder="Year"><br>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>



  </body>
</html>
