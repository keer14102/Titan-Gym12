﻿
<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Titan Gym| View Plan</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">

</head>
     <body class="page-body  page-fade" onload="initializeMember()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="main.php">
					<img src="../../images/logo.png" alt="" width="192" height="80" />
				</a>
			</div>
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>						
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Membership Plan</h3>

		<hr />

		<table class="table table-bordered datatable" id="table-1">

			<thead>
				<tr>
					<th>S.No</th>
					<th>Membership ID</th>
					<th>Plan name</th>
					<th>Details</th>
					<th>Days</th>
					<th>Rate</th>
					<th></th>
				</tr>
			</thead>		
				<tbody>
					<?php


					$query  = "select * from plan ORDER BY id DESC";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					        $msgid = $row['pid'];
					        
					        
					        echo "<tr><td>" . $sno . "</td>";
					        echo "<td>" . $row['pid'] . "</td>";
					        echo "<td>" . $row['planName'] . "</td>";
					        echo "<td>" . $row['description'] . "</td>";
					        echo "<td>" . $row['validity'] . "</td>";
					        echo "<td>" . $row['amount'] . "</td>";
					        
					        $sno++;
					        
					        echo "<td><form action='edit_plan.php' method='post'><input type='hidden' name='name' value='" . $msgid . "'/><input type='submit' value='Edit Plan ' class='btn btn-info'/></form><form action='del_plan.php' method='post' onSubmit='return ConfirmDelete();'><input type='hidden' name='name' value='" . $msgid . "'/><input type='submit' value='Delete Plan' class='btn btn-danger'/></form></td></tr>";
					        $msgid = 0;
					    }
					    
					}

					?>																
				</tbody>
		</table>


<?php include('footer.php'); ?>
    	</div>

    </body>
</html>



				