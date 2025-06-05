<template>
    <!-- Change or deletion of the name attributes in the input tag will lead to empty values on record submission-->
    <form action="https://forms.zohopublic.in/1homes/form/ProjectBrochure23/formperma/vbYugY3xaprkvweWCEx0znV_AnPzKVTyFuRRnjYg0WU/htmlRecords/submit" method="post" accept-charset='UTF-8' enctype='multipart/form-data'>
      <input type="hidden" name="zf_referrer_name" />
      <!-- To Track referrals , place the referrer name within the " " in the above hidden input field -->
      <input type="hidden" name="zf_redirect_url" :value="property.requested_call_back_url">
      <!-- To redirect to a specific page after record submission , place the respective url within the " " in the above hidden input field -->
      <input type="hidden" name="zc_gad" />
      <!-- If GCLID is enabled in Zoho CRM Integration, click details of AdWords Ads will be pushed to Zoho CRM -->
      <input type="hidden" name="utm_source" />
      <input type="hidden" name="utm_medium" />
      <input type="hidden" name="utm_campaign" />
      <input type="hidden" name="utm_term" />
      <input type="hidden" name="utm_content" />
      <!--Name-->
      <div class="form-group mb-3">
        <label class="form-label"> Please Share Your Name<em style="color: red">*</em></label>
        <div class="row">
          <div class="col-6">
            <input type="text" required class="form-control" maxlength="255" name="Name_First" fieldType=7 placeholder=""/>
          </div>
          <div class="col-6">
            <input type="text" required class="form-control" maxlength="255" name="Name_Last" fieldType=7 placeholder=""/>
          </div>
        </div>
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Mobile Number or WhatsApp<em style="color: red">*</em></label>
        <input type="text" required compname="PhoneNumber" class="form-control" name="PhoneNumber_countrycode" phoneFormat="1" isCountryCodeEnabled=false maxlength="20" value="" fieldType=11 id="international_PhoneNumber_countrycode" placeholder="" />
      </div>
      <!--Email-->
      <div class="form-group mb-3">
        <label class="form-label"> Please share your email</label>
        <input type="email" class="form-control" maxlength="255" name="Email" value="" fieldType=9 placeholder="you&#x40;domain.com"/>
      </div>
      <input type="hidden" name="SingleLine" :value="property.code" fieldType=1 maxlength="255" placeholder=""/>
      <button type="submit" class="btn-sumit-required">Download Brochure</button>
    </form>
</template>
<script setup>
const props = defineProps({
  property: Object
});
</script>
