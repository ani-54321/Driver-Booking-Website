<?php
	$var = [
		'Mumbai' => ['x'=>100, 'y'=>200],
		'Pune' => ['x'=>205, 'y'=>100],
		'Delhi' => ['x'=>208, 'y'=>500],
		'Indore' => ['x'=>210, 'y'=>400],
		'Nashik' => ['x'=>300, 'y'=>400],
		'Thane' => ['x'=>100, 'y'=>200],
		'Mirzapur' => ['x'=>205, 'y'=>100],
		'Jalgaon' => ['x'=>208, 'y'=>500],
		'Latur' => ['x'=>210, 'y'=>400],
		'Nagpur' => ['x'=>300, 'y'=>400]
	];
	
	$sum = 0;
	$places = "Nashik,Nagpur,Pune,Indore,";
	$place1 = "";
	
	$c = strlen($places);
	$x = 0;
	$y = 0;
	
	echo $c;
	
	$distArr = [];
	$distInt = 0;
	
	$place2x = 0;
	$place2y = 0;
	
	$flag = 0;
	
	while($c>=0)
	{
		if($places[strlen($places) - $c]==',')
		{
			if($flag==1)
			{
				$distInt = pow((($var[$place1]['x']-$place2x)**2 + ($var[$place1]['y']-$place2y)**2), 0.5);
				$sum += $distInt;
			}
			
			array_push($distArr, $distInt);
			$place2x = $var[$place1]['x'];
			$place2y = $var[$place1]['y'];
			
			$c-=1;
			$place1 = "";
			$flag = 1;
			
		}
		
		$place1 .= $places[strlen($places) - $c];
		$c -= 1;
		
	}
	
	$sum = round($sum, 2);
	
	echo "Total distace is $sum "."<br>"."Total estimated cost would be Rs ". 11.8*$sum . " with GST" . "<br>";
	
	$min_dist = min($distArr);
?>







