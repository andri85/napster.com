<?php
$guest = "in naplex.com";
if ($_GET['guest'] != null && $_GET['guest'] != ""){
	$guest = $_GET['guest'];
}
echo "<html><body>Benvenuti... ".strtoupper($guest)."</body></html>";
?>
