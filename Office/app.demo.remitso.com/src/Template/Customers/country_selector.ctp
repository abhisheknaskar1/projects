<?php
use App\View\AppView;
/**
 * @var AppView $this
 * @var array $countries
 */
$titleForLayout = "Country Of Residence";
$metaDescriptionForLayout = "Send Or Transfer Money to Africa and Europe. International Remit Money To Bank Transfers, Cash Pick, Mobile Wallet top-up. DemoApp charges low fees.";
$metaOgTitleForLayout = "Transfer Or Send Remit Money With Low Fees | DemoApp";
$metaOgDescriptionForLayout = "Send Or Transfer Money to Africa and Europe. International Remit Money To Bank Transfers, Cash Pick, Mobile Wallet top-up. DemoApp charges low fees.";
$this->assign('titleForLayout', $titleForLayout);
$this->assign('metaDescriptionForLayout', $metaDescriptionForLayout);
$this->assign('metaOgTitleForLayout', $metaOgTitleForLayout);
$this->assign('metaOgDescriptionForLayout', $metaOgDescriptionForLayout);

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    .ui.fluid.input>input
    {
        width: 100% !important;
    }
    .ui[class*="left icon"].input>i.icon
    {
        left: 12px;
    }
    .square-sm
    {
        width: 26px !important;
        height: 26px !important;
    }
    .country-link
    {
        display: flex;
        align-items: center;
        width: 100%;
        background: #d8dfec;
        padding: 5px 10px;
        border-radius: 7px;
        box-shadow: 0 2px 6px 0 rgb(67 89 113 / 12%);
        line-height: 3;
    }
    .country-link:hover
    {
        text-decoration: none;
    }
    .country-link i.bx
    {
        font-size: 1.5rem;
    }
    #header {
        transition: all 0.5s;
        z-index: 997;
        padding: 16px 0;
        top: 0px; }
    #header .logo {
        font-size: 32px;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-weight: 700;
        letter-spacing: 0.5px;
        font-family: 'Inter', sans-serif; }
    #header .logo a {
        color: #2c4964; }
    #header .logo img {
        width: 200px;
    }
</style>
<main id="main" class="">
<section class="pt-5 pb-5 country-list-section">
    <div class="container">
        <?php echo $this->Flash->render(); ?>
        <div class="row no-gutters">
            <div class="pb-3">
                <h3 class="section-heading mb-0 text-theme font-weight-bold"><?php echo __('Select your country of residence')?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ui fluid left icon mt-4">
                <div class="w-100 row" id="countryList">
                    <?php foreach ( $countries as $country ) { ?>
                        <div class="col-xl-3 col-lg-3 text-truncate mb-2">
                            <div>
                                <a class="country-link text-dark mb-3" href="<?php echo $this->Url->build([
                                    "action" => "country",
                                    "_base" => $locale,
                                    $country["slug"]
                                ]); ?>"><i class="flag-icon square-sm flag-icon-<?php echo strtolower($country["iso_code_alpha2"]); ?> flag-icon-squared rounded-circle icon mr-2"></i><strong><?php echo $country["known_name"]; ?></strong><i class="bx bx-chevron-right ml-auto" style=""></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery.expr[':'].Contains = function(a, i, m) {
        return jQuery(a).text().toUpperCase()
            .indexOf(m[3].toUpperCase()) >= 0;
    };
    function searchList(searchTerm) {
        if ( searchTerm != "" ) {
            $("#countryList").children().each(function(item){
                $(this).addClass("d-none");
            });
            $("#countryList").find("div:contains('"+searchTerm+"')").each(function(item){
                $(this).removeClass("d-none");
            });
        } else {
            $("#countryList").children().each(function(item){
                $(this).removeClass("d-none");
            });
        }
    }
    $(function(){
        $("input[type='search']").keyup(function(e){
            var searchTerm = $.trim($(this).val());
            searchList(searchTerm);
        });
        $("input[type='search']").change(function(e){
            var searchTerm = $.trim($(this).val());
            searchList(searchTerm);
        });
    });
</script>
