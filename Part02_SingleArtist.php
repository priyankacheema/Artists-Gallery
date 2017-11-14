<?php include 'header.php';?>
    <div class="container-fluid">
      <?php
        $pdo = new PDO("mysql:host=localhost:3306;dbname=arts","root","");
        $query = "Select * from artists join artworks where artists.ArtistID=artworks.ArtistID and artists.ArtistID=".$_GET["id"];
        $statement = $pdo->prepare($query);
        $statement->execute();
        $artists_artworks = array();
        while($row = $statement->fetch()){
          $artists_artworks[] = $row;
        }
        if(count($artists_artworks)<=0){
          header('Location: error.php?err=Invalid Artist ID');
          exit;
        }
      ?>
      <div class="row">
          <h3 class="artisttitle"><?php echo $artists_artworks[0]['FirstName'] ." ". $artists_artworks[0]['LastName']; ?></h3>
          <div class="col-md-3">
            <?php echo "<img class='img-responsive' src='/Project3/images/art/artists/medium/".$artists_artworks[0]['ArtistID'].".jpg'/>";?>
          </div>
          <div class="col-md-4">
            <p class="details"><?php echo $artists_artworks[0]['Details']; ?></p>
            <button class="btn btn-default fav-button"><span class="glyphicon glyphicon-heart text-primary"></span> <span class="text-primary">Add to Favorites List</span></button>
            <br>
            <div class="panel" id="productDetailsPanel">
                <div class="panel-heading"> Artist Details </div>
                <div class="panel-body">
                  <table class="table">
                    <tr>
                      <td>Date :</td>
                      <td> <?php echo $artists_artworks[0]['YearOfBirth']." - ".$artists_artworks[0]['YearOfDeath']; ?></td>
                    </tr>
                    <tr>
                      <td>Nationality : </td>
                      <td><?php echo $artists_artworks[0]['Nationality']; ?></td>
                    </tr>
                    <tr>
                      <td>More Info : </td>
                      <td><?php echo "<a href='".$artists_artworks[0]['ArtistLink']."'>".$artists_artworks[0]['ArtistLink']."</a>";?></td>
                    </tr>
                  </table>
                </div>
            </div>
          </div>
          <div class="col-md-4"></div>
      </div>
      <h3>Art by <?php echo $artists_artworks[0]['FirstName'] ." ". $artists_artworks[0]['LastName']; ?></h3>
      <div id="gallery" class="row">
        <?php foreach($artists_artworks as $artwork){
          echo "<div class='col-md-3 thumbnail center margin-right-50'>
                  <a href='/Project3/Part03_SingleWork.php?id=".$artwork['ArtWorkID']."'>
                    <img class='img-thumbnail' src='/Project3/images/art/works/square-medium/".$artwork['ImageFileName'].".jpg'/>
                  </a>
                  <p><a href='/Project3/Part03_SingleWork.php?id=".$artwork['ArtWorkID']."'>".$artwork['Title']."</a></p>
                  <a href='/Project3/Part03_SingleWork.php?id=".$artwork['ArtWorkID']."'>
                    <button class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-info-sign'></span> View</button>
                  </a>
                  <button class='btn btn-xs btn-success'><span class='glyphicon glyphicon-gift'></span> Wish</button>
                  <button class='btn btn-xs btn-info'><span class='glyphicon glyphicon-shopping-cart'></span> Cart</button>
                </div>";
        }?>
      </div>
    </div>
</body>
</html>

