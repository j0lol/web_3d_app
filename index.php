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
<!--<template id="carousel-template">-->
<!--    <style>-->
<!--        slot {-->
<!--            display: flex;-->
<!--            flex-direction: row;-->
<!--            height: 8em;-->
<!--            width: 100vw;-->
<!--            aspect-ratio: 16 / 9;-->
<!--            position:relative;-->
<!--            top:0;-->
<!--            left:0;-->
<!--        }-->
<!--    </style>-->
<!--    <script>-->
<!---->
<!--        function move_left() {-->
<!--            let items = document.querySelector("#carousel-items");-->
<!---->
<!--            items.appendChild(items.firstChild)-->
<!--        }-->
<!--        function move_right() {-->
<!--            let items = document.querySelector("#carousel-items");-->
<!--            if (items === null) {-->
<!--                console.log("ah!");-->
<!--            }-->
<!--            items.prepend(items.lastChild)-->
<!--        }-->
<!--    </script>-->
<!--    <button onclick="move_left()" id="move-left">Left</button>-->
<!--    <button onclick="move_right()" id="move-left">Right</button>-->
<!--    <slot id="carousel-items">This is an empty slot</slot>-->
<!--</template>-->
<script type="module" src="./main.js"></script>
<!--<script type="module" src="./carousel.js"></script>-->
<link rel="stylesheet" href="style.css">

<header>
    <div class="head-logo">
    <img class="head-logo-light" src="Coca-Cola_logo.svg">
    <img class="head-logo-shadow" src="Coca-Cola_logo_shadow.svg">
    </div>

    <p></p>
</header>

<main>
    <p> Hello! </p>

<!--    <image-carousel>-->
<!--        <slot>-->
<!--            <img alt="Coca-cola display" src="https://images.unsplash.com/photo-1535990379313-5cd271a2da2d?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">-->
<!--            <img alt="Coca-cola display" src="https://images.unsplash.com/photo-1553117854-1b456e458002?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGNvY2ElMjBjb2xhfGVufDB8fDB8fHww">-->
<!---->
<!--        </slot>-->
<!--    </image-carousel>-->
    <button id="anim">Play animation</button>
    <button id="wire">Wireframe</button>

    <three-canvas></three-canvas>

</main>

</body>
</html>
