"use strict";

import * as THREE from "three";
import { GLTFLoader } from "three/addons/loaders/GLTFLoader.js";
import { OrbitControls } from "three/addons/controls/OrbitControls.js";

const headerSize = 37 + 8 + 8;

const clock = new THREE.Clock();
const scene = new THREE.Scene();
const renderer = new THREE.WebGLRenderer({ alpha: true });
renderer.setSize(window.innerWidth, window.innerHeight - headerSize);
document.querySelector("three-canvas").appendChild(renderer.domElement);

const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / (window.innerHeight - headerSize),
  0.1,
  1000,
);
camera.position.set(0, 10, 5);

const controls = new OrbitControls(camera, renderer.domElement);
controls.update();

if (document.querySelector("three-canvas").getAttribute("water") == "true") {
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
}

let y_pos = 1;
const loader = new GLTFLoader();

let wireframe = false;

window.addEventListener("resize", onResize);

function onResize() {
  camera.aspect = window.innerWidth / (window.innerHeight - headerSize);
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight - headerSize);
}

loader.load(
  "./" + document.querySelector("three-canvas").getAttribute("data"),
  function (gltf) {
    console.log(gltf);
    scene.add(gltf.scene);
    renderer.render(scene, camera);

    let actions = [];

    const mixer = new THREE.AnimationMixer(gltf.scene);
    const animations = gltf.animations;
    animations.forEach((clip) => {
      const action = mixer.clipAction(clip);
      action.timeScale = 1;
      action.clampWhenFinished = true;

      if (
        document.querySelector("three-canvas").getAttribute("water") == "true"
      ) {
        action.setLoop(THREE.LoopRepeat);
      } else {
        action.setLoop(THREE.LoopOnce);
      }
      actions.push(action);
    });

    if (document.querySelector("three-canvas").getAttribute("anim") == "true") {
      document.querySelector("#anim").addEventListener("click", function () {
        actions.forEach((action) => {
          action.reset();
          action.play();
        });
        if (
          document.querySelector("three-canvas").getAttribute("water") == "true"
        ) {
          var audio = new Audio("ocean.mp3");
          audio.loop = true;
          audio.play();
        } else {
          console.log("no audio!");
        }
      });
    }

    document.querySelector("#wire").addEventListener("click", function () {
      wireframe = !wireframe;
      gltf.scene.traverse((obj) => {
        if (obj.isMesh) obj.material.wireframe = wireframe;
      });
    });

    function animate() {
      mixer.update(clock.getDelta());
      controls.update();
      renderer.render(scene, camera);
    }
    renderer.setAnimationLoop(animate);
  },
  undefined,
  function (error) {
    console.error(error);
  },
);
