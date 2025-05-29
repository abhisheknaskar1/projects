<?php
use App\View\AppView;
use Cake\I18n\I18n;
use Cake\Utility\Text;
/**
 * @var AppView $this
 * @var string $title
 * @var string $desc
 * @var \DeviceDetector\DeviceDetector $deviceDetector
 */
?>
<!DOCTYPE html>
<html lang="<?php echo substr(I18n::getLocale(), 0, 2); ?>">

<head>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <title><?php echo $title ?? null;?></title>
    <?php echo $this->Html->css([
        "style",
        "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
        "/vendors/iconfonts/flag-icon/css/flag-icon.min",
        "/vendors/gdpr/gdpr-cookie",
        "/assets/vendor/bootstrap/css/bootstrap.min",
        "/assets/vendor/icofont/icofont.min",
        "/assets/vendor/boxicons/css/boxicons.min",
        "/assets/vendor/venobox/venobox",
    ]); ?>
    <?php echo $this->Html->script([
        "/vendors/js/vendor.bundle.base",
    ]); ?>
</head>
<body itemtype="http://schema.org/WebPage">
<?php if ( $deviceDetector->getOs("short_name") === "AND" && 1 === 2 ) { ?>
    <div class="card rounded-0" id="androidSmartBanner">
        <div class="card-body position-relative">
            <div class="media">
                <div class="float-left mr-2 mt-2">
                    <a href="javascript:" id="closeAndroidSmartBanner" style="font-size: 24px;"><span class="text-muted"><i class="mdi mdi-close"></i></span></a>
                </div>
                <img class="mr-3 rounded-circle" style="width: 50px;" src="https://play-lh.googleusercontent.com/V6cuq6rnONOWLX37_sBcG_w_HJbhH49q-6Nt4ixtNKmF2UvhbA87g17Gc9lvN6jEd60=s180-rw">
                <div class="media-body">
                    <h6 class="mt-1 mb-0"><?php echo __("DemoApp") ?></h6>
                    <p class="small mb-0 text-muted"><?php echo __("ABC Financials Ltd.") ?><br /><?php echo __("Get it on Google Play"); ?></p>
                </div>
                <div class="float-right small ml-3 mt-3">
                    <?php echo $this->Html->link(__("Open"), 'https://atlmt.page.link/open', [
                        'class' => 'btn btn-outline-theme btn-sm'
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php echo $this->element("header"); ?>
<?php echo $this->fetch("content"); ?>
<?php echo $this->element("footer"); ?>
<?php echo $this->Html->script([
    "/vendors/gdpr/gdpr-cookie",
    "/assets/js/main.js",
    "/assets/vendor/venobox/venobox.js",
]); ?>
<script type="text/javascript">
    $(function(){
        <?php if ( $deviceDetector->getOs("short_name") === "AND" ) { ?>
        let browserStorage = window.localStorage;
        console.log(browserStorage.getItem('hideAndroidSmartBanner'));
        $("#closeAndroidSmartBanner").click(function(){
            browserStorage.setItem('hideAndroidSmartBanner', "true");
            $("#androidSmartBanner").addClass("d-none");
        });
        if (browserStorage.getItem('hideAndroidSmartBanner') === "true") {
            $("#androidSmartBanner").addClass("d-none");
        }
        <?php } ?>
        $.gdprcookie.init({
            title: "<?php echo htmlentities(__(""), ENT_QUOTES); ?>",
            subtitle: "<?php echo htmlentities(__(""), ENT_QUOTES); ?>",
            message: "<?php echo htmlentities(__("This website uses cookies to ensure you get the best experience on our website. Cookies Policy."), ENT_QUOTES); ?>",
            delay: 2000,
            expires: 30,
            cookieName: "cookieControlPrefs",
            acceptReload: false,
            acceptBtnLabel: "<?php echo htmlentities(__("Got it!"), ENT_QUOTES); ?>",
            advancedBtnLabel: "<?php echo htmlentities(__("Customize cookies"), ENT_QUOTES); ?>",
            customShowMessage: undefined,
            customHideMessage: undefined,
            customShowChecks: undefined,
            cookieTypes: [
                {
                    type: "<?php echo htmlentities(__("Essential"), ENT_QUOTES); ?>",
                    value: "essential",
                    description: "<?php echo htmlentities(__("These are cookies that are essential for the website to work correctly."), ENT_QUOTES); ?>"
                },
                {
                    type: "<?php echo htmlentities(__("Site Preferences"), ENT_QUOTES); ?>",
                    value: "preferences",
                    description: "<?php echo htmlentities(__("These are cookies that are related to your site preferences, e.g. remembering your username, site colours, etc."), ENT_QUOTES); ?>"
                },
                {
                    type: "<?php echo htmlentities(__("Analytics"), ENT_QUOTES); ?>",
                    value: "analytics",
                    description: "<?php echo htmlentities(__("Cookies related to site visits, browser types, etc."), ENT_QUOTES); ?>"
                },
                {
                    type: "<?php echo htmlentities(__("Marketing"), ENT_QUOTES); ?>",
                    value: "marketing",
                    description: "<?php echo htmlentities(__("Cookies related to marketing, e.g. newsletters, social media, etc"), ENT_QUOTES); ?>"
                }
            ],
        });
    });
</script>
</body>
</html>
