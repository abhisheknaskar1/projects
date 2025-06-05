<template>
  <Head>
    <title>1Homes</title>
  </Head>
  <Navbar />
    <div class="wp-chat">
        <a href="https://wa.me/+919028873985?text=Hi! I'm interested in learning more about your properties and how they can meet my needs." target="_blank">
            <img :src="'/images/whatsApp_icon.webp'" alt="" class="whats-app-btn" />
        </a>
    </div>
  <section class="section-curated-one">
    <div id="owl-slider" class="owl-carousel owl-theme" data-aos="fade-right">
      <div class="item position-relative" v-for="slide in category.slides">
        <img :src="'/images/' + slide.image_uri" width="100%" :alt="category.title" />
        <div class="slider-description">
          <h2 v-html="slide.title.split('\n').join('<br />')"></h2>
          <p>{{ slide.description }}</p>
          <a :href="slide.cta_action" class="curated-view-more">{{ slide.cta_label }}</a>
        </div>
      </div>
    </div>
  </section>
  <section class="section-curated-two" id="main-curated">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{ category.title }}</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4" v-for="property in properties">
          <div class="sec-curated-two-box">
            <div class="card">
              <div class="card-header">
                <img :src="route('asset_property_image', {id: property.images[0].id, file: property.code + '-' + property.images[0].file})" alt="" />
              </div>
              <div class="card-body">
                <h4>{{ property.title }}</h4>
                <h3>{{ property.price_bracket }}</h3>
                <h5>{{ property.address }}</h5>
                  <div>
                      <div v-if="category.code === 'curated-apartment'">
                          <Link :href="route('curated_apartment_view', {code: property.code})">View Details</Link>
                      </div>
                      <div v-if="category.code === 'exclusive-properties'">
                          <Link :href="route('exclusive_properties_view', {code: property.code})">View Details</Link>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </section>
  <FooterSection />
</template>
<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import Navbar from "@/Components/Navbar.vue";
import FooterSection from "@/Components/FooterSection.vue";
import { tns } from "tiny-slider";
import AOS from 'aos';
const props = defineProps({
  category: Object({
    id: String,
    code: String,
    title: String,
    description: String,
    slides: Array(Object)
  }),
  properties: Array(Object),
})

onMounted(() => {
  AOS.init();
  tns({
    container: '#owl-slider',
    items: 1,
    slideBy: 'page',
    autoplay: true,
    mode: 'carousel',
    mouseDrag: true,
    swipeAngle: false,
    speed: 800,
    controls: false,
    controlsContainer: false,
    prevButton: false,
    nextButton: false,
    nav: false,
    navContainer: false,
    autoplayButtonOutput: false,
    autoplayTimeout: 4000,
  });
});
</script>
<style lang="scss" scoped>
@import "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css";
@import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css";
@import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css";
</style>
