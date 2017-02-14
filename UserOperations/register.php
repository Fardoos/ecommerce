<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <script src="jquery-3.1.1.min.js"></script>
    <!--Ajax Register validation -->
    <script>
                
        /*$(function(){
            
            $("#LogForm").on("submit",function(e){
                
                e.preventDefault();
                $.ajax({
                    url:"select_user.php",
                    method:"post",
                    data:$("#LogForm").serialize(),
                    dataType:"json",
                    success:function(data){
                    

                    },
                    error: function(error){

                        console.log("error");
                         if(data == false){
                            $("#lblNameLog").text("Wrong Entered data !!");
                            $("#emailLog").val(" ");
                            $("#passwordLog").val(" ");
                            $("#emailLog").focus();
                        }
                    }
                });// end ajax
            });//end btn click
        });*/
    </script>


    <title>
        E-Commerce Register
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <?php require "header.php" ?>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                       <!-- <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>-->

                        <hr>
                        <!--customer-orders.html-->
                        <form action="insert_user.php" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label id="lblName" name="lblName"></label>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </div>
                            <!-- re enter-->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="pass" class="form-control" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="job">Job</label>
                                <input type="text" name="job" class="form-control" id="job">
                            </div>
                                <!--value-->
                            <div class="form-group">
                                <label for="Birthday">Birthday</label>
                                <input type="date" name="birthday" class="form-control" id="Birthday" >
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text"  name="address"class="form-control" id="address" >
                            </div>
                            <div class="form-group">
                                <label for="credit">Credit Limit</label>
                                <input type="number" name="credit" class="form-control" id="credit" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                            mi vitae est. Mauris placerat eleifend leo.</p>

                        <hr>
                        <!--customer-orders.html-->
                        <form action="select_user.php" method="post"  enctype="application/x-www-form-urlencoded" id="LogForm">
                           <div class="form-group">
                                <label id="lblNameLog" name="lblName"></label>
                                
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="emailLog">
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="pass" class="form-control" id="passwordLog">
                            </div>
                            <div class="text-center">
                                <button type="submit" id="btnSubmitLog" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <?php require "footer.php" ?>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>



</body>

</html>
