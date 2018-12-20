<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Superballnews - Ultimele stiri din sport</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/animsition/css/animsition.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/avatar-1.png">
  </head>
  <body>
    <div class="animsition">
      <header class="header">
        <!-- Main Navbar-->
        <nav class="navbar navbar-expand-lg">
          <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
              <div class="close-btn"><i class="icon-close"></i></div>
              <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                  <form action="#">
                    <div class="form-group">
                      <input type="search" name="search" id="search" placeholder="What are you looking for?">
                      <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
              <!-- Navbar Brand --><a href="index.php" class="navbar-brand animsition-link"><img src="img/logo3.png" alt="..." class="img-fluid"></a>
              <!-- Toggle Button-->
              <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link active animsition-link">Articole</a>
                </li>
                <li class="nav-item"><a href="admin/index.php" class="nav-link animsition-link">Admin Panel</a>
                </li>
                <li class="nav-item"><a href="admin/register.php" class="nav-link animsition-link">Inregistrare</a>
                </li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="container">
        <div class="row">
          <!-- Latest Posts -->
          <main class="posts-listing col-lg-8"> 
            <div class="container">
              <div class="row">
                <!-- post -->
                <!-- <div class="post col-xl-6">
                  <div class="post-thumbnail"><a href="post.html" class="animsition-link"><img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"></a></div>
                  <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                      <div class="date meta-last">20 May | 2016</div>
                      <div class="category"><a href="#">Business</a></div>
                    </div><a href="post.html" class="animsition-link">
                      <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                        <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                        <div class="title"><span>John Doe</span></div></a>
                      <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                      <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                    </footer>
                  </div>
                </div> -->
                
<?php
// core configuration
include_once "admin/config/core2.php";
 
echo "<div class='col-md-12'>";
 
 
echo "</div>";
// include database connection
include 'admin/config/database1.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
 
 
// select all data
$query = "SELECT id, name, description, price, image, created FROM products ORDER BY id DESC";
$stmt = $con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
 
//check if more than 0 record found
if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['firstname'] to
            // just $firstname only
            extract($row);
             
            // creating new table row per record
            echo "<div class='post col-xl-6'>";
				echo "<div class='post-thumbnail'><a href='post.php?id={$id}' class='animsition-link'><img src='admin/uploads/{$image}' class='img-fluid'></a></div>";
				echo "<div class='post-details'>";
					echo "<div class='post-meta d-flex justify-content-between'>";
						echo "<div class='category'><a href='#'>{$price}</a></div>";
						echo "<div class='date meta-last'>{$created}</div>";
					echo "</div>";
					echo "<a href='post.php?id={$id}' class='animsition-link'><h3 class='h4'>{$name}</h3></a>";
                echo "</div>";
            echo "</div>";
        }  
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
                <!-- post             -->
              </div>
              <!-- Pagination -->
              
            </div>
          </main>
          <aside class="col-lg-4">
            <!-- Widget [Search Bar Widget]-->
            <!-- <div class="widget search">
              <header>
                <h3 class="h6">Search the blog</h3>
              </header>
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="search" placeholder="What are you looking for?">
                  <button type="submit" class="submit"><i class="icon-search"></i></button>
                </div>
              </form>
            </div>
            <!-- Widget [Latest Posts Widget]        -->
            <div class="widget latest-posts">
              <header>
                <h3 class="h6">Ultimele stiri</h3>
              </header>
              <div class="blog-posts">
              <?php
// core configuration
include_once "admin/config/core2.php";
 
// include database connection
include 'admin/config/database1.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
 
 
// select all data
$query = "SELECT id, name, description, price, image FROM products ORDER BY id DESC limit 3";
$stmt = $con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
 
//check if more than 0 record found
if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['firstname'] to
            // just $firstname only
            extract($row);
             
            // creating new table row per record
            echo "<a href='post.php?id={$id}'>";
				echo "<div class='item d-flex align-items-center'>";
					echo "<div class='image'><a href='post.php?id={$id}' class='animsition-link'><img src='admin/uploads/{$image}' class='img-fluid'></a></div>";
						echo "<a href='post.php?id={$id}' class='animsition-link'>";
							echo "<div class='title'><strong>{$name}</strong>";
								echo "<div class='d-flex align-items-center'>";
                       				echo "<div class='views'><i class='icon-clock'></i> {$created}</div>";
                        			echo "<div class='comments'><i class='icon-comment'></i></div>";
                      			echo "</div>";
							echo "</div>";
						echo "</a>";
				echo "</div>";
            echo "</a>";
        }  
}
				  ?>
                  </div>
            </div>
            <!-- Widget [Categories Widget]-->
            <div class="widget categories">
              <header>
                <h3 class="h6">Categorii</h3>
              </header>
              <div class="item d-flex justify-content-between"><a href="category-fotbal.php">Fotbal</a></div>
              <div class="item d-flex justify-content-between"><a href="category-baschet.php">Baschet</a></div>
              <div class="item d-flex justify-content-between"><a href="category-tenis.php">Tenis</a></div>
            </div>
            <!-- Widget [Tags Cloud Widget]-->
            <!-- <div class="widget tags">       
              <header>
                <h3 class="h6">Tags</h3>
              </header>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
                <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
                <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
                <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
                <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
              </ul>
            </div> -->
          </aside>
        </div>
      </div>
      <!-- Page Footer-->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="logo">
                <h6 class="text-white">Superballnews</h6>
              </div>
              <div class="contact-details" id="contact">
                <p>Bucuresti, Romania</p>
                <p>Telefon: 021 200 2000</p>
                <p>Email: <a href="mailto:office@superballnews.com">office@superballnews.com</a></p>
                <ul class="social-menu">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="menus d-flex">
                <ul class="list-unstyled">
                  <li> <a href="index.php">Articole</a></li>
                  <li> <a href="admin/index.php">Admin Panel</a></li>
                  <li> <a href="admin/register.php">Inregistrare</a></li>
                </ul>
                <ul class="list-unstyled">
                  <li> <a href="category-fotbal.php">Fotbal</a></li>
                  <li> <a href="category-baschet.php">Baschet</a></li>
                  <li> <a href="category-tenis.php">Tenis</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="latest-posts">
              <?php
			// core configuration
			include_once "admin/config/core2.php";
			 
			// include database connection
			include 'admin/config/database1.php';
			
			$action = isset($_GET['action']) ? $_GET['action'] : "";
			 
			 
			// select all data
			$query = "SELECT id, name, description, price, image, created FROM products ORDER BY id DESC limit 3";
			$stmt = $con->prepare($query);
			$stmt->execute();
			 
			// this is how to get number of rows returned
			$num = $stmt->rowCount();
			 
			 
			//check if more than 0 record found
			if($num>0){
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						// extract row
						// this will make $row['firstname'] to
						// just $firstname only
						extract($row);
						 
						// creating new table row per record
						echo "<div class='col-md-12'>";
						echo "<a href='post.php?id={$id}'>";
							echo "<div class='post d-flex align-items-center'>";
								echo "<div class='image'><img src='admin/uploads/{$image}' class='img-fluid'></div>";
								echo "<div class='title'><strong>{$name}</strong><span class='date last-meta'>{$created}</span></div>";
							echo "</div>";
						echo "</a>";
						echo "</div>";
        }  
}
				  ?>
              
              </div>
            </div>
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p>&copy; 2018. All rights reserved. Superballnews.</p>
              </div>
              <div class="col-md-6 text-right">
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="admin/libs/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>