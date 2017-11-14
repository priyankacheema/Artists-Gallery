<?php include 'header.php';?>
    <div class="container-fluid">
      <?php
        /* Artworks and Artists */
        $pdo = new PDO("mysql:host=localhost:3306;dbname=arts","root","");
        $query = "Select * from artists join artworks where artists.ArtistID=artworks.ArtistID and ArtWorkID=".$_GET["id"];
        $statement = $pdo->prepare($query);
        $statement->execute();
        $artwork = $statement->fetch();
        if($artwork['Title'] == ""){
          header('Location: error.php?err=Invalid ArtWork ID');
          exit;
        }
      ?>
      <div id="imageModelContainer">
        <div id="artWorkImgModal" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                  <?php echo $artwork['Title']." by ".$artwork['FirstName']." ".$artwork['LastName']."</h4>"; ?>            
              </div>
              <div class="modal-body">
                <?php echo "<img width='450' height='500' data-toggle='modal' class='img-responsive' data-target='#artWorkImgModal' src='/Project3/images/art/works/medium/".$artwork['ImageFileName'].".jpg'/>";?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div> 
          </div>  
        </div>
      </div>
      <div class="row">
          <h3 class="artisttitle"><?php echo $artwork['Title']; ?></h3>
          <p class="padding-left-20">by <?php echo "<a href='Part02_SingleArtist.php?id=".$artwork['ArtistID']."'>".$artwork['FirstName'] ." ".$artwork['LastName']." </a>";?></p>
          <div class="col-md-3">
            <?php echo "<img data-toggle='modal' class='img-responsive' data-target='#artWorkImgModal' src='/Project3/images/art/works/medium/".$artwork['ImageFileName'].".jpg'/>";?>
          </div>
          <div class="col-md-5">
            <p class="details"><?php echo $artwork['Description']; ?></p>
            <font color='red'>$<?php echo number_format($artwork['Cost'], 2); ?></font><br><br>
            <div class="btn-group">
                <button class="btn btn-default text-primary">
                  <span class="glyphicon glyphicon-gift text-primary"></span> <span class="text-primary">Add to Wishlist</span>
                </button>
                <button class="btn btn-default text-primary">
                  <span class="glyphicon glyphicon-shopping-cart text-primary"></span> <span class="text-primary">Add to Shopping Cart</span>
                </button>
            </div>
            <br>
            <div class="panel" id="productDetailsPanel">
                <div class="panel-heading"> Product Details </div>
                <div class="panel-body">
                  <table id="productDetailsTable" class="table">
              <tr>
                <td>Date :</td>
                <td><?php echo $artwork['YearOfWork']; ?></td>
              </tr>
              <tr>
                <td>Medium : </td>
                <td><?php echo $artwork['Medium']; ?></td>
              </tr>
              <tr>
                <td>Dimensions : </td>
                <td><?php echo $artwork['Width']."X".$artwork['Height']; ?></td>
              </tr>
              <tr>
                <td>Home : </td>
                <td><?php echo $artwork['OriginalHome']; ?></td>
              </tr>
              <tr>
                <td>Genres : </td>
                <td> <?php 
                    /* Get Genres for the given artwork */
                    $query = "Select genres.GenreName from artworkgenres join genres where artworkgenres.GenreID=genres.GenreID and ArtWorkID=".$_GET["id"];
                    $statement = $pdo->prepare($query);
                    $statement->execute();
                    while($row = $statement->fetch()){
                      echo "<a href='#'>".$row[0]."</a><br/>";
                    }
                ?> </td>
              </tr>
              <tr>
                <td>Subjects : </td>
                <td> <?php 
                    /* Get Subjects for the given artwork */
                    $query = "Select subjects.SubjectName from artworksubjects join subjects where artworksubjects.SubjectID=subjects.SubjectID and ArtWorkID=".$_GET["id"];
                    $statement = $pdo->prepare($query);
                    $statement->execute();
                    while($row = $statement->fetch()){
                      echo "<a href='#'>".$row[0]."</a><br/>";
                    }
                ?> </td>
              </tr>
            </table>
                </div>
            </div>
            
          </div>
          <div class="col-md-2">
              <div class="panel panel-info">
                <div class="panel-heading"> Sales </div>
                <div class="panel-body">
                  <table id="orderDetailsTable" class="table">
                    <?php
                    /* Get Orders for the given artwork */
                    $query = "Select DATE_FORMAT(orders.DateCreated, '%m/%d/%y') from orders join orderdetails where orderdetails.OrderID=orders.OrderID and ArtWorkID=".$_GET["id"];
                    $statement = $pdo->prepare($query);
                    $statement->execute();
                    while($row = $statement->fetch()){
                      echo "<tr><td><a href='#'>".$row[0]."</a></td></tr>";
                    }
                    ?>
                 </table>
                </div>
              </div>
          </div>
      </div>
    </div>
</body>
</html>

