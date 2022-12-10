<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/category.css" class="text/css">
	<link href="css/page11.css" rel="stylesheet"/>
	 
	
</head>


<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `plants` WHERE CONCAT(`plants_id`,`plants_name`, `plants_image`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `plants`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "plant");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    
    <body>
        <body>
    <div class="container">

        <div class="header">
   <div class="main_menu">
     <ul>
		<li><a href="4.admin_login.php"><i class="fas fa-user"></i>&nbsp;&nbsp;Login</a></li>

		<li><a href="">Call us now +880-01700-540523</a></li>
	 </ul>
	</div> 
	<div class="main_menu2">

	</div> 
</div>
<div class="header2">
   <div class="header2_left"><h1 style="font-family:tahoma; float:left; width:32%; padding-top:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PLANT HOUSE</h1></div>
   <div class="header2_right">
   <ul>
		<li><a href="7.user_page1.php">HOME</a></li>
		<li><a href="8.user_category.php">CATEGORIES</a></li>
		<li><a href="#about_us">ABOUT US</a></li>
		<li><a href="all_plants.php">ALL PLANTS</a></li>
		<li><a href="5.rating.php">RATE US</a></li>
		<li><a href="11.cart.php">CART</a></li>
		<!--<li><a href="">BLOG</a></li>-->
		
	 </ul>
   </div>
</div>
         <div class="search_box">
        <form action="all_plants.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
           </div> 
            
            <div class="middle1">
      <!-- populate table from mysql database -->
	  
                <?php while($rows = mysqli_fetch_array($search_result)){
				$image= $rows['plants_image']; 
				?>
                
	             <div class="box2">
				<div class="box2-img"><a href="10.user_plants_details.php?p_id=<?php echo $rows['plants_id'];?>"><?php echo "<img src='images/$image' class='img'>";?></div>  <!--plants_id nam e c_id take pass kortsi-->
				<div class="box2-name"><a href="10.user_plants_details.php?p_id=<?php echo $rows['plants_id'];?>"><?php echo $rows['plants_name'];?></div>
				<div class="box2-price"><a href="10.user_plants_details.php?p_id=<?php echo $rows['plants_id'];?>">BDT <?php echo $rows['plants_price'];?></div>
			</div>
	             
                
                <?php }?>
            </table>
        </form>
        </div>
		<!--footer-->
		<a id="about_us">
		 <div class="footer">
            <div class="left">
                <h1>About us</h1>
                <p> We are a supplier, importer, and exporter of plants. Fruit plants, flower plants, spice plants, herbal plants, seeds, and bonsai of the highest quality are delivered throughout Bangladesh by Plant House. We always offer the greatest customer service.</p>
                
            </div>
            <div class="right">
                <img src="images/care1.jpg"/>
                <h1>Plant House</h1>
            </div>
        </div>
		</a>
    </body>
</html>