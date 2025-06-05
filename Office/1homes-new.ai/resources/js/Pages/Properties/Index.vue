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
    <section class="section-curated-two" id="main-curated">
        <div class="container">
            <div class="row" v-if="isSearching">
                <div class="col-md-6 offset-3" style="background: #eeeeee;">
                    <div class="p-5">
                        <img :src="'/images/loading.gif'" style="width: 300px; margin: 0 auto" alt="" />
                        <h3 class="mt-5 mb-4 text-center">Searching for best properties for your query</h3>
                        <p class="mb-4 text-center" style="font-weight: 400">{{ prompt }}</p>
                        <h4 class="mb-4 text-center" style="font-weight: 400">Did you know?</h4>
                        <small>{{ heroText }}</small>
                    </div>
                </div>
            </div>
            <template v-else>
                <div class="row search-box" v-if="properties.length > 0">
                    <div class="col-md-12 mb-5">
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
                                                    <option value="0">Minimum Price</option>
                                                    <option v-for="minPrice in minPriceFilterOptions" :value="minPrice.id">{{ minPrice.value }}</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <select v-model="searchForm.max_price" id="price-max" class="form-select mb-0" aria-label="Default select example">
                                                    <option value="0">Maximum Price</option>
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
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button style="margin-top: 0; width: 100%; padding: 5px 20px;" type="submit" class="btn-sumit-required">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" v-if="properties.length > 0">
                    <div class="col-md-12">
                        <div class="row">
                            <template v-for="(propertyGroup, index) in properties">
                                <div class="col-md-3 d-flex mb-3" v-for="property in propertyGroup">
                                    <Transition name="bounce">
                                        <div v-if="properties.length > 0" class="sec-curated-two-box">
                                            <div class="card">
                                                <div v-if="property.images.length > 0" class="card-header">
                                                    <img :src="route('asset_property_image', {id: property.images[0].id, file: property.code + '-' + property.images[0].file})" alt="" />
                                                </div>
                                                <div class="card-body">
                                                    <h4>{{ property.title }}</h4>
                                                    <h3>{{ property.price_bracket }} onwards</h3>
                                                    <!--                                                    <p style="text-align: justify"><small>{{ property.truncated_summary }}</small></p>-->
                                                    <!--                                                    <h6 style="letter-spacing: 0.80px"><small>{{ property.address }}</small></h6>-->
                                                    <!--                                                    <h5 class="text-capitalize"><strong style="font-weight:600">type :</strong> {{ property.units }}</h5>-->
                                                    <h5 class="text-capitalize" v-if="property.banner_content"><strong style="font-weight:600">Type :</strong> {{ property.banner_content }}</h5>
                                                    <p><strong>Possession:</strong> <small>{{property.possession}}</small></p>
                                                    <!--                                                    <p><small>{{ property.city_center_distance }} KM from Pune City Center</small></p>-->
                                                    <Link v-if="property.property_category.code === 'curated-apartment'" :href="route('curated_apartment_view', {
                                                        code: property.code,
                                                        min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })">View Details</Link>
                                                    <Link v-if="property.property_category.code === 'exclusive-properties'" :href="route('exclusive_properties_view', {
                                                        code: property.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })">View Details</Link>
                                                  <Link v-if="property.property_category.code === 'sectorial-properties'" :href="route('sectorial_properties_view', {
                                                        code: property.code,
                                                           min_area: searchedMinArea,
                                                        max_area: searchedMaxArea,
                                                        min_price: searchedMinPrice,
                                                        max_price: searchedMaxPrice,
                                                        unit_type: searchedUnitType,
                                                        locality: searchedLocality,
                                                        property_locality: searchedUnitType,
                                                    })">View Details</Link>
                                                  <Link v-if="property.property_category.code === 'plots-and-villas'" :href="route('plots_and_villas_view', {
                                                        code: property.code,
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
                <template v-else>
                    <div class="row" style="background: #eeeeee;">
                        <div class="col-md-6" style="margin: 0 auto">
                            <div class="p-5 text-muted">
                                <h1 class="text-center">Looks like you have a specific requirement</h1>
                                <h6 class="mt-5 mb-4 text-center">
                                    No worries, we’ve got you covered!
                                </h6>
                                <a href="https://wa.me/+919028873985?text=Hi! I'm Interested, please tell me more" target="_blank">
                                    <button style="margin-bottom: 10px; width: 100%; padding: 5px; border: 1px solid #1a4748; background-color: #1a4748; color: #FFFFFF" type="submit">
                                        Share Your Requirement
                                    </button>
                                </a>
                                <!--                                <button style="margin-bottom: 10px; width: 100%; padding: 5px;" type="submit" @click="openRequestRequirementModel()" class="btn-sumit-required">Get a Call Back</button>-->
                            </div>
                        </div>
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
                                    </select>
                                  </div>
                                    <div class="col-md-2">
                                        <button style="margin-top: 0; width: 100%; padding: 5px 20px;" type="submit" class="btn-sumit-required">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </template>
            </template>
        </div>
    </section>
    <FooterSection />
    <div class="modal fade" id="requestCallBackModal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Help Us Know Your Requirement Better</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <RequestRequirementModel v-bind:call_back_url="callBackUrl"/>
                </div>
            </div>
        </div>
    </div>
    <!--    <div class="modal fade" id="callbackRequestReceivedModal" tabindex="-1" aria-modal="true" role="dialog">-->
    <!--        <div class="modal-dialog modal-lg modal-dialog-centered">-->
    <!--            <div class="modal-content">-->
    <!--                <div class="modal-header">-->
    <!--                    <h5 class="modal-title">Thank You for Sharing Your Requirements!</h5>-->
    <!--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">-->
    <!--                        <span aria-hidden="true"></span>-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--                <div class="modal-body">-->
    <!--                    Our team is actively searching for properties that match your criteria and will reach out to you-->
    <!--                    with potential options soon.-->
    <!--                </div>-->
    <!--                <div class="modal-body">-->
    <!--                    Meanwhile, feel free to explore other listings on the-->
    <!--                    <Link :href="route('landing')">website</Link>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
</template>
<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import {ref, onMounted} from "vue";
import Navbar from "@/Components/Navbar.vue";
import FooterSection from "@/Components/FooterSection.vue";
import axios from "axios";
import RequestRequirementModel from "@/Components/RequestRequirementModel.vue";
import { Modal } from "bootstrap";

const props = defineProps({
    prompt: String,
    heroText: String,
    categories: Array(Object),
    minPriceFilterOptions: Array(Object),
    maxPriceFilterOptions: Array(Object),
    unitTypes: Array(Object),
    // propertyLocalities: Array(Object),
   localities: Array(Object),
    query_category: String,
    query_min_price: String,
    query_max_price: String,
    query_unit_type: String,
    query_locality: String,
    callBackUrl: String,
    requested_call_back: String,
})
const searchForm = useForm({
    category: props.query_category,
    min_area: '',
    max_area: '',
    min_price: props.query_min_price,
    max_price: props.query_max_price,
    unit_type: props.query_unit_type,
    locality: props.query_locality,
});
const properties = ref([]);
const isSearching = ref(false);

const searchedMinArea = ref('');
const searchedMaxArea = ref('');
const searchedMinPrice = ref('');
const searchedMaxPrice = ref('');
const searchedUnitType = ref('');
const searchedLocality = ref('');

let triviaText = "";
let triviaIndex = 0;
function typeTrivia() {
    triviaText += props.heroText.charAt(triviaIndex);
    document.getElementById('trivia-text').innerText = triviaText;
    if (props.heroText.charAt(triviaIndex)) {
        triviaIndex++;
        setTimeout(() => {
            typeTrivia();
        }, 20);
    } else {
        document.getElementById('cursor').remove();
    }
}
function openRequestRequirementModel() {
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
onMounted(() => {
    isSearching.value = true;
    if (props.requested_call_back === 'registered') {
        openCallbackRequestReceivedModal();
    }
    axios.get(route('properties_json', {
        prompt: props.prompt,
        category: searchForm.category,
        min_area: searchForm.min_area,
        max_area: searchForm.max_area,
        min_price: searchForm.min_price,
        max_price: searchForm.max_price,
        unit_type: searchForm.unit_type,
        locality: searchForm.locality,
    })).then(function (response) {
        searchForm.category = response.headers.get('category');
        searchForm.min_area = searchedMinArea.value = response.headers.get('min_area');
        searchForm.max_area = searchedMaxArea.value = response.headers.get('max_area');
        searchForm.min_price = searchedMinPrice.value = response.headers.get('min_price');
        searchForm.max_price = searchedMaxPrice.value = response.headers.get('max_price');
        searchForm.unit_type = searchedUnitType.value = response.headers.get('unit_type');
        searchForm.locality = searchedLocality.value = response.headers.get('locality');
        for (const property of response.data) {
            properties.value.push(property);
        }
        if (response.data.length > 0) {
            setTimeout(typeTrivia, 5);
        }
    })
        .catch(function (error) {
        })
        .finally(function () {
            isSearching.value = false;
        });
});
</script>
<style scoped>
.bounce-enter-active {
    animation: bounce-in 1s;
}
.bounce-leave-active {
    animation: bounce-in 1s reverse;
}
@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.20);
    }
    100% {
        transform: scale(1);
    }
}
</style>
