<?php
// two-dimensional array for routes and names
$routes = array
  (
  array(0, 3246747,"1A_-_MONTEMAINO__SAN_GENESIO_-_SAN_MARTINO_PIEMONTE",""),
  array(1, 3255871,"1A_-_STAZIONE_-_SAN_MARTINO_PIEMONTE",""),
  array(2, 3246772,"1B_-_MONTEMAINO__SAN_GENESIO_-_SAN_MARTINO_CENTRO",""),
  array(3, 3247024,"1B_-_SAN_MARTINO__CAVA_MANARA_-_MONTEMAINO",""),
  array(4, 2133802,"1C_-_MONTEMAINO__SAN_GENESIO_-_CAVA_MANARA",""),
  array(5, 3246907,"1C_-_SAN_MARTINO__CAVA_MANARA_-_SAN_GENESIO",""),
  array(6, 3246798,"1D_-_MONTEMAINO__SAN_GENESIO_-_STAZIONE",""),
  array(7, 2133842,"2_-_POLICLINICO__GARIBALDI",""),
  array(8, 2150562,"3_-_MONTEBOLONE_-_COLOMBARONE",""),
  array(9, 3244485,"3A_-_MONTEBOLONE_-_STAZIONE",""),
  array(10, 3244493,"3B_-_MONTEBOLONE_-_MAUGERI",""),
  array(11, 3244510,"3C_-_MONTEBOLONE_-_CASCINA_PELIZZA",""),
  array(12, 3229837,"3_-_MAUGERI__COLOMBARONE_-_MONTEBOLONE",""),
  array(13, 3244549,"3A_-_MAUGERI__COLOMBARONE_-_STAZIONE",""),
  array(14, 3244438,"4_-_VALLONE_-_SORA",""),
  array(15, 3244460,"4A_-_VALLONE_-_TORRE_D_ISOLA",""),
  array(16, 3244465,"4_-_SORA__TORRE_D_ISOLA_-_VALLONE",""),
  array(17, 2150757,"5_-_GRAMEGNA__STAZIONE_FS",""),
  array(18, 3242515,"6_-_TAVAZZANI_-_CASCINA_PELIZZA",""),
  array(19, 2150673,"6_-_CASCINA_PELIZZA_-_TAVAZZANI",""),
  array(20, 3244817,"7_-_VALLONE_PASTRENGO_-_MAUGERI_MONDINO",""),
  array(21, 3366049,"7A_-_CURA_CARPIGNANO_-_STAZIONE",""),
  array(22, 3244872,"7B_-_CURA_CARPIGNANO_-_MAUGERI_MONDINO",""),
  array(23, 3244636,"7_-_MAUGERI_MONDINO_-_VALLONE_PASTRENGO",""),
  array(24, 3230088,"7A_-_MAUGERI_MONDINO_-_CURA_CARPIGNANO",""),
  array(25, 3244581,"7B_-_MAUGERI_MONDINO_-_PRADO",""),
  array(26, 3221276,"9_-_LINEA_INTERNA_POLICLINICO",""),
  array(27, 2152578,"10_-_CA__DELLA_TERRA_-_BORROMEO",""),
  array(28, 3244403,"10A_-_CA__DELLA_TERRA_-_TAVAZZANI",""),
  array(29, 3242953,"10_-_BORROMEO_-_CA__DELLA_TERRA",""),
  array(30, 2896349,"21_-_MEZZANA_CORTI_-_PAVIA_STAZIONE_FS",""),
  array(31, 3242909,"21_-_PAVIA_STAZIONE_FS_-_MEZZANA_CORTI",""),
  array(32, 3252015,"22_-_BOSCHI_-_PAVIA_STAZIONE_FS",""),
  array(33, 3263765,"22A_-_BOSCHI_-_SAN_MARTINO_PIEMONTE",""),
  array(34, 2896350,"22_-_PAVIA_STAZIONE_FS_-_BOSCHI",""),
  array(35, 3263771,"22A_-_SAN_MARTINO_PIEMONTE_-_BOSCHI",""),
  array(36, 3243140,"23_-_SAN_GENESIO_-_PAVIA_STAZIONE_FS",""),
  array(37, 2895931,"23_-_PAVIA_STAZIONE_FS_-_SAN_GENESIO",""),
  array(38, 3232204,"24_-_LINAROLO__PAVIA_MONTEBOLONE",""),
  array(39, 3234153,"25_-_VALLE_SALIMBENE__PAVIA_MONTEBOLONE",""),
  array(40, 3254730,"A_-_AUTOSTAZIONE__ISTITUTO_BORDONI",""),
  array(41, 3369430,"A_-_ISTITUTO_BORDONI__AUTOSTAZIONE",""),
  array(42, 3369440,"B_-_AUTOSTAZIONE__ISTITUTO_VOLTA",""),
  array(43, 3369444,"B_-_ISTITUTO_VOLTA__AUTOSTAZIONE",""),
  array(44, 3375975,"C_-_AUTOSTAZIONE__ISTITUTO_IPSIA",""),
  array(45, 3373078,"C_-_ISTITUTO_IPSIA__AUTOSTAZIONE",""),
  array(46, 3290168,"D_-_AUTOSTAZIONE__ISTITUTO_CLERICI",""),
  array(47, 3290213,"D_-_ISTITUTO_CLERICI__AUTOSTAZIONE",""),
  array(48, 3258222,"E_-_AUTOSTAZIONE__ISTITUTO_COSSA",""),
  array(49, 3258271,"E_-_ISTITUTO_COSSA__AUTOSTAZIONE","")
  );

$base_url = 'http://overpass-api.de/api/interpreter?data=(relation(';
$closing = '););(._;>;);out meta qt;';
$base_outputfile = ".osm";
$convert = "osmtogeojson ";
$path = "routes/";
$gpx = "osm/";
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
	$cmd = "wget \"$base_url$rel_id$closing\" -O $path$gpx$name$base_outputfile";
	echo $cmd . "\n";
	exec($cmd);
	$cmd2 = $convert . $path . $gpx . $name . $base_outputfile . " > " . $path . $geojson . $name . ".geojson";
	echo $cmd2 . "\n";
	exec($cmd2);
	$i++;
}
?>
