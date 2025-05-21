<html lang="en">

<head>
    <title>Web 3D Application!</title>

    <script type="importmap">
        {
          "imports": {
            "three": "https://cdn.jsdelivr.net/npm/three@v0.172.0/build/three.module.js",
            "three/addons/": "https://cdn.jsdelivr.net/npm/three@v0.172.0/examples/jsm/"
          }
        }
    </script>
</head>
<body>

<script type="module" src="./main.js"></script>
<link rel="stylesheet" href="style.css">

<?php
include "funcs.php";
component_header();
?>
<main class="floating" style="position: absolute; left: 3rem; top: 3rem;">
    <a href="/">← Go back</a>
    <br>
        <?php if (
            isset($_GET["animation"])
        ) { ?> <button id="anim">Play animation</button> <?php } ?>

    <button id="wire">Wireframe</button>


</main>

<three-canvas data="<?= $_GET["model"] ?>" water="<?php if (
    isset($_GET["water"])
) {
    echo "true";
} else {
    echo "false";
} ?>"  anim="<?php if (isset($_GET["animation"])) {
    echo "true";
} else {
    echo "false";
} ?>" style="width: 100%; height: 100%;"></three-canvas>


</body>
</html>
