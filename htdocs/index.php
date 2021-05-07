<?php
include 'config/db.php';
include 'config/autoload.php';
session_start();
include 'partiels/header.php'; ?>
<body>
<?php 
include 'partiels/navBar.php'; 

$DestinationManager = new DestinationManager($pdo); 
$OperatorManager = new TourOperatorManager($pdo);
$ReviewManager = new ReviewManager($pdo);
include 'data-recovery/poc-promo.php';
include 'forms/search.php';
include 'data-recovery/destinations.php';
include 'data-recovery/gallery.php';
?>

</body>
<?php include 'partiels/footer.php'; ?>