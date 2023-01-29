<!doctype html>
<?php


$verz="1.0";
$comPort = "/dev/ttyUSB0"; /*change to correct com port */

if (isset($_POST["rcmd"])) {
$rcmd = $_POST["rcmd"];
switch ($rcmd) {
	case Clean:
		$fp =fopen($comPort, "w");
		fwrite($fp, 1); /* this is the number that it will write */
		sleep(2);
		fclose($fp);
	break;
	case Forward:
		$fp =fopen($comPort, "w");
		fwrite($fp, 2); /* this is the number that it will write */
		sleep(2);
		fclose($fp);
	break;
	case Right:
        	$fp =fopen($comPort, "w");
		fwrite($fp, 3); /* this is the number that it will write */
		sleep(2);
		fclose($fp);
	break;
	case Left:
	        $fp =fopen($comPort, "w");
		fwrite($fp, 4); /* this is the number that it will write */
		sleep(2);
		fclose($fp);
	break;
	case Back:
		$fp =fopen($comPort, "w");
		fwrite($fp, 5); /* this is the number that it will write */
		sleep(2);
		fclose($fp);
	break;
    case Home:
        $fp =fopen($comPort, "w");
        fwrite($fp, 7); /* this is the number that it will write */
        sleep(2);
        fclose($fp);
    break;
    case WallClean:
        $fp =fopen($comPort, "w");
        fwrite($fp, 8); /* this is the number that it will write */
        sleep(2);
        fclose($fp);
    break;
    case SpotClean:
        $fp =fopen($comPort, "w");
        fwrite($fp, 6); /* this is the number that it will write */
        sleep(2);
        fclose($fp);
    break;
    case ViewLeft:
        $fp =fopen($comPort, "w");
        fwrite($fp,"q"); /* this is the number that it will write */
        sleep(2);
        fclose($fp);
    break;
	case KeepForward:
        $fp =fopen($comPort, "w");
        fwrite($fp, "w"); /* this is the number that it will write */
        sleep(2);
        fclose($fp);
    break;
	case ViewRight:
            $fp =fopen($comPort, "w");
            fwrite($fp, "e"); /* this is the number that it will write */
            sleep(2);
            fclose($fp);
    break;
	default:
		die('Crap, something went wrong. The page just puked.');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../dist/webcam-easy.min.js"></script>
</head>
<body>
	<div id="big_wrapper">
		<header id="top_header">
			<h1> Development of Remotely Control for Service Robot Based on Internet of Things <h1>
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
					<input class="button_group1" type="submit" value="Home" name="rcmd">
					<input class="button_group1" type="submit" value="WallClean" name="rcmd"><br/>
					<input class="button_group2" type="submit" value="ViewLeft" name="rcmd">
					<input class="button_group2" type="submit" value="KeepForward" name="rcmd">
					<input class="button_group2" type="submit" value="ViewRight" name="rcmd"><br/>
				</div>
			</form>
			<div id="camera">
				<main id="webcam-app">

					<div class="md-modal md-effect-12">
						<div id="app-panel" class="app-panel md-content row p-0 m-0">
							<div id="webcam-container" class="webcam-container col-12 d-none p-0 m-0">
								<video id="webcam" autoplay playsinline width="640" height="480"></video>
								<canvas id="canvas" class="d-none"></canvas>
								<div class="flash"></div>
								<audio id="snapSound" src="audio/snap.wav" preload="auto"></audio>
							</div>
							<div id="cameraControls" class="cameraControls">
								<a href="#" id="exit-app" title="Exit App" class="d-none"><i class="material-icons">exit_to_app</i></a>

								<a href="#" id="download-photo" download="selfie.png" target="_blank" title="Save Photo" class="d-none"><i class="material-icons">file_download</i></a>
								<a href="#" id="resume-camera" title="Resume Camera" class="d-none"><i class="material-icons">camera_front</i></a>
							</div>
						</div>
					</div>
					<div class="md-overlay"></div>
				</main>
			
	
			
			</div>
		</div>	

<footer id="bottom_footer">
	<h3> Copyright Smart-X <h3>
</footer>
<script src='js/app.js'></script>
		
	
</body>
</html>
