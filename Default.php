<?php include 'header.php';?>
<div class="jumbotron">
    <div class="margin-left-50">
        <h1>Welcome to <?php echo $project ?></h1>
        <p>This is the third assignment for <?php echo $name ?> for CSE 5335</p>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <h3><span class="glyphicon glyphicon-info-sign"></span> About us</h3>
            <p>What this is all about and other stuff</p>
            <a href="about.php"><button class="btn btn-default"><span class="glyphicon glyphicon-link"></span> Visit Page</button></a></a>
        </div>
        <div class="col-md-2">
            <h3><span class="glyphicon glyphicon-th-list"></span> Artist List</h3>
            <p>Display list of artist names as links</p>
            <a href="Part01_ArtistsDataList.php"><button class="btn btn-default"><span class="glyphicon glyphicon-link"></span> Visit Page</button></a>
        </div>
        <div class="col-md-2">
            <h3><span class="glyphicon glyphicon-user"></span> Single Artist</h3>
            <p>Displays information for single artist</p>
            <a href="Part02_SingleArtist.php?id=19"><button class="btn btn-default"><span class="glyphicon glyphicon-link"></span> Visit Page</button></a>
        </div>
        <div class="col-md-2">
            <h3><span class="glyphicon glyphicon-picture"></span> Single Work</h3>
            <p>Displays information for single work</p>
            <a href="Part03_SingleWork.php?id=394"><button class="btn btn-default"><span class="glyphicon glyphicon-link"></span> Visit Page</button></a>
        </div>
        <div class="col-md-2">
            <h3><span class="glyphicon glyphicon-search"></span> Advanced Search</h3>
            <p>Performs search on ArtWorks table</p>
            <a href="Part04_Search.php"><button class="btn btn-default"><span class="glyphicon glyphicon-link"></span> Visit Page</button></a>
        </div>
    </div>
</div>
</body>
</html>