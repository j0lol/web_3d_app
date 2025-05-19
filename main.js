"use strict";

import * as THREE from 'three';
import {GLTFLoader} from 'three/addons/loaders/GLTFLoader.js';
import {OrbitControls} from 'three/addons/controls/OrbitControls.js';

const clock = new THREE.Clock();
const scene = new THREE.Scene();
const renderer = new THREE.WebGLRenderer({alpha: true});
renderer.setSize(window.innerWidth, window.innerHeight);
document.querySelector("three-canvas").appendChild(renderer.domElement);

const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.set(0, 0, 20);

const controls = new OrbitControls(camera, renderer.domElement);
controls.update();

const ambientLight = new THREE.AmbientLight( 0x404040, 10 ); // soft white light
scene.add( ambientLight );

const light = new THREE.DirectionalLight(0xffffff, 10);
light.position.set(10, 10, 10);
scene.add(light);


let y_pos = 1;
const loader = new GLTFLoader();

let wireframe = false;

window.addEventListener('resize', onResize)

function onResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}



loader.load('./can_real open.glb', function (gltf) {

    scene.add(gltf.scene);
    renderer.render(scene, camera);


    let actions = [];

    const mixer = new THREE.AnimationMixer(gltf.scene);
    const animations = gltf.animations;
    animations.forEach(clip => {
        const action = mixer.clipAction(clip);
        action.timeScale = 1;
        action.clampWhenFinished = true;
        action.setLoop(THREE.LoopOnce);
        actions.push(action);
    });

    document.querySelector("#anim").addEventListener("click", function () {
        actions.forEach(action => {
            action.reset();
            action.play();
        });
    });

    document.querySelector("#wire").addEventListener("click", function () {
        wireframe = !wireframe;
        gltf.scene.traverse((obj) => {
            if (obj.isMesh) obj.material.wireframe = wireframe;
        });
    });

    function animate() {
        mixer.update(clock.getDelta())
        controls.update();
        renderer.render(scene, camera);
    }
    renderer.setAnimationLoop(animate);


}, undefined, function (error) {

    console.error(error);

});

