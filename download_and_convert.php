<?php
// two-dimensional array for routes and names
$routes = array
  (
  array(0,3246747,"1A_andata"),
  array(1,3255871,"1A_ritorno"),
  array(2,3246772,"1B_andata"),
  array(3,3247024,"1B_ritorno"),
  );

$base_url = 'http://osmrm.openstreetmap.de/gpx.jsp?relation=';
$base_outputfile = ".gpx";
$convert = "../togeojson/togeojson ";
$path = "routes/";
$gpx = "gpx/";
$geojson = "geojson/";

$i = 0;
while ($i < sizeof($routes)) {
//	echo "\n";
//	echo $routes[$i][0];
//	echo "\n";
	$rel_id = $routes[$i][1];
//	echo "\n";
	$name = $routes[$i][2];
//	echo "\n";
	$cmd = "wget -q \"$base_url$rel_id\" -O $path$gpx$name$base_outputfile";
	echo $cmd . "\n";
	exec($cmd);
	$cmd2 = $convert . $path . $gpx . $name . $base_outputfile . " > " . $path . $geojson . $name . ".geojson";
	echo $cmd2 . "\n";
	exec($cmd2);
	$i++;
}
?>
