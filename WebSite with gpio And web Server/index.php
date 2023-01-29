<!doctype html>
<?php

$commandonclean = escapeshellcmd('python3 onclean.py');
$commandoffclean = escapeshellcmd('python3 offclean.py');
$commandwallclean = escapeshellcmd('python3 wallclean.py');

$commandforward = escapeshellcmd('python3 forward.py');
$commandright = escapeshellcmd('python3 right.py');
$commandleft = escapeshellcmd('python3 left.py');
$commandback = escapeshellcmd('python3 back.py');
$commandkeepforward = escapeshellcmd('python3 keepforward.py');


$commandhome = escapeshellcmd('python3 home.py');

$commandviewleft = escapeshellcmd('python3 viewleft.py');
$commandviewright = escapeshellcmd('python3 viewright.py');

$commandalloff = escapeshellcmd('python3 alloff.py');

if (isset($_POST["rcmd"])) {
$rcmd = $_POST["rcmd"];
switch ($rcmd) {
	case Clean:
		$result=shell_exec($commandonclean);
		
		sleep(2);
		
	break;
	case Forward:
		$result=shell_exec($commandforward);
		
		sleep(2);
		
	break;
	case Right:
		$result=shell_exec($commandright);
		
		sleep(2);
       
	break;
	case Left:
		$result=shell_exec($commandleft);
		
		sleep(2);
	      
	break;
	case Back:
		$result=shell_exec($commandback);
		
		sleep(2);
		
	break;
    case Home:
        $result=shell_exec($commandhome);
		
		sleep(2);
    break;
    case sterilizer:
		$result=shell_exec($commandwallclean);
		
		sleep(2);
        
    break;
    case SpotClean:
		$result=shell_exec($commandoffclean);
		
		sleep(2);
        
    break;
    case ViewLeft:
		$result=shell_exec($commandviewleft);
		
		sleep(2);
        
    break;
	case KeepForward:
		$result=shell_exec($commandkeepforward);
		
		sleep(2);
        
    break;
	case ViewRight:
		$result=shell_exec($commandviewright);
		
		sleep(2);

    break;

	case StopAll:
		$result=shell_exec($commandalloff);
		
		sleep(2);
		      
    break;

	default:
		die('Crap, something went wrong. The page just puked.');
		$result=shell_exec($commandalloff);
		
		sleep(2);
}
}
?>
<html lang="en">
<head>

    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta charset="utf-8" />
	<title>IoT Service Robot</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" href="index.css">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='style/webcam-demo.css'>

</head>
<body>
	<div id="big_wrapper">
		<header id="top_header">
			<h1> Autonamous vacuum with monitering system  <h1>
		</header>
		<div id="content_wrapper">
			<form method="post" action="index.php">
				<div id="button_input">
					<br/>
					<input class="dummy" type="submit" value="Dummy" name="rcmd">
					<input class="button_group0" type="submit" value="Forward" name="rcmd">
					<input class="dummy" type="submit" value="Dummy" name="rcmd"><br/>
					<input class="button_group0" type="submit" value="Left" name="rcmd">
					<input class="button" type="submit" value="Clean" name="rcmd">
					<input class="button_group0" type="submit" value="Right" name="rcmd"><br/>
					<input class="dummy" type="submit" value="Dummy" name="rcmd">
					<input class="button_group0" type="submit" value="Back" name="rcmd">
					<input class="dummy" type="submit" value="Dummy" name="rcmd"><br/></br></br>
					<input class="button_group1" type="submit" value="SpotClean" name="rcmd">
					<input class="button_group1" type="submit" value="StopAll" name="rcmd">
					<input class="button_group1" type="submit" value="sterilizer" name="rcmd"><br/>
					<input class="button_group2" type="submit" value="ViewLeft" name="rcmd">
					<input class="button_group2" type="submit" value="KeepForward" name="rcmd">
					<input class="button_group2" type="submit" value="ViewRight" name="rcmd"><br/>
				</div>
			</form>
			
				<div id="camera">
				<iframe src="http://192.168.137.34:9000/index.html" width="100%" height="4000" frameborder="0" scrolling="yes"></iframe>
				
				</div>
			
		</div>

    
			
				
			
			
	</div>	
	
<footer id="bottom_footer">
	<h3> Copyright Smart-X <h3>
</footer>

		
	
</body>
</html>
