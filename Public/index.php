<?php
    
    include_once '../module/debug.php';
    session_start();
    include_once '../vendor/autoload.php';    
    include_once '../module/variables.php';
    include_once '../module/head.php';

?>

<body>

    <?php include_once '../module/header.php'; ?>
    <?php include_once '../module/main.php'; ?>
    <?php include_once '../module/footer.php'; ?>
    <?php include_once 'js/libraryJS.php'; ?>

</body>

</html>