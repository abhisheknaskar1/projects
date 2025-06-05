<template>
  <Head>
    <title>1Homes</title>
  </Head>
  <Navbar/>
  <div class="wp-chat">
    <a href="https://wa.me/+919028873985?text=Hi! I'm interested in learning more about your properties and how they can meet my needs."
       target="_blank">
      <img :src="'/images/whatsApp_icon.webp'" alt="" class="whats-app-btn"/>
    </a>
  </div>
  <section class="home-section-one">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 data-aos="fade-right" data-aos-duration="2000">Real <span id="slider">Homes</span> <br/>Real Easy</h2>
          <!--          <img :src="'images/home-sec-one-bg.png'" alt=""/>-->
        </div>
      </div>
      <!-- Search Form Section -->
      <div class="col-md-12 mb-5 px-5">
        <form @submit.prevent="searchForm.get(route('property_listing'))">
          <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <select v-model="searchForm.category" id="browse-properties" class="form-select" aria-label="Browse Homes By">
                  <option value="">Looking For</option>
                  <option v-for="category in categories" :value="category.code">{{ category.title }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <div class="row">
                  <div class="col-lg-6">
                    <select v-model="searchForm.min_price" id="price-min" class="form-select mb-0" aria-label="Default select example">
                      <option value="">Minimum Price</option>
                      <option v-for="minPrice in minPriceFilterOptions" :value="minPrice.id">{{ minPrice.value }}</option>
                    </select>
                  </div>
                  <div class="col-lg-6">
                    <select v-model="searchForm.max_price" id="price-max" class="form-select mb-0" aria-label="Default select example">
                      <option value="">Maximum Price</option>
                      <option v-for="maxPrice in maxPriceFilterOptions" :value="maxPrice.id">{{ maxPrice.value }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <select v-model="searchForm.unit_type" id="flat-type" class="form-select mb-0" aria-label="Default select example">
                <option value="">Flat Type</option>
                <option v-for="type in unitTypes" :value="type.code">{{ type.title }}</option>
              </select>
            </div>            
           <div class="col-md-2">
              <select v-model="searchForm.locality" id="flat-type" class="form-select mb-0" aria-label="Default select example">
                <option value="">Location</option>
                <option v-for="locality in localities" :value="locality.code">{{ locality.title }}</option>
                 <!-- <input type="text" id="locality-search" placeholder="Search for a locality">
                 <ul id="locality-suggestions"></ul>  -->
              </select>
            </div>                     
            <div class="col-md-2">
              <button style="margin-top: 0; width: 100%; padding: 10px 20px;" type="submit" class="btn-sumit-required">Search</button>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <template v-for="pro in property">
              <div class="col-md-3 d-flex mb-3">
                <Transition name="bounce">
                  <div class="sec-curated-two-box">
                    <div class="card">
                      <div class="card-header">
                        <Link v-if="pro.property_category.code === 'curated-apartment'" :href="route('curated_apartment_view', {
                                                        code: pro.code,
                                                        min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })"><img :src="route('asset_property_image', {id: pro.images[0].id, file: pro.code + '-' + pro.images[0].file})" alt=""/> </Link>
                                                    <Link v-if="pro.property_category.code === 'exclusive-properties'" :href="route('exclusive_properties_view', {
                                                        code: pro.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })"><img :src="route('asset_property_image', {id: pro.images[0].id, file: pro.code + '-' + pro.images[0].file})" alt=""/> </Link>
                                                     <Link v-if="pro.property_category.code === 'sectorial-properties'" :href="route('sectorial_properties_view', {
                                                        code: pro.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })"><img :src="route('asset_property_image', {id: pro.images[0].id, file: pro.code + '-' + pro.images[0].file})" alt=""/> </Link>
                                                    <Link v-if="pro.property_category.code === 'plots-and-villas'" :href="route('plots_and_villas_view', {
                                                        code: pro.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })"><img :src="route('asset_property_image', {id: pro.images[0].id, file: pro.code + '-' + pro.images[0].file})" alt=""/> </Link>
                        
                        <!-- <img :src="route('asset_property_image', {id: pro.images[0].id, file: pro.code + '-' + pro.images[0].file})" alt=""/> -->
                      </div>
                      <div class="card-body">
                        <h4>{{ pro.title }}</h4>
                        <h3>{{ pro.price_bracket }} onwards</h3>
                        <h5 class="text-capitalize" v-if="pro.banner_content"><strong style="font-weight:600">Type :</strong> {{ pro.banner_content }}</h5>
                        <Link v-if="pro.property_category.code === 'curated-apartment'" :href="route('curated_apartment_view', {
                                                        code: pro.code,
                                                        min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })">View Details</Link>
                        <Link v-if="pro.property_category.code === 'exclusive-properties'" :href="route('exclusive_properties_view', {
                                                        code: pro.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })">View Details</Link>
                        <Link v-if="pro.property_category.code === 'sectorial-properties'" :href="route('sectorial_properties_view', {
                                                        code: pro.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })">View Details</Link>
                        <Link v-if="pro.property_category.code === 'plots-and-villas'" :href="route('plots_and_villas_view', {
                                                        code: pro.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })">View Details</Link>
                      </div>
                    </div>
                  </div>
                </Transition>
              </div>
            </template>
          </div>
        </div>
      </div>

    </div>
  </section>
  <section id="testimonials-data" class="home-section-eight" style="background-color: #F2F2F2">
    <h2 data-aos="fade-left" data-aos-duration="2000">what our customers are saying</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial" class="carousel slide">
            <div class="carousel-indicators" data-aos="fade-up" data-aos-duration="2000">
              <button type="button" data-bs-target="#testimonial" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#testimonial" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#testimonial" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#testimonial" data-bs-slide-to="3"
                      aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#testimonial" data-bs-slide-to="4"
                      aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="carousel-caption d-md-block">
                  <div class="testi-img-box">
                    <img :src="'images/team-5.jpg'" alt="" data-aos="fade-up"
                         data-aos-duration="2000"/>
                  </div>
                  <h4 data-aos="fade-up" data-aos-duration="2000">Amey Fanje</h4>
                  <h5 data-aos="fade-up" data-aos-duration="2000">Sr. Automotive Specialist </h5>
                  <p data-aos="fade-up" data-aos-duration="2000"><span class="quote-left"><i
                      class="fa-solid fa-quote-left"></i></span> 1Homes team is Best.
                      Me and my wife tried doing the buying process on our own at the beginning. But it was difficult being an NRI.
                 </p>
                 <p data-aos="fade-up" data-aos-duration="2000">
                      After one phone conversation with the 1Homes team about what we wanted in a home,
                      we had about 10 homes lined up later that week. Each one was exactly what we were looking for in our future home. We finalised the first one and made an offer later that day!
                 </p>
                 <p data-aos="fade-up" data-aos-duration="2000">
                      The entire process was smooth and professional. 1 Homes team is friendly, energetic, intentional and knows the market well. This team has our highest recommendation!
                <span class="quote-right"><i class="fa-solid fa-quote-right"></i></span></p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption d-md-block">
                  <div class="testi-img-box">
                    <img :src="'images/team-4.jpg'" alt="" data-aos="fade-up"
                         data-aos-duration="2000"/>
                  </div>
                  <h4 data-aos="fade-up" data-aos-duration="2000">Kaustubh Pathkhedkar</h4>
                  <h5 data-aos="fade-up" data-aos-duration="2000">Sr. Product Software Engineer Walter’s Kluwer India Pvt ltd</h5>
                  <p data-aos="fade-up" data-aos-duration="2000"><span class="quote-left"><i
                      class="fa-solid fa-quote-left"></i></span> I had a very seamless experience with 1Homes. They are highly professional, expert, and responsive with the entire process.
                       Right from consultation to closing of my deal with Kalpataru , guidance provided by Mr. Pankaj Ghogare was invaluable. I highly recommend 1Homes for anyone seeking a
                       reliable real estate agency.
                    <span class="quote-right"><i class="fa-solid fa-quote-right"></i></span></p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption d-md-block">
                  <div class="testi-img-box">
                    <img :src="'images/team-3.jpg'" alt="" data-aos="fade-up"
                         data-aos-duration="2000"/>
                  </div>
                  <h4 data-aos="fade-up" data-aos-duration="2000">Roopali Bodekar</h4>
                  <h5 data-aos="fade-up" data-aos-duration="2000">Global Head - L&D</h5>
                  <p data-aos="fade-up" data-aos-duration="2000"><span class="quote-left"><i
                      class="fa-solid fa-quote-left"></i></span> My experience with 1Homes exceeded my
                    expectations. Right from the initial consultation to the closing of my deal,
                    every step of the way was handled with professionalism and expertise.<span
                        class="quote-right"><i class="fa-solid fa-quote-right"></i></span></p>
                </div>
              </div>
              <div class="carousel-item ">
                <div class="carousel-caption d-md-block">
                  <div class="testi-img-box">
                    <img :src="'images/team-1.jpg'" alt="" data-aos="fade-up"
                         data-aos-duration="2000"/>
                  </div>
                  <h4 data-aos="fade-up" data-aos-duration="2000">Suyog Menkar</h4>
                  <p data-aos="fade-up" data-aos-duration="2000"><span class="quote-left"><i
                      class="fa-solid fa-quote-left"></i></span> My gratitude for the help that I have
                    received from 1Homes in finding right home for me. I appreciate your
                    professionalism, patience, and expertise throughout the process. You made
                    everything easy and stress free for me. <span class="quote-right"><i
                        class="fa-solid fa-quote-right"></i></span></p>
                </div>
              </div>            
              <div class="carousel-item">
                <div class="carousel-caption d-md-block">
                  <div class="testi-img-box">
                    <img :src="'images/team-2.jpg'" alt="" data-aos="fade-up"
                         data-aos-duration="2000"/>
                  </div>
                  <h4 data-aos="fade-up" data-aos-duration="2000">Vikas Gole</h4>
                  <h5 data-aos="fade-up" data-aos-duration="2000">Manager at Credit Suisse Pune</h5>
                  <p data-aos="fade-up" data-aos-duration="2000"><span class="quote-left"><i
                      class="fa-solid fa-quote-left"></i></span> I had an excellent experience with
                    1Homes. The process went extremely well because of their responsiveness,
                    professionalism, and knowledge. Their advice was really helpful, from the
                    initial meeting to the conclusion. <span class="quote-right"><i
                        class="fa-solid fa-quote-right"></i></span></p>
                </div>
              </div>            
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonial"
                    data-bs-slide="prev" data-aos="fade-right" data-aos-duration="2000">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonial"
                    data-bs-slide="next" data-aos="fade-left" data-aos-duration="2000">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="home-section-eight">
    <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="home-sec-one-right">
          <form @submit.prevent="searchForm.get(route('property_listing'))" class="mb-5" data-aos="fade-right"
                data-aos-duration="2000">
            <div class="mb-3">
              <label for="looking-for" class="home-label"><b>Find Your Dream Home with 1homes</b></label>
              <input v-model="searchForm.prompt" type="text" id="looking-for"
                     placeholder="Find me 1200 Sq. Ft. 3 BHK Apartment within 50 Lacs"
                     class="form-control form-control-lg"/>
              <button type="submit" data-aos="fade-right" data-aos-duration="2000" class="btn-sumit-required">
                Search
              </button>
            </div>

          </form>
          <!-- End Card-Item One -->
        </div>
      </div>
    </div>
    </div>
  </section>
  <section class="home-section-ten">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 data-aos="fade-up" data-aos-duration="2000">our partners</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="owl-partnerslider" class="owl-carousel owl-theme" data-aos="fade-right">
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/1.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/2.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/3.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/4.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/5.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/1.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/2.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/3.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/4.png'" class="img-fluid" alt=""/>
            </div>
            <div class="item" data-aos="fade-up" data-aos-duration="2000">
              <img :src="'images/logo/5.png'" class="img-fluid" alt=""/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <FooterSection/>
</template>

<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import {nextTick, onMounted, onUnmounted, ref} from "vue";
import {tns} from "tiny-slider";
import FooterSection from "@/Components/FooterSection.vue";
import AOS from 'aos';
import Navbar from "@/Components/Navbar.vue";
import {Modal, Carousel, Collapse} from "bootstrap";

const props = defineProps({
  categories: Array(Object({
    id: String,
    code: String,
    title: String,
    description: String,
  })),
  property: Object,
  unitTypes: Array(Object),
  apartmentLayouts: Array(Object),
  callBackUrl: String,
  requested_call_back: String,
  minPriceFilterOptions: Array(Object),
  maxPriceFilterOptions: Array(Object),
  localities: Array(Object)
});

const searchForm = useForm({
  prompt: '',
  category: '',
  min_price: '',
  max_price: '',
  unit_type: '',
  locality: ''
});

let slide = ref(null);

const placeholderPrompts = [
  'I am looking for a 3 BHK Apartment within 50 Lacs',
  'Show me 3 BHK Apartments within 50 Lacs',
  'Help me find a 1200 Sq. Ft. 3 BHK Apartment within 1 Crore',
];

const placeholderTypingSpeed = 60;

let placeholder = "";
let placeholderTextIndex = 0;

function startTyping(index) {
  let placeholderText = placeholderPrompts[index % 3];
  placeholder += placeholderText.charAt(placeholderTextIndex);
  document.getElementById('looking-for').setAttribute('placeholder', placeholder);
  placeholderTextIndex++;
  if (!placeholderText.charAt(placeholderTextIndex)) {
    placeholder = "";
    placeholderTextIndex = 0;
    index++;
  }
  setTimeout(() => {
    startTyping(index);
  }, placeholderTypingSpeed)
}

function searchProperties() {
  const params = new URLSearchParams();
  params.append('prompt', searchForm.prompt);
  window.location.href = `${route('property_listing')}?${params.toString()}`;
}

onMounted(() => {
  AOS.init();
  startTyping(0);

  tns({
    container: '#owl-partnerslider',
    items: 5,
    slideBy: 1,
    autoplay: true,
    mode: 'carousel',
    mouseDrag: true,
    swipeAngle: false,
    speed: 200,
    controls: false,
    nav: false,
    autoplayButtonOutput: false,
    loop: true
  });

  new Carousel('#testimonial');
  const collapseElementList = [...document.querySelectorAll('.collapse')];
  collapseElementList.forEach((collapseEl) => {
    new Collapse(collapseEl);
  });
});

onUnmounted(() => {
  AOS.refresh();
});
</script>

<style lang="scss" scoped>
@import "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css";
@import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css";
@import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css";

.carousel4 {
  display: flex !important;
}

.carousel4 > .tns-item {
  display: flex !important;
}

.carousel4 .btn-sumit-required {
  position: absolute;
  bottom: 10px;
}

.carousel4 .sec-curated-two-box .card-body {
  padding-bottom: 75px;
}

@media only screen and (max-width: 991px) {
  .carousel4 .btn-sumit-required {
    width: 92%;
  }
}

.owl-nav {
  display: flex;
  justify-content: space-between;
  position: absolute;
  top: 50%;
  width: 100%;
  transform: translateY(-50%);
  z-index: 10;
}

.owl-prev, .owl-next {
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
}

.owl-prev:hover, .owl-next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
</style>
