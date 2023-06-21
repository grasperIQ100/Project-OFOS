<?php
session_start();
if(isset($_SESSION['uid']))
{
	?>
<?php include("frames/userheader.php"); ?>
<html>
<head>
<title>Welcome</title>
<script type="text/javascript" src="assets/js/angular.min.js"></script>

</head>

<body>
<?php include("data_request_handeller/viewmenu.php"); ?>
    <div class="row" ng-app="myApp" ng-controller="ctrl">
	<div class="col-md-1"></div>
	<div class="col-xs-12 col-md-3"  >
	<b><h2>T O D A Y'S &nbsp; M E N U</h2></b>
	<h3>Select Thali:</h3>
     <select  data-ng-model="selectedThali" ng-options="t.thali+t.price for t in thaliName" data-ng-init=" selectedThali = thaliName[0]"  ng-change="menuByThali()" class="form-control">
          <option value=''>Select Category</option>
          
          
           <!-- <option ng-repeat="t.thali in thaliName" value="{{t.id}}" ng-selected="thaliName.thali == t.thali">{{t.thali}}</option>-->
          
          
     </select>
     <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Ingredients</th>
                
            </tr>
        </thead>
    	  <tbody>
            <tr ng-repeat="m in menuItem">
                <td>{{m.name}}</td>
                 <td>{{m.qty}}</td>
                <td>{{m.ingre}}</td>
             </tr>
        </tbody>
        </table>
	</div>
	
    <div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-4" style="background-color: rgba(0,0,0,0.30); padding-bottom: 6%; border-radius: 5%;">
		<h2>M E N U</h2>
		<form action="data_request_handeller/show_menu.php" method="post"  >
			<input class="form-control" name="menudate" type="date" required/>
			<br>
			<button type="submit" class="form-control" >View Menu</button>
		</form>
	</div>
</div>
</div><br>
<div class="row">
    <div class="col-xs-12 col-md-7"></div>
	<div class="col-xs-12 col-md-4" style="background-color: rgba(0,0,0,0.30); padding-bottom: 6%; border-radius: 5%;">
		<h2>OFFERS</h2>
		<?php 
		$offer=mysql_query("SELECT des FROM disp_offer where is_active='0'");
		while($getoffer=mysql_fetch_array($offer))
		{
		    echo"<h3><marquee>".$getoffer['des']."</marquee></h3><br>";
		}
		?>
	</div>
</div>
	
	
</body>
<script>
    var app=angular.module('myApp',[]);
    app.controller('ctrl',function($scope,$http)
    {
        $scope.getThali=function()
        {
            $http.get("https://merikitchen.statsking.co.in/getThali.php")
            .success(function(data)
            {   

                console.log(data);
                $scope.thaliName=data;
               
            }) 
        }
         $scope.getThali();

         $scope.menuByThali=function()
         {
            $tid=$scope.selectedThali;
            console.log($tid);
            $scope.menuItem=[];
            $http.get("https://merikitchen.statsking.co.in/getMenuByThali.php?tid="+$tid.id)
            .then(function(sucess)
            {
               $scope.menuItem=sucess.data;
               console.log($scope.menuItem);
               debugger;
            })
            
            /*.success(function(data)
{
    	$scope.menuItem=data;
	console.log(data);
                
	//alert(data);
               
 	debugger;
          
  })*/
         }
    });
</script>
	
<?php include("frames/userfooter.php"); ?>
</html>
<?php
}
else
{
	header("location:index.php");
}
?>