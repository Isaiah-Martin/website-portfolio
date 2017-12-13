<!Doctype html>
<html>
	<head>
		<link href="style.css" rel="stylesheet" media="screen">
		<title>Intro - Isaiah Martin</title>
	</head>
	<body>
	<div class="top">
	<h1 id = "name">Isaiah Martin</h1>
	</div>
	<!-- nav bar on left of page-->
	<div class="nav-left">
	<ul>
		<li><a href="home.html"><p>Html Lab</p></a></li>
		<li><a href="lab2.php"><p>Php Lab</p></a></li>	
		<li><a href="js.html"><p>JavaScript Lab</p></a></li>	
	</ul>
	</div>

	<!-- If user selects bckg color changer algorithm and parameter is 
	hexadecimal that parameter will become bckg color of content div -->
	<div class="content" style="background-color:<?php echo bckgchanger($_GET['parameter']); ?>">
	<!-- php form to page in which user selects algorithm and inputs parameter-->
		<form action="lab2.php" method="GET">
		<div class="Algorithms">
			<h3>Algorithms</h3>
			<p>Algorithms</p>
				<select name="algorithm">

				<option value="Background Color Changer">Background Color Changer</option>
				<!--changes bckg color-->

				<option value="Perfect Number Check">Perfect Number Check</option>
				<!--perfect # - all factors must sum to number -->

				<option value="Palindrome Finder">Palindrome Finder</option>
				<!--outputs all palindromes in string-->

				<option value="Int Duplicate Remover">Duplicate Remover</option>
				<!--removes all dublicates--> 
				
			</select>
			<p>Parameter</p>
			<input type="text" name="parameter" style="width:180px;"placeholder="<?php echo placeset();?>"></input>
			<input type="submit">
		</form>
	</div>
	<!--Output of function to corresponding algorithm -->
		<div class="Output">
				<h3 style="font-family:Arial;">Output:</h3>
				<p><?php echo $_GET["algorithm"];?></p>
		</div>
		<?php 
			$selection = $_GET["algorithm"];
			if ($selection == "Perfect Number Check")
			{
				echo "A perfect number is when all of the factors of that number equal it. For example: 1 + 2 + 3 = 6, so 6 is a perfect number.<br><br>";
				if(perfectnumbercheck($_GET["parameter"]) === True){
					print($_GET["parameter"]);
					print( " is a perfect number.");
				}
				else{
					print($_GET["parameter"]);
					print(" is not a perfect number.");
				}
			}
			else if($selection == "Palindrome Finder")
			{
				echo "Returns all of the palindromes in the input<br><br>";
				palindromefinder($_GET["parameter"]);
			}
			else if($selection == "Int Duplicate Remover")
			{
				duplicateremover($_GET["parameter"]);
			}
			else if($selection == "Background Color Changer")
			{
				bckgchanger($_GET["parameter"]);
				echo $_GET["parameter"];
			}
			else
			{
				print("Please select an algorithm.");
				return "Select algorithm";
	 		}
	 	
	 		function placeset(){
	 		$selection = $_GET["algorithm"];
	 		if ($selection == "Perfect Number Check")
			{
				$place = "ex: 6";
				return $place;
			}
			else if($selection == "Palindrome Finder")
			{
				$place = "ex: Isaiah Martin";
				return $place;
			}
			else if($selection == "Int Duplicate Remover")
			{
				$place = "ex: 1 2 1 3 4";
				return $place;
			}
			else if($selection == "Background Color Changer")
			{
				$place = "ex: #eeeeee or gray";
				return $place;
			}
			else
			{
				return "Select algorithm";
	 		}

	 		}
	 	#indicates whether input is perfect number or not
			function perfectnumbercheck($number)
			{  
				$sum = 0;
				$denominator = 2;
				$quotient = 0;
				$middle = $number/2;

				$factors = array(1);
				for ($denominator; $denominator < $middle; $denominator++) 
				{ 
					if ($number % $denominator === 0 && $number != ($number/$denominator)) {
						$quotient = $number/$denominator;

						if (! in_array($denominator, $factors)) 
							$factors[] = $denominator;
						if (! in_array($quotient, $factors))
							$factors[] = $quotient;
					}
				}
				for($x=0;$x < count($factors); $x+=1)
				{
					$sum+=$factors[$x];
				}
				if ($sum == $number)
					return true;
				return false;
				}
		#checks if input is palindrome
			function check_pal($pal)
			{
				$check = 0;
				$end_check = strlen($pal)-1;
				if (strlen($pal) % 2 == 0)
				{
					while ($check < $end_check)
					{
						if ($pal[$check] != $pal[$end_check])
							return false;
						$check++;
						$end_check--;
					}
					return true;
				}
				else
				{
					while ($check != $end_check)
					{
						if ($pal[$check] != $pal[$end_check])
							return false;
						$check++;
						$end_check--;
					}
					return true;
				}
			}
		#finds all palindromes in inputed string
			function palindromefinder($str)
			{
				for ($y=0;$y < strlen($str)-1; $y++)
				{
					$x=2;
					while ($x <= strlen($str))
					{
						$palindrome_iso = substr($str,$y,$x);
						if (check_pal($palindrome_iso))
						{
							print ($palindrome_iso);
							print (" ");
						}
						$x++;
					}
				}
			}
		#removes all duplicates in list
			function duplicateremover($ints)
			{
				$intlist = explode(" ", $ints,12);
				$intlist = array_unique($intlist);
				//var_dump($intlist);
				$x = 0;
				$scoopstr = "";
				while ($x <= count($intlist)+1)
				{
					echo $intlist[$x];
					$x++;
				}
				/* Logic #1: make a hashtable to check for collison
				Logic #2: if elements in front are equal to element behind delete them
				$x = 0;
				while ($x < count($intlist))
				{
					for($y=1;$y < count(array_splice($intlist, $x, -1)); $y+=1)
					{
						if($intlist[$x] === $intlist[$y])
						{
							unset($intlist[$y]);
						}
					}
					$x++;
				}
				for ($d=0;$d <  count($intlist); $d+=1)
				{
						print $intlist[$d];
				}*/
			}
			#returns input if hexadecimal; green if not
			function bckgchanger($color)
			{
				return $color;
			}
			?>



	</div>
	

	</body>
</html>