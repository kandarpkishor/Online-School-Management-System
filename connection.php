<?php
	$conn= mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn, "school");
?>
<html>
<head>
<title>
</title>
<script src="jquery-3.3.1.js"></script>
    <script src="Chart.js"></script>
</head>
</body>
<?php
	$select="SELECT *FROM student WHERE CAST='General' ";
	$query=mysqli_query($conn, $select);
	echo mysqli_error($conn);
	echo "kkjha";
	$row = mysqli_num_rows($query);
	$data_arr= array();
	if($row==0)
	{
		//echo mysqli_error($conn);
		if(mysqli_error($conn))
			{
				$data_arr['0']= 0;
				$data_arr['1']= 0;
				$data_arr['2']= 0;
				$data_arr['3']= 0;
			}
	}
	else
	{
		while($data=mysqli_fetch_array($query, MYSQLI_BOTH))
		{
			$data_arr[] = $data['7'];
		}
	}
	echo '</br>';
	echo 'new data is - ';
	echo $row;
	//echo $data_arr['0'];echo $data_arr['1'];
	//echo $data_arr['2'];echo $data_arr['3'];
?>
	<div style="width:300px; height:300px; border:2px solid blue;background-color:purple;margin:auto;padding:auto;">
		<div style="width:256px; height:256px; border:1px solid blue;border-radius:50%; background-color:blue;margin:auto;padding:auto;">
		<canvas id="mycanvas" width="256" height="256"></canvas>
		<script type="text/javascript">
			$(document).ready(function(){
				var ctx =$("#mycanvas").get(0).getContext("2d");
					var a = '<?php echo $row;?>';
					var data =[
						{
							//value:+a,
							//value:'<?php echo $data_arr['0'];?>',
							value:'<?php echo $row;?>',
							color:"cornflowerblue",
							highlight:"skyblue",
							label:"SC",
						},
						{
							//value:'<?php echo $data_arr['1'];?>',
							value:'<?php echo $row;?>',
							color:"chocolate",
							highlight:"papayawhip",
							label:"ST",
						},
						{
							//value:'<?php echo $data_arr['2'];?>',
							value:'<?php echo $row;?>',
							color:"darkorange",
							highlight:"orange",
							label:"OBC",
						},
						{
							//value:'<?php echo $data_arr['3'];?>',
							value:'<?php echo $row;?>',
							color:"green",
							highlight:"lightgreen",
							label:"GENERAL",
						}
						];
					var piechart= new Chart(ctx).Pie(data);
					//var piechart2= new Chart(ctx).Doughnut(data);
					
					
					});
		</script>
		</div>
		<div style="margin-top:15px; margin-left:20px;">
		<div style="height:15px;width:15px; background-color:cornflowerblue;float:left; margin-left:15px;"></div>
		<div style="float:left; color:white; "> SC&nbsp</div>
		<div style="height:15px;width:15px; background-color:chocolate; float:left;margin-left:15px;"></div>
		<div style="float:left; color:white; "> ST&nbsp</div>
		<div style="height:15px;width:15px; background-color:darkorange; float:left;margin-left:15px;"></div>
		<div style="float:left; color:white; "> OBC&nbsp</div>
		<div style="height:15px;width:15px; background-color:green; float:left; margin-left:15px;"></div>
		<div style="float:left; color:white; "> General&nbsp</div>
		</div>
		
		
	</div>
</body>
</html>