<?php
require 'product.php';
require 'category.php';
$category = new category();
$category->id=$_GET['id'];

if($category->list())
{
    $resultcat = $category->list();
}
else
{
    echo "no category";
}
// ================list all================
$categories = new category();
if($categories->listall())
{
    $result = $categories->listall();
}
else
{
    echo "no category";
}

// =============update================
if(isset($_POST['submit']))
{
    $categoryupdate = new category();
    $categoryupdate->subCategory=$_POST['sub_id'];
    $categoryupdate->title=$_POST['cName'];
     $categoryupdate->id=$_GET['id'];

if($categoryupdate->update())
{
    $result = $categoryupdate->update();
    header("Location:categoryList.php");
}
else
{
    echo "no update product";
}

}


?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

 <?php require 'header.php';?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Table with product </h4>
                                <p class="category">can update this product</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="POST">
                               
                                        
		                      <?php 
		
			                         while ($row = $resultcat->fetch_array()) {
			
                                     echo "
                                     <div class='row'>
                                       
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label>category name</label>
                                                <input type='text' class='form-control'  id='name' name='cName' value=".$row['title'].">
                                            </div>
                                        </div>
                                        
		                              "; }

		
		
		                                      ?>
                                             <div class='col-md-6'>
                                            <div class='form-group'>
                                               <label>sub category id</label>
                                                <select id='usersList' class='selectpicker' name="sub_id">
                                                    <option value='choose cat_id'>choose subcategory_id
                                                    </option>

                                                         <?php 
                                                             while ($row = $result->fetch_array()) {
                                                              echo "
                                                             <option name='cat_id'>
                                                                ".$row['id'] ."</option>" ;}
        
                                                             ?>
                                                           
                                                       
                                                </select>
                                            </div>
                                        </div>

        
                                        
                                          <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label for="userfile">update:</label>
                                                
                                        <input type="submit" name="submit" value="Update"/>
                                            </div>
                                        </div>
            
                                        </form>
                                          </div>
                                         <!--  =====================upload image======== -->



                                          <input type="hidden" name="MAX_FILE_SIZE"
                                          value="1000000" />



          
      

                              
 
                            </div>
                        </div>
                    </div>
                    




        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
