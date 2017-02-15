<?php
require 'product.php';
require 'category.php';
$category = new category();
if($category->listall())
{
    $resultcat = $category->listall();
}
else
{
    echo "no category";
}
$product = new product();
$product->id=$_GET['id'];
if($product->list())
{
	$result = $product->list();
}
else
{
	echo "no product";
}
// =============update================
if(isset($_POST['submit']))
{
    if ($_FILES['userfile']['error'] > 0)
{
// die('Problem: ');
switch ($_FILES['userfile']['error'])
{
    case 1: echo 'File exceeded upload_max_filesize';
    break;
    case 2: echo 'File exceeded max_file_size';
    break;
    case 3: echo 'File only partially uploaded';
    break;
    case 4: echo 'No file uploaded';
    break;
    case 6: echo 'Cannot upload file: No temp directory specified';
    break;
    case 7: echo 'Upload failed: Cannot write to disk';
    break;
}
exit;
}//if
// put the file where we’d like it
// $upfile = $_SERVER['document_root'].'/obaju/image/'.$_FILES['userfile']['name'] ;
   // / var_dump($_FILES['userfile']);
   //  exit();
$upfile = "./img/".$_FILES['userfile']['name'] ;

// Does the file have the right MIME type?
if ($_FILES['userfile']['type'] != 'image/jpeg')
{
echo 'Problem: file is not plain text';
exit;
}
if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
    if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
    {
        echo 'Problem: Could not move file to destination directory';
        exit; 
    }
}
else
    {
        echo 'Problem: Possible file upload attack. Filename: ';
        echo $_FILES['userfile']['name'];
        exit;
    }
echo 'File uploaded successfu';
echo 'File uploaded successfully<br><br>';

    // =====================================================
    $productupdate = new product();
    $productupdate->id=$_GET['id'];
    $productupdate->pName=$_POST['pName'];
    $productupdate->price=$_POST['price'];
    $productupdate->image=$_FILES['userfile']['name'];

if($productupdate->update())
{
    $result = $productupdate->update();
    header("Location:table.php");
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
                                <form action="#" method="post" enctype="multipart/form-data">
                               
                                        
		<?php 
		
			while ($row = $result->fetch_array()) {
			
                echo "
                <div class='row'>
                                       
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label>product name</label>
                                                <input type='text' class='form-control'  id='name' name='pName' value=".$row['pName'].">
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>price</label>
                                                <input type='text' class='form-control'  name='price' value=".$row['price'].">
                                                


                                            </div>
                                        </div>

                                        
                                  

                                    
			
			
		              "; }

		
		
		?>
        <div class='col-md-6'>
                                            <div class='form-group'>
                                               <label>category id</label>
                                                <select id='usersList' class='selectpicker' >
                                                    <option value='choose cat_id'>choose cat_id
                                                    </option>

        <?php 
        while ($row = $resultcat->fetch_array()) {
            echo "
                                                             <option name='cat_id'>
                                                                ".$row['id'] ."</option>" ;}
        
        ?>
                                                           
                                                       
                                                </select>
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <!-- <label for="userfile">Upload image:</label> -->
                                                <input type="file" name="userfile"
                                                    id="userfile"/>
                                            </div>
                                        </div>
                                          <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label for="update">update:</label>
                                                
                                        <input type="submit" name="submit" value="Update"/>
                                            </div>
                                        </div>
            
                                        </form>
                                          </div>
                                         <!--  =====================upload image======== -->



                                          <input type="hidden" name="MAX_FILE_SIZE"
                                          value="1000000" />

<?php


?>

          
      

                              
 
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

</body>

  

</html>
