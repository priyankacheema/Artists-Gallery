<?php
    include 'header.php';
    $pdo = new PDO("mysql:host=localhost:3306;dbname=arts","root","");
    $resultset = array();
    $highlight = true;
    $searchTerm = null;
    if (isset($_GET["Title"]) && $_GET["Title"] != "") {
      $highlight = false;
      $searchTerm = $_GET["Title"];
      $query = "Select * from artworks where Title like '%".$_GET["Title"]."%'";
    }
    else if (isset($_GET["Description"]) && $_GET["Description"]!="") {
      $searchTerm = $_GET["Description"];
      $query = "Select * from artworks where Description like '%".$_GET["Description"]."%'";
    }
    else {
      $highlight = false;
      $query = "Select * from artworks";
    }
    $statement = $pdo->prepare($query);
    $statement->execute();
    while($row = $statement->fetch()){  
      if($highlight){
        $row['Description'] = preg_replace("/($searchTerm)/i", "<span class='highlight'>$1</span>", $row['Description']);
      }
      $resultset[] = $row;
    }
?>
  <h2 class="margin-left-30">Search Results</h2>
  <hr>
  <form id="search-form" action="Part04_Search.php" class="margin-left-30">
    <input type="radio" class="radioTitle" name="filterradio"> Filter By Title: <br>
    <input type="text" class="titleTextBox form-control" name="Title">
    <input type="radio" class="radioDescription" name="filterradio"> Filter By Description: <br>
    <input type="text" class="descriptionTextBox form-control" name="Description">
    <input type="radio" class="radioAllworks" name="filterradio"> No Filter: (Show all art works): <br><br>
    <button class="btn btn-primary">Filter</button>
  </form>
  <table class="table table-responsive resultsTable">  
      <?php
         foreach ($resultset as $result) {
           echo "<tr>
                 <td class='col-md-1'> 
                  <a href='/Project3/Part03_SingleWork.php?id=".$result['ArtWorkID']."'><img id='searchImage' src='/Project3/images/art/works/square-medium/".$result['ImageFileName'].".jpg'/></a>
                 </td>
                 <td>
                  <a id='titleLink' href='/Project3/Part03_SingleWork.php?id=".$result['ArtWorkID']."'>".$result['Title']."</a><br><br>
                  <p id='description'>".$result['Description']."</p>
                 </td>
                </tr>";
         }
      ?>
  </table>
</div>
</body>
</html>