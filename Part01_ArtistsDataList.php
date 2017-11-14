<?php include 'header.php';?>
    <div class="container-fluid">
      <h2>Artist Data List (Part 01)</h2>
      <hr/>
      <?php
        $pdo = new PDO("mysql:host=localhost:3306;dbname=arts","root","");
        $query = "Select * from artists order by LastName";
        $statement = $pdo->prepare($query);
        $statement->execute();
        while($row = $statement->fetch()){
          echo "<a href='/Project3/Part02_SingleArtist.php?id=".$row['ArtistID']."'>".$row['FirstName']." ". $row['LastName'] . " ( ".$row['YearOfBirth']." - ".$row['YearOfDeath']." )</a> <br>";
        }
      ?>
    </div>
</body>
</html>

