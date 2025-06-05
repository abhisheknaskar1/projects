<template>
    <div class="main-menu" id="main-menu" style="display:none">
        <div class="toggle-logo">
            <Link :href="route('landing')">
                <img :src="'/images/logo1.png'" alt="" width="150px" />
            </Link>
        </div>
        <a href="#" class="close" @click="closeManu"><i class="fa-solid fa-x"></i></a>
        <ul>
            <li><a href="https://1homes.oneolabs.com/">Home</a></li>
            <!-- <li><a href="#">about us</a></li> -->
            <li><a href="https://1homes.oneolabs.com/">Buy a Home</a></li>
            <li><a href="../#testimonials-data">Testimonial</a></li>
            <!-- <li><a href="#">FAQ</a></li> -->
            <li><a href="../#footer-data">Contact us</a></li>            
        </ul>
    </div>
    <header class="header">
        <div class="container-fluid">
            <div class="top-menu">
                <div class="logo">
                    <Link :href="route('landing')">
                        <img :src="'/images/logo1.png'" alt="" width="170px" />
                    </Link>
                </div>
                <a href="#" class="toggle-icon" @click="openManu">
                    <img :src="'/images/menu.png'" alt="" />
                </a>
            </div>
        </div>
    </header>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import $ from "jquery";

function openManu() {
    $("#main-menu").fadeToggle();
}
function closeManu() {
    $("#main-menu").fadeToggle("slow");
}
</script>
