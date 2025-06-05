<template>
    <Head>
        <title>{{ property.title }}</title>
    </Head>
    <!--    <Navbar />-->
    <div class="wp-chat">
        <a href="https://wa.me/+919028873985?text=Hi! I'm interested in learning more about your properties and how they can meet my needs."
           target="_blank">
            <img :src="'/images/whatsApp_icon.webp'" alt="" class="whats-app-btn"/>
        </a>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top header-data-top" data-scrollto-offset="0">
        <div class="container d-flex align-items-center justify-content-between">
            <Link :href="route('landing')">
                <a href="#" class="logo-data d-flex align-items-center scrollto me-auto me-lg-0">
                    <h1>
                        <img :src="route('asset_property_uri', {code: property.code})"
                             style="width: 180px; height: 100px; object-fit: contain;" alt=""/>
                    </h1>
                </a>
            </Link>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#overview">Overview</a></li>
                    <li><a class="nav-link scrollto" href="#amenities">Amenities</a></li>
                    <li><a class="nav-link scrollto" href="#configuration">Configuration</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">Project Gallery</a></li>
                    <li><a href="#location">Location</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav>
            <!-- .navbar -->
            <a class="btn-getstarted scrollto" href="#" @click="openRequestCallBackModal">Request a Call Back</a>
        </div>
    </header>
    <!-- End Header -->
    <main>
        <template v-for="(image, index) in property.images">
            <section class="hero mahindra-hero"
                     :style="{ backgroundImage: 'url(' + route('asset_property_image', {id: image.id, file: property.code + '-' + image.file}) + ')' }">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                        </div>
                        <div class="col-lg-7">
                            <div class="hero-text text-center text-white hero-data-text">
                                <h2 class="">
                                    <span class="text-data" v-if="property.banner_content"> {{ property.banner_content }}</span>
                                    <br>
                                    <span class="text-data"> {{ property.price_bracket }} </span> onwards
                                    <br> <i class="bi bi-geo-alt-fill"></i> {{ property_locality[0].title }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
        <section class="overview" id="overview">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>All You Need to Know</h2>
                            <div class="section-devider"></div>
                            <div v-html="'<p>' + property.detail.split('\n').join('</p><p>') + '</p>'"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>Overview</h2>
                            <div class="section-devider"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <template v-if="property.project_size">
                        <div class="col-lg-2">
                            <div
                                class="project-area text-center d-flex justify-content-center gap-4">
                                <div class="project-area-img">
                                    <img :src="'/images/project-area.png'" width="30px" alt="">
                                </div>
                                <div class="project-area-text">
                                    <p>Project Area <br> {{ property.project_size }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-if="hasTowers">
                        <div class="col-lg-2">
                            <div class="project-area text-center d-flex justify-content-center gap-4">
                                <div class="project-area-img">
                                    <img :src="'/images/no.of-towers.png'" width="30px">
                                </div>
                                <div class="project-area-text">
                                    <p>
                                        No. of Towers <br>
                                        {{ aggregatedTowers }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-for="sector in property.sectors">
                        <div class="col-lg-2" v-if="sector.floors">
                            <div
                                class="project-area text-center d-flex justify-content-center gap-4">
                                <div class="project-area-img">
                                    <img :src="'/images/floors.png'" width="30px">
                                </div>
                                <div class="project-area-text">
                                    <p> Floors <br> {{ sector.floors }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-if="hasFlats">
                        <div class="col-lg-2">
                            <div
                                class="project-area text-center d-flex justify-content-center gap-4">
                                <div class="project-area-img">
                                    <img :src="'/images/numbers-of-flat.png'" width="30px">
                                </div>
                                <div class="project-area-text">
                                    <p> No. of Flats <br> {{ aggregatedFlats }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="col-lg-2">
                        <div class="project-area text-center d-flex justify-content-center gap-4">
                            <div class="project-area-img">
                                <img :src="'/images/possesion.png'" width="30px">
                            </div>
                            <div class="project-area-text">
                                <p> Possession <br> {{ property.possession }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="amenities" id="amenities">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>Amenities At {{ property.title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row text-center amenities-data">
                    <template v-for="amenity in property.amenities">
                        <div class="col-lg-4 col-6 text-center mb-3">
                            <img :src="amenity.icon_uri" alt="" width="50px" height="50px"/>
                            <p>{{ amenity.title }}</p>
                        </div>
                    </template>
                </div>
            </div>
        </section>
        <section class="configuration" id="configuration">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>Configuration</h2>
                            <div class="section-devider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered  apartment-table tab-content"
                                   v-if="property.sectors.length > 1">
                                <thead>
                                <tr>
                                    <th scope="col">Sector</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Configurations</th>
                                    <th scope="col price-data">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <template v-for="(sector, sectorIndex) in property.sectors" :key="sectorIndex">
                                    <template v-for="(unit, unitIndex) in sector.units" :key="unit.id">
                                        <tr v-for="(variation, vIndex) in unit.variations" :key="variation.id">
                                            <td v-if="unitIndex === 0 && vIndex === 0" :rowspan="sector.units.reduce((total, unit) => total + unit.variations.length, 0)">
                                                {{ sector.title }}
                                            </td>
                                            <td v-if="vIndex === 0" :rowspan="unit.variations.length">
                                                {{ unit.property_unit_type.title }}
                                            </td>
                                            <td>
                                                {{ variation.area_nice }}
                                            </td>
                                            <td class="text-right" align="right">
                                                <a href="#" class="btn btn-data price-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="openRequestCallBackModal">
                                                    Check Price
                                                </a>
                                            </td>
                                        </tr>
                                    </template>
                                </template>

                                </tbody>
                            </table>
                            <table class="table table-bordered  apartment-table tab-content" v-else>
                                <thead>
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">Configurations</th>
                                    <th scope="col price-data">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <template v-for="sector in property.sectors">
                                    <template v-for="(unit) in sector.units" :key="unit.id">
                                        <tr v-for="(variation, vIndex) in unit.variations" :key="variation.id">
                                            <td v-if="vIndex === 0" :rowspan="unit.variations.length">
                                                {{ unit.property_unit_type.title }}
                                            </td>
                                            <td>{{ variation.area_nice }}</td>
                                            <td class="text-right" align="right">
                                                <a href="#" class="btn btn-data price-btn" @click="openRequestCallBackModal">
                                                    Check Price
                                                </a>
                                            </td>
                                        </tr>
                                    </template>
                                </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="gallery">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>Project Gallery</h2>
                            <div class="section-devider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills mb-3 d-flex gap-4 justify-content-center align-items-center"
                            id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation" v-if="property.galleries.length > 0">
                                <button class="nav-link" :class="{active: property.galleries.length > 0}" id="pills-gallery-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-gallery" type="button" role="tab"
                                        aria-controls="pills-gallery" :aria-selected="property.galleries.length > 0">Elevation
                                </button>
                            </li>
                            <li v-if="property.galleries.length > 0 && hasFloorPlanVariations">
                                <span>|</span>
                            </li>
                            <li class="nav-item" role="presentation" v-if="hasFloorPlanVariations">
                                <button class="nav-link" :class="{active: property.galleries.length === 0 && hasFloorPlanVariations}"
                                        id="pills-floor-plan-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-floor-plan" type="button" role="tab" aria-controls="pills-floor-plan"
                                        :aria-selected="property.galleries.length === 0 && hasFloorPlanVariations">Floor-Plan
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade"
                                 :class="{show: property.galleries.length > 0, active: property.galleries.length > 0}"
                                 id="pills-gallery" role="tabpanel"
                                 aria-labelledby="pills-gallery-tab" tabindex="0">
                                <div class="owl-carousel owl-theme carousel3">
                                    <div id="owl-gallery-carousel" class="">
                                        <template v-for="(image, index) in property.galleries">
                                            <div class="item px-2">
                                                <img
                                                    :src="route('asset_property_gallery', {id: image.id, file: property.code + '-' + image.file})"
                                                    alt="">
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade"
                                 :class="{show: property.galleries.length === 0 && hasFloorPlanVariations, active: property.galleries.length === 0 && hasFloorPlanVariations}"
                                 id="pills-floor-plan" role="tabpanel" aria-labelledby="pills-floor-plan-tab"
                                 tabindex="0">
                                <div class="owl-carousel owl-theme carousel3">
                                    <div id="owl-specification-carousel" class="">
                                        <template v-for="sector in property.sectors">
                                            <template v-for="unit in sector.units">
                                                <template v-for="variation in unit.variations">
                                                    <template v-if="variation.layout_uri">
                                                        <div class="item text-center px-2">
                                                            <img :src="route('asset_property_variation', {id: variation.id})" alt="">
                                                            <p class="mt-2">
                                                                {{ unit.property_unit_type.title }}
                                                            </p>
                                                        </div>
                                                    </template>
                                                </template>
                                            </template>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="location">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>Location highlights</h2>
                            <div class="section-devider"></div>
                            <p>
                                {{ property_locality[0].description }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="mb-3 mt-3">
                            <iframe :src="property.google_map"
                                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center mt-3">
                        <a class="btn btn-data" href="#" @click="openRequestCallBackModal">Schedule
                            a Site Visit</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="malpani">
            <div class="container">
                <div class="row justify-content-center mb-4" v-if="propertyDeveloper[0].title">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>About {{ propertyDeveloper[0].title }}</h2>
                            <div class="section-devider"></div>
                            <h4>Residential & Commercial Development</h4>
                            <p>{{ propertyDeveloper[0].detail }}</p>
                            <p>
                            </p>
                        </div>
                    </div>
                </div>
                <template v-if="property.regulatory_approval_detail || property_approval_qr_image">
                    <div class="row align-items-center justify-content-center ">
                        <div class="col-lg-3 text-center">
                            <img :src="route('asset_property_regulatory_approval_qr_code', {code: property.code})"
                                 style="width: 150px" class="qr-data" alt=""/>
                            <p class="mt-3" v-if="property.regulatory_approval_detail">
                                {{ property.regulatory_approval_detail }}</p>
                        </div>
                    </div>
                </template>
            </div>
        </section>
        <section class="malpani">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h2>Preferred Partner</h2>
                            <div class="section-devider"></div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center gap-3">
                    <div class="col-lg-3 text-center">
                        <div class="preferred-data text-center" v-if="propertyDeveloper[0].developer_uri">
                            <img :src="propertyDeveloper[0].developer_uri" width="150px" height="70px" alt=""
                                 class="rera-logo">
                        </div>

                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="preferred-data">
                            <img :src="'/images/logo.png'" width="150px" height="70px" alt="" class="rera-logo"/>
                        </div>
                    </div>

                </div>
                <div class="row align-items-center justify-content-center gap-3">
                    <div class="col-lg-3 text-center">
                        <div class="preferred-data text-center">
                            <p class="mt-2" v-if="property.regulatory_approval_detail">{{ property.title }} RERA NO -
                                {{ property.regulatory_approval_detail }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="preferred-data">
                            <p class="mt-2">1homes RERA NO - A52100047637</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="cta">
        <a class=" btn btn-data btn-getstarted scrollto" href="tel:9028873985"><i class="bi bi-telephone"></i>
            9028873985</a>
    </div>
    <div class="cta-btn-data">
        <a class="btn btn-data" data-bs-toggle="modal" data-bs-target="#downloadModal" href="#" @click="openDownloadBrochureModal">Download Brochure</a>
    </div>
    <FooterSection/>
  <div class="modal fade" id="requestCallBackModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><em>Request A Call Back</em></h5>
<!--          <h5 class="modal-title"><em>Request A Call Back - {{ property.title }}</em></h5>-->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body request-body">
          <RequestCallBackPropertyModal v-bind:sector="selectedSector" v-bind:unit="selectedUnit" v-bind:property="property" />
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="callbackRequestReceivedModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thank you</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">Thank you for your interest, our real estate expert will get back to you.</div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="downloadBrochureModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Download Brochure</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body request-body">
          <DownloadBrochureModal v-bind:property="property" />
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import {Head, Link} from "@inertiajs/vue3";
import FooterSection from "@/Components/FooterSection.vue";
import AOS from 'aos';
import {computed, onMounted, ref} from "vue";
import {tns} from "tiny-slider";
import {Modal, Carousel} from "bootstrap";
import RequestCallBackPropertyModal from "@/Components/RequestCallBackPropertyModal.vue";
import DownloadBrochureModal from "@/Components/DownloadBrochureModal.vue";

const props = defineProps({
    property: Object,
    similarProperties: Array(Object),
    query_min_area: String,
    query_max_area: String,
    query_min_price: String,
    query_max_price: String,
    query_unit_type: String,
    query_locality: String,
    requested_call_back: String,
    property_locality: Array(Object),
    propertyDeveloper: Array(Object),
});

let slide = ref('');
const selectedSector = ref('');
const selectedUnit = ref('');

const hasFloorPlanVariations = computed(() => {
    return props.property.sectors.some(sector =>
        sector.units.some(unit =>
            unit.variations.some(variation =>
                variation.layout_uri
            )
        )
    );
});

const aggregatedTowers = computed(() => {
    const uniqueTowers = new Set(
        props.property.sectors
            .filter(sector => sector.towers)
            .map(sector => sector.towers)
    );
    return [...uniqueTowers].join(', ');
});

const aggregatedFlats = computed(() => {
    const uniqueFlats = new Set(
        props.property.sectors
            .filter(sector => sector.number_of_units)
            .map(sector => sector.number_of_units)
    );
    return [...uniqueFlats].join(', ');
})

const hasTowers = computed(() => {
    return props.property.sectors.some(sector => sector.towers);
});

const hasFlats = computed(() => {
    return props.property.sectors.some(sector => sector.number_of_units);
})

function slideNext() {
    slide.value.goTo('next');
}

function slidePrev() {
    slide.value.goTo('prev');
}

function openRequestCallBackModal() {
    selectedSector.value = null;
    selectedUnit.value = null;
    let modal = new Modal('#requestCallBackModal', {
        backdrop: true
    });
    modal.show();
}

function openRequestCallBackForUnitModal(sector, unit) {
    selectedSector.value = sector;
    selectedUnit.value = unit;
    let modal = new Modal('#requestCallBackModal', {
        backdrop: true
    });
    modal.show();
}

function openCallbackRequestReceivedModal() {
    let modal = new Modal('#callbackRequestReceivedModal', {
        backdrop: true
    });
    modal.show();
}

function openDownloadBrochureModal() {
    let modal = new Modal('#downloadBrochureModal', {
        backdrop: true
    });
    modal.show();
}

onMounted(() => {
    if (props.requested_call_back === 'registered') {
        openCallbackRequestReceivedModal();
    }
    AOS.init();
    if (document.getElementById('owl-specification-carousel')) {
        slide.value = tns({
            container: '#owl-specification-carousel',
            items: 3,
            slideBy: 'page',
            autoplay: true,
            mode: 'carousel',
            mouseDrag: true,
            swipeAngle: false,
            speed: 400,
            controls: false,
            controlsContainer: false,
            prevButton: false,
            nextButton: false,
            nav: false,
            navContainer: false,
            autoplayButtonOutput: false,
            autoplayTimeout: 3000,
            dots: false,
            loop: true,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    }

    if (document.getElementById('owl-gallery-carousel')) {
        slide.value = tns({
            container: '#owl-gallery-carousel',
            items: 3,
            slideBy: 'page',
            autoplay: true,
            mode: 'carousel',
            mouseDrag: true,
            swipeAngle: false,
            speed: 400,
            controls: false,
            controlsContainer: false,
            prevButton: false,
            nextButton: false,
            nav: false,
            navContainer: false,
            autoplayButtonOutput: false,
            autoplayTimeout: 3000,
            dots: false,
            loop: true,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    }
});
</script>


<style lang="scss" scoped>
@import "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css";
@import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css";
@import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css";
@import '/public/css/curated-apartment.style.css';
@import '/public/css/curated-apartment.slider.css';
@import '/public/css/curated-apartment.responsive.css';
@import '/node_modules/bootstrap-icons/font/bootstrap-icons.css';

.chart-section {
    padding: 20px;
    background-color: #fff;
}

.chart-section h2 {
    text-align: center;
    margin-bottom: 20px;
}
</style>
<style scoped>
* {
    font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}

.header-data-top {
    box-shadow: 0 2px 15px 2px rgba(0, 0, 0, 0.4);
    padding: 5px 0;
    transition: all 0.5s;
    z-index: 997;
    background: #fff;
}

.header.sticked {
    background: #fff;
    box-shadow: 0px 2px 20px rgba(#000, 0.1);
    background: #fff;
}

.header .logo h1 {
    font-size: 32px;
    font-weight: 300;
    margin-bottom: 0;
}

.header .logo h1 span {
    font-weight: 500;
}

.header .btn-getstarted, .header .btn-getstarted:focus {
    font-size: 16px;
    color: #fff;
    background: #1a4848;
    padding: 8px 10px;
    border-radius: 4px;
    transition: 0.3s;
    font-family: "Anek Devanagari";
    line-height: 1.7;
}

.header .btn-getstarted:hover, .header .btn-getstarted:focus:hover {
    color: #fff;
    background: #1a4848;
}

@media (max-width: 1279px) {
    .header .btn-getstarted,
    .header .btn-getstarted:focus {
        margin-right: 50px;
    }
}

@media (min-width: 1280px) {
    .navbar {
        padding: 0;
        position: relative;
    }

    .navbar ul {
        margin: 0;
        padding: 0;
        display: flex;
        list-style: none;
        align-items: center;
    }

    .navbar li {
        position: relative;
    }

    .navbar > ul > li {
        white-space: nowrap;
    }

    .navbar a,
    .navbar a:focus {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 6px 10px;
        font-family: "Anek Devanagari";
        font-size: 16px;
        font-weight: 400;
        color: #000;
        white-space: nowrap;
        transition: 0.3s;
        position: relative;
    }

    .navbar a i,
    .navbar a:focus i {
        font-size: 12px;
        line-height: 0;
        margin-left: 5px;
    }

    .navbar > ul > li > a:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #717275;
        visibility: hidden;
        transition: all 0.3s ease-in-out 0s;
        transform: scaleX(0);
        transition: all 0.3s ease-in-out 0s;
    }

    .navbar a:hover:before,
    .navbar li:hover > a:before,
    .navbar .active:before {
        visibility: visible;
        transform: scaleX(0.7);
    }

    .navbar a:hover,
    .navbar .active,
    .navbar .active:focus,
    .navbar li:hover > a {
        color: #717275;
    }

    .navbar .dropdown a:hover:before,
    .navbar .dropdown:hover > a:before,
    .navbar .dropdown .active:before {
        visibility: hidden;
    }

    .navbar .dropdown a:hover,
    .navbar .dropdown .active,
    .navbar .dropdown .active:focus,
    .navbar .dropdown:hover > a {
        color: #fff;
        background: #485664;
    }

    .navbar .dropdown ul {
        display: block;
        position: absolute;
        left: 0;
        top: 100%;
        margin: 0;
        padding: 0 0 10px 0;
        z-index: 99;
        opacity: 0;
        visibility: hidden;
        background: #485664;
        transition: 0.3s;
    }

    .navbar .dropdown ul li {
        min-width: 200px;
    }

    .navbar .dropdown ul a {
        padding: 10px 20px;
        font-size: 15px;
        text-transform: none;
        font-weight: 400;
        color: #fff;
    }

    .navbar .dropdown ul a i {
        font-size: 12px;
    }

    .navbar .dropdown ul a:hover,
    .navbar .dropdown ul .active,
    .navbar .dropdown ul .active:hover,
    .navbar .dropdown ul li:hover > a {
        color: #fff;
        background: #717275;
    }

    .navbar .dropdown:hover > ul {
        opacity: 1;
        visibility: visible;
    }

    .navbar .megamenu {
        position: static;
    }

    .navbar .megamenu ul {
        right: 0;
        padding: 10px;
        display: flex;
    }

    .navbar .megamenu ul li {
        flex: 1;
    }

    .navbar .megamenu ul li a,
    .navbar .megamenu ul li:hover > a {
        color: #fff;
        background: none;
    }

    .navbar .megamenu ul li a:hover,
    .navbar .megamenu ul li .active,
    .navbar .megamenu ul li .active:hover {
        color: #fff;
        background: #717275;
    }

    .navbar .dropdown .dropdown ul {
        top: 0;
        left: calc(100% - 30px);
        visibility: hidden;
    }

    .navbar .dropdown .dropdown:hover > ul {
        opacity: 1;
        top: 0;
        left: 100%;
        visibility: visible;
    }
}

@media (min-width: 1280px) and (max-width: 1366px) {
    .navbar .dropdown .dropdown ul {
        left: -90%;
    }

    .navbar .dropdown .dropdown:hover > ul {
        left: -100%;
    }
}

@media (max-width: 1279px) {
    .navbar {
        position: fixed;
        top: 0;
        left: -100%;
        width: calc(100% - 70px);
        bottom: 0;
        transition: 0.3s;
        z-index: 9997;
    }

    .navbar ul {
        position: absolute;
        inset: 0;
        padding: 10px 0;
        margin: 0;
        background: rgba(var(--color-secondary-rgb), 0.9);
        overflow-y: auto;
        transition: 0.3s;
        z-index: 9998;
    }

    .navbar a, .navbar a:focus {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        white-space: nowrap;
        transition: 0.3s;
    }

    .navbar a i,
    .navbar a:focus i {
        font-size: 12px;
        line-height: 0;
        margin-left: 5px;
    }

    .navbar a:hover,
    .navbar .active,
    .navbar .active:focus,
    .navbar li:hover > a {
        color: #fff;
    }

    .navbar .dropdown ul,
    .navbar .dropdown .dropdown ul {
        position: static;
        display: none;
        padding: 10px 0;
        margin: 10px 20px;
        transition: all 0.5s ease-in-out;
        border: 1px solid #8f9fae;
    }

    .navbar .dropdown > .dropdown-active,
    .navbar .dropdown .dropdown > .dropdown-active {
        display: block;
    }

    .mobile-nav-toggle {
        display: none !important;
        color: #485664;
        font-size: 28px;
        cursor: pointer;
        line-height: 0;
        transition: 0.5s;
        position: fixed;
        top: 20px;
        z-index: 9999;
        right: 20px;
    }

    .mobile-nav-toggle.bi-x {
        color: #fff;
    }

    .mobile-nav-active {
        overflow: hidden;
        z-index: 9995;
        position: relative;
    }

    .mobile-nav-active .navbar {
        left: 0;
    }

    .mobile-nav-active .navbar:before {
        content: "";
        position: fixed;
        inset: 0;
        background: rgba(72, 86, 100), 0.8;
        z-index: 9996;
    }
}

.cta {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 50%;
    z-index: 999;
}

.cta .btn {
    border-radius: 0 !important;
    width: 95%;
    height: 35px;
    padding: 4px;
    color: #fff;
    font-size: 18px;
}

.cta-btn-data {
    position: fixed;
    bottom: 0;
    right: 0;
    width: 50%;
    z-index: 999;
}

.cta-btn-data .btn {
    border-radius: 0 !important;
    width: 100%;
    height: 35px;
    padding: 4px;
    color: #fff;
    font-size: 18px;
}

.btn-data {
    background-color: #1a4848;
    border: 1px solid #1a4848;
    color: #fff;
}

.btn-data:hover {
    background-color: #1a4848;
    border: 1px solid #1a4848;
    color: #fff;
}

section {
    padding: 40px 0;
    overflow: hidden;
}

.section-header {
    text-align: center;
    padding-bottom: 0px;
}

.section-header h2 {
    font-family: "Poppins";
    font-size: 25px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #000000;
}

.section-devider {
    width: 300px;
    border-top: 4px solid #193F3F;
    margin: auto;
    margin-bottom: 15px;
}

.rera-logo {
    object-fit: contain;
}

.nav-pills .nav-link {
    border-radius: 2px;
    background: #d5d5d5;
    color: #000000;
    padding-bottom: 3px;
    font-size: 16px;
    font-weight: 500;
}

.nav-pills .nav-link.active {
    background-color: #717275;
    color: #fff;
    font-size: 16px;
    font-weight: 500;
}

.apartment-table {
    border: 1px solid #ccc;
    margin: 0px auto;
    width: 100%;
}

.apartment-table th {
    text-transform: uppercase;
    color: #fff;
    border-top: 1px solid #717275;
    border-bottom: 1px solid #717275;
    vertical-align: middle;
    font-weight: normal;
    font-size: 18px;
    padding: 15px 15px !important;
    background: #717275;
    text-align: center;
}

.apartment-table td {
    padding: 8px;
    font-size: 14px;
    text-align: center;
}

.mahindra-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));

    min-height: 100vh;
    background-size: cover;
    background-position: center;
    position: relative;
}

.hero-text h2 {
    font-size: 45px;
    text-align: right;
}

.hero-text {
    margin-top: 40px;
}

.text-data {
    font-weight: 800;
}

.amenities-data img {
    margin: 0 auto;
}

.qr-data {
    margin: 0 auto;
}

.rera-logo {
    object-fit: contain;
}

.carousel3 {
    position: relative;
}

.carousel3 .item img {
    width: 100%;
    height: 425px;
    object-fit: cover;
}

.carousel3 .owl-prev,
.carousel3 .owl-next {
    font-size: 50px !important;
    width: 45px;
    height: 45px;
    text-align: center;
    position: absolute;
    color: #000 !important;
    background-color: #ddd !important;
    border-radius: 0 !important;
    display: flex !important;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.carousel3 .owl-prev {
    top: 50%;
    left: -5px;
    transform: translateY(-50%);
}

.carousel3 .owl-next {
    top: 50%;
    right: -5px;
    transform: translateY(-50%);
}

.preferred-data {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.modal-header {
  background-color: #1a4849;
  color: #fff;
}

.request-body {
  background-color: #1a4849eb;
  border: none;
  color: #fff;
}
</style>
