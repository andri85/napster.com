<?php
$guest = "GUEST";
if ($_GET['guest'] != null && $_GET['guest'] != ""){
	$guest = $_GET['guest'];
}
echo "<html><body>HELLO DEAR ".strtoupper($guest)."</body></html>";
?>