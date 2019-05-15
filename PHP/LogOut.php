<?php
    setcookie('user', '', time() - 100000000 * 1000, '');
    echo"<script>window.location = 'Index.php';</script>";
?>
