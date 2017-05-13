<?php
session_start();

$_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"] = "";
$_SESSION["4832ec78c988b19caba3064d548ebce5d09b86ed"] = "";
$_SESSION["a88b7dcd1a9e3e17770bbaa6d7515b31a2d7e85d"] = "";

session_destroy();

header("Location: ../index.php");
