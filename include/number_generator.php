
<?php
	//echo rand(1,10000000000);
	function rand_number_generator($length)
	{
		$chars="0123456789";
		$charArray=str_split($chars);
		$result="";
		for($i=0;$i<$length;$i++)
		{
			$randItem=array_rand($charArray);
			//echo "".$charArray[$randItem];
			$result .=$charArray[$randItem];
			//echo $result;
		}
	return $result;
	}
?>
<?php
//to generate rendom receipt no;
	$studentid;
	function create()
	{
		//$chars = "abcdefghijkmnopqrstuvwxyz0123456789";
		$chars = "0123456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 4) 
		{
			$num = rand() % 3;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
			return $pass;
	}
		$studentid = create(); 
		//end of code
?>