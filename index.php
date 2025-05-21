<html lang="en">

<head>
    <title>Web 3D Application!</title>
</head>
<body>

<script type="module" src="./main.js"></script>
<link rel="stylesheet" href="style.css">

<?php
include "funcs.php";
component_header();
?>


<?php session_start(); ?>
<main>
    <p style="margin-top: 0;"> We design bespoke models for customers. </p>

    <h2 style="margin-bottom: 0">Samples</h2>
    <div class="modelpicker" style="display: inline-flex; margin-bottom: 1rem; flex-direction: row; max-width: 100%; max-height: 10rem; border: 2mm ridge slategray;">
        <a href="/model.php?model=can_real%20open.glb&animation=true" style="display: block;">
            <img src="can.png" alt="A 3D can model." style="height: 100%;">
        </a>
        <div style="display: block; border-left: 1mm inset slategrey;"></div>
        <a href="/model.php?model=wine%20glas.glb" style="display: block;">
            <img src="glass.png" alt="A 3D wine glass model." style="height: 100%;">
        </a>
        <div style="display: block; border-left: 1mm inset slategrey;"></div>
        <a href="/model.php?model=fish.glb&water=true&animation=true" style="display: block;">
            <img src="fish.png" alt="A 3D fish model." style="height: 100%;">
        </a>

    </div>

    <br>
    (c) 1997 Three Dee Modelling Consultancy — <a href="about.php">About This Page</a>
</main>
</body>
</html>
