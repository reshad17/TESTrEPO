<!DOCTYPE html>
<head>

    
<title>
    <?php 

    if ($page == "welcome") {
         echo "98-2000 Uttara Batch";

        }elseif ($page == "add_fund" || $page == "success") {
             echo "98-2000 Uttara Batch (Add Fund)";
        }elseif ($page == "event_confirm_pay") {
             echo "98-2000 Uttara Batch";
        }elseif ($page == "view_info") {
                 echo "98-2000 Uttara Batch (View Information)";
        }elseif ($page == "add_info") {
                 echo "98-2000 Uttara Batch (Add Information)";
        }elseif ($page == "suc_pay_his") {
                 echo "98-2000 Uttara Batch (Payment History)";
        }elseif ($page == "change_password") {
                 echo "98-2000 Uttara Batch (Change Password)";
        }elseif ($page == "edit_info") {
                 echo "98-2000 Uttara Batch (Edit Personal information)";
        }else{
        echo "98-2000 Uttara Batch";
    }


    ?>
    


</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->

<link rel="stylesheet" href="css/monthly.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
<!-- //calendar -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- //font-awesome icons -->
<!-- new start -->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<!-- new end -->
<!-- new scripts start -->

<!-- new script end -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="welcome.php" class="logo">

      <p id="test4" style="font-size: 14px";>  welcome <span style="color:yellow;"><?php echo $_SESSION['username'];?></span></p>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
   <h3><p id="test3" style="text-align: center">Welcome to 98-2000 Uttara Batch</p></h3>
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                
                <span class="username"> <i class="far fa-user"> <?php echo $_SESSION['username'];?></i></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
</section>