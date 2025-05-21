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
    <script type="module" src="./prism-2.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="prism.css">

<?php
include "funcs.php";
component_header();
?>


<main>
    <a href="./">← Go back</a>

    <h1>About This Page</h1>

    <p>This is a fake page for an early-internet 3D modelling company.</p>
    <h2>Design</h2>
    <p>The page's design is roughly based on early web designs. It does this through:</p>

    <ul>
        <li>Odd colors, like off-white and purple</li>
        <li>Default font (fonts are heavy to download!)</li>
        <li>Obsession around 3D in general</li>
        <li>3D logo text (all CSS), 3D borders</li>
        <li> <em>Non-standard navigation</em> — Nowadays every page looks the same, but it was not always like this! <small>(You know this of course, marker.)</small> </li>
    </ul>

    <h3>Inspirations:</h3>
    <div class="modelpicker" style="display: inline-flex; margin-bottom: 1rem; flex-direction: row; max-width: 100%; max-height: 10rem; border: 2mm ridge slategray;">
        <img width=200 style="display: block;" src="https://computernxtechnology.com/wp-content/uploads/2019/10/silicon-graphics-sgi-o2-workstation.jpg">
        <div style="display: block; border-left: 1mm inset slategrey;"></div>
        <img width=200 style="display: block;" src="https://images.idgesg.net/images/article/2018/07/imac-colors-100763187-orig.jpg">
        <div style="display: block; border-left: 1mm inset slategrey;"></div>
        <img width=200 style="display: block;" src="https://preview.redd.it/n1m14ga2b7n51.jpg?width=1080&crop=smart&auto=webp&s=d12d42c5eeae88bd61138fb60f34720301e4c29b">
    </div>
    <br>

    <p>To make my website more accessible, I added <code>alt</code> text to the images on my landing page. This helps blind users interpret the images on the page with a description. To help users with low vision, all text has passed a WCAG test. This makes sure text can be distinguished from its background.</p>

    <div class="modelpicker" style="display: inline-flex; margin-bottom: 1rem; flex-direction: row; max-width: 100%; border: 2mm ridge slategray;">
        <img src="./webaim pass.png" width=300>
    </div>
    <p>        To swap out models, the user can navigate to the index page, where they click on an image to load the represented model. To help with <em>interactivity</em>, the images get darker if you hover them with the mouse. This suggests that they can be clicked. If they are clicked, they get further darker. This shows the user that their action has succeeded while they await the next page load.</p>
    <h2>Modelling</h2>
    <p>
        As you can see on the index page, three models were produced in Blender. A bottle open animation was made for the coke can, and a swimming animation was made for the fish.

        The 'coke can' model uses a blender-themed label image. This image is sourced from <a href="https://www.youtube.com/watch?v=IrImZ9GKhEQ">this tutorial</a>.
        The fish model uses a custom drawn image.
    </p>

    <div class="modelpicker" style="display: inline-flex; margin-bottom: 1rem; flex-direction: row; max-width: 100%; max-height: 10rem; border: 2mm ridge slategray;">
        <img width=300 style="display: block;" src="screenshots/Screenshot 2025-05-21 at 11.49.09.png">
        <div style="display: block; border-left: 1mm inset slategrey;"></div>
        <img width=300 style="display: block;" src="screenshots/Screenshot 2025-05-21 at 11.49.36.png">
        <div style="display: block; border-left: 1mm inset slategrey;"></div>
        <img width=300 style="display: block;" src="screenshots/Screenshot 2025-05-21 at 11.49.52.png">
    </div>
    <br>

    <p>The animations use keyframes to "<code>lerp</code>" (linear interpolate) between set points. For each animation, I set points that I wanted the shape to end up at points in the animation. The fish, for example, has a fin that swims left and right. This involed making three keyframes: two where the fin is rotated clockwise, and one in the middle where the fin is rotated anticlockwise. The animation then <code>lerp</code>s between these points. One issue with this is that when the animation isn't playing, it will default to "frame 0", which is a rotated fin. The fish would look unnatural if the fin were rested in this position whole not animated, so I had to pick a frame in the animation where the fin <em>looked</em> like it was not rotated, then export the model with that frame as the "resting frame".</p>

    <p>While all the models use Blender's material system, the wine glass is the best example of this. The entire model is transparent, with a more opaque body of wine in the glass. The liquid body was created by first modelling the "cup" of the glass, and then scaling a duplicated shape of it down to fit within itself. This was then given a different material from the glass. To look more realistic, a "lid" was given to the body of water so that it appeared contiguous when viewed from above. However, due to the body being hollow, this does somewhat break the illusion of the liquid body. To solve this, I needed to remove the "solidify" modifier that was given to the glass cup. This gave the glass outside a thick body, but this was not required for the liquid inside. With this change, the "thick walls" of the body of wine were removed, and the illusion is not broken.</p>


    <h2>Model Integration & Interaction</h2>
    <p>
        Three.js was used for viewing models. The model viewer is complex, with lighting, materials, and in some cases a skybox. For lighting, <em>ambient</em> and <em>point</em> lights were used for more realistic lighting. Without ambient lighting, the scene would be in full darkness when not facing the light (like the dark side of the moon.)
    </p>

    <p>

        The user can orbit the model with the camera.
        This is done with the mouse.
        Panning can also be done with a right click, or gestures on a trackpad.
    </p>

    <p>
        To add ambience to the fish scene, a skybox, swimming animation, and background audio was added. The audio was sourced from <a href="https://freesound.org/people/Fission9/sounds/504641/">this FreeSound Listing (CC0)</a>.
    </p>

    <p>Where animations are present, the user can press the "Play animation" button to activate them. This will also trigger any audio for the scene, as a button press is required before playing audio in modern browsers.</p>
    <h2>Implementation</h2>


    <p>
        The website was implemented in PHP. This was chosen for a few reasons: It's plain simple to use, easy to extend your website with, and doesn't require the large boilerplate of web frameworks like React.
    </p>

    <p>
        The model viewer is only one page, and GET parameters configure the model viewer page. <em>e.g.</em> <code>/model.php?model=fish.glb&water=true</code>. With these parameters, the PHP page can decide whether to show an animation button, add a skybox, play audio, and many more things without much extra code needed.
    </p>
    <p>
        A skybox HDRI was used to give a better lighting to the fish model. The skybox was sourced from <a href="https://opengameart.org/content/ocean-hdriskybox">this website</a>, and is licenced CC0. The HDRI was converted to a cubemap with <a href="https://matheowis.github.io/HDRI-to-CubeMap/">this tool</a>. To better suit the model for the lighting, a color picked from the HDRI was used for ambient lighting, and it was saturated for the point light.
    </p>

    <pre><code class="language-js">if (document.querySelector("three-canvas").getAttribute("water") == "true") {
  const loader = new THREE.CubeTextureLoader();
  const texture = loader.load([
    "cube-map/px.png",
    "cube-map/nx.png",
    "cube-map/py.png",
    "cube-map/ny.png",
    "cube-map/pz.png",
    "cube-map/nz.png",
  ]);
  scene.background = texture;
  const ambientLight = new THREE.AmbientLight(0x3a83a5, 10);
  scene.add(ambientLight);

  const light = new THREE.DirectionalLight(0x70c6ed, 10);
  light.position.set(10, 30, 10);
  scene.add(light);
} else {
  const ambientLight = new THREE.AmbientLight(0x404040, 10);
  scene.add(ambientLight);

  const light = new THREE.DirectionalLight(0xffffff, 10);
  light.position.set(10, 10, 10);
  scene.add(light);
}</code></pre>
    <sup>This code block was highlighted with <a href="https://prismjs.com/">Prism.js</a> </sup>


    <p>The CSS was all custom made by myself. The text and box 3D shapes are implemented as stacked shadows of different colors. To make sure the colors were regular, I used the rather new <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_colors/Relative_colors">Relative Color Syntax</a>, as well as the obscure <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/color_value/hwb"><code>hwb()</code></a> color notation for easier modification. Every color used on the page is either a built-in color, or a color defined relative to a built-in color. </p>

    <pre><code class="language-css">.head-logo {
        position: relative;
        flex-grow: 0;
        font-size: 2rem;
        margin: 0;
        color: hwb(from slategrey h calc(w + 100) b);
        text-shadow:
            1px 1px hwb(from slategrey h w calc(b + 00)),
            2px 2px hwb(from slategrey h w calc(b + 30)),
            3px 3px hwb(from slategrey h w calc(b + 60));
    }</code></pre>

    <h2>Publishing & Testing</h2>

    <p>I have published this on GitHub, at this URL: <a href="https://github.com/j0lol/web_3d_app">here</a></p>

    <h3>Cross-platform and cross-browser testing</h3>
    <p>I have tested that the page works fine across MacOS and Windows with their default browsers. I tested iOS too, and notably touch screen controls for the camera. These work fine. Chrome and Firefox on macOS were tested too without major issues.. </p>


    <div class="modelpicker" style="display: inline-flex; margin-bottom: 1rem; flex-direction: row; max-width: 100%; border: 2mm ridge slategray;">
        <img width=200 src="screenshots/iphone.PNG">
    </div>
</main>

<br>
</body>
</html>
