<?php

use App\View\AppView;

/**
 * @var AppView $this
 * @var string $titleForLayout
 * @var string $title
 * @var string $desc
 */

use Cake\Routing\Router;

$currentUrl = Router::url($this->request->getRequestTarget(), true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $titleForLayout ?? __(''); ?></title>

    <meta name="title" content="<?php echo $titleForLayout ?? __(''); ?>">
    <meta name="description" content="<?php echo $desc ?? __(''); ?>" />

    <meta name="robots" content="index, follow">
    <meta name="author" content="RemitSo">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta property="og:title" content="<?php echo $titleForLayout ?? __(''); ?>" />
    <meta property="og:description" content="<?php echo $desc ?? __(''); ?>">
    <meta property="og:url" content="<?php echo h($currentUrl); ?>">
    <meta property="og:image" content="https://www.remitso.com/img/index/dashboard-mob.png">
    <meta property="linkedin:image" content="https://www.remitso.com/img/index/dashboard-mob.png">
    <meta name="linkedin:card" content="summary_large_image">




    <link rel="canonical" href="<?php echo h($currentUrl); ?>">
    <link rel="icon" href="<?php echo $this->Url->image('/icons/favicon.png') ?>" type="image/png" sizes="16x16">

    <!-------------------pagesense--------------------->
    <script src="https://cdn-in.pagesense.io/js/remitso263/917bca6077e84fa99a97be1f593d73d3.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KR1M9XHKS8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KR1M9XHKS8');
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16700815323"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16700815323');
    </script>

    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "nij79fbej9");
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11335856010">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-11335856010');
    </script>

    <script>
        (function(w, d, s, c, r, a, m) {
            w['KiwiObject'] = r;
            w[r] = w[r] || function() {
                (w[r].q = w[r].q || []).push(arguments)
            };
            w[r].l = 1 * new Date();
            a = d.createElement(s);
            m = d.getElementsByTagName(s)[0];
            a.async = 1;
            a.src = c;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', "https://app.interakt.ai/kiwi-sdk/kiwi-sdk-17-prod-min.js?v=" + new Date().getTime(), 'kiwi');
        window.addEventListener("load", function() {
            kiwi.init('', 'y6GNXFY3KVmRcDO9BhcUsHZzyOuRFcY7', {});
        });
    </script>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '892085349374763');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=892085349374763&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <meta name="algolia-site-verification" content="A2855E915E69BD02" />

    <script type="text/javascript">
     _linkedin_partner_id = "7064076";
     window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
     window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script><script type="text/javascript">
     (function(l) {
     if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
     window.lintrk.q=[]}
     var s = document.getElementsByTagName("script")[0];
     var b = document.createElement("script");
     b.type = "text/javascript";b.async = true;
     b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
     s.parentNode.insertBefore(b, s);})(window.lintrk);
    </script>
    <noscript>
      <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=7064076&fmt=gif" />
    </noscript>

</head>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<?php echo $this->Html->css(
    [
        '/assets/bootstrap/bootstrap.min.css',
        // '/assets/form/contact-form.css',
        'case-study-form.css',
        'style.css',
        'owl.carousel.min.css',
        'owl.theme.default.min.css',
    ]
); ?>

<?php echo $this->fetch('css') ?>
<?php echo $this->fetch('script') ?>


<script>
    window.faitracker = window.faitracker || function() {
            this.q = [];
            var t = new CustomEvent("FAITRACKER_QUEUED_EVENT");
            return this.init = function(t, e, a) {
                this.TOKEN = t, this.INIT_PARAMS = e, this.INIT_CALLBACK = a, window.dispatchEvent(new CustomEvent("FAITRACKER_INIT_EVENT"))
            }, this.call = function() {
                var e = {
                    k: "",
                    a: []
                };
                if (arguments && arguments.length >= 1) {
                    for (var a = 1; a < arguments.length; a++) e.a.push(arguments[a]);
                    e.k = arguments[0]
                }
                this.q.push(e), window.dispatchEvent(t)
            }, this.message = function() {
                window.addEventListener("message", function(t) {
                    "faitracker" === t.data.origin && this.call("message", t.data.type, t.data.message)
                })
            }, this.message(), this.init("onpo0wcuru8p79fx3dm4kpmjklww4cd9", {
                host: "https://api.factors.ai"
            }), this
        }(),
        function() {
            var t = document.createElement("script");
            t.type = "text/javascript", t.src = "https://app.factors.ai/assets/factors.js", t.async = !0, (d = document.getElementsByTagName("script")[0]).parentNode.insertBefore(t, d)
        }();
</script>

<body>
    <?php echo $this->element('navbar') ?>
    <?php echo $this->fetch('content') ?>
    <?php echo $this->element('footer') ?>


    <?php echo $this->Html->script([
        '/assets/jquery/jquery-2.1.1.js',
        '/assets/bootstrap/popper.min.js',
        '/assets/bootstrap/bootstrap.min.js',
        'custom.js',
        'case-study-validation',
        'owl.carousel.min.js',
    ]); ?>

    <script type="text/javascript" id="zsiqchat">
        var $zoho = $zoho || {};
        $zoho.salesiq = $zoho.salesiq || {
            widgetcode: "e2b5ad0f4805b0f78a996d504b423988b0cea13bf5b9c086a12d272022647f45",
            values: {},
            ready: function() {}
        };
        var d = document;
        s = d.createElement("script");
        s.type = "text/javascript";
        s.id = "zsiqscript";
        s.defer = true;
        s.src = "https://salesiq.zoho.in/widget";
        t = d.getElementsByTagName("script")[0];
        t.parentNode.insertBefore(s, t);
    </script>
    <script>
        window.$zoho = window.$zoho || {};
        $zoho.salesiq = $zoho.salesiq || {
            ready: function() {}
        }
    </script>
    <script type="text/javascript">
        _linkedin_partner_id = "6558636";
        window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
        window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script>
    <script type="text/javascript">
        (function(l) {
            if (!l) {
                window.lintrk = function(a, b) {
                    window.lintrk.q.push([a, b])
                };
                window.lintrk.q = []
            }
            var s = document.getElementsByTagName("script")[0];
            var b = document.createElement("script");
            b.type = "text/javascript";
            b.async = true;
            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
            s.parentNode.insertBefore(b, s);
        })(window.lintrk);
    </script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=6558636&fmt=gif" />
    </noscript>
    <script id="zsiqscript" src="https://salesiq.zohopublic.in/widget?wc=siqb79ad896bc9c0dd5f9369224612247a72e080f18f37d1c945370e1ef610b1661" defer></script>
    <script src="https://cdn-in.pagesense.io/js/remitso263/917bca6077e84fa99a97be1f593d73d3.js"></script>


    <div class="modal fade" id="exampleModal-request-demo-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-request-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-data-body">
                    <div class="zf-templateWidth">
                        <div class="text-center">
                            <form
                                action='https://forms.zohopublic.in/remitso263/form/RequestDemo/formperma/wWbh0-mvXIlRL1zC6wpl7X6T7FlgyjOkMjO23nbLCzQ/htmlRecords/submit'
                                name='form' method='POST' onSubmit='javascript:document.charset="UTF-8"; return zf_ValidateAndSubmit();'
                                accept-charset='UTF-8' enctype='multipart/form-data' id='form'>

                                <input type="hidden" name="zf_referrer_name" value="">
                                <input type="hidden" name="zf_redirect_url" value="">
                                <input type="hidden" name="zc_gad" value="">

                                <div class="zf-templateWrapper zf-templateWrapper-request-demo">
                                    <img src="/img/logo-dark.png" alt="" class="img-fluid mt-2" width="150px">
                                    <h2 class="modal-for-text mt-4">Make Cross
                                        Border Transfers Awesome <br> For your
                                        Customers</h2>
                                    <div class="zf-subContWrap zf-topAlign">
                                        <ul>
                                            <li class="zf-tempFrmWrapper zf-large">
                                                <div class="zf-tempContDiv zf-tempContDiv-type">
                                                    <span>
                                                        <input fieldType=9 type="text" maxlength="255" name="Email"
                                                            checktype="c5" value="" required
                                                            placeholder="Share your work email" id="requestDemoEmailInput" />
                                                    </span>
                                                    <p id="Email_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                                                </div>
                                                <div class="zf-clearBoth"></div>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul>
                                        <li class="zf-fmFooter">
                                            <button class="zf-submitColor" type="submit">Request Demo</button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

<script type="text/javascript">
    var zf_DateRegex = new RegExp("^(([0][1-9])|([1-2][0-9])|([3][0-1]))[-](Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)[-](?:(?:19|20)[0-9]{2})$");
    var zf_MonthYearRegex = new RegExp("^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)[-](?:(?:19|20)[0-9]{2})$");
    var zf_MandArray = [""];
    var zf_FieldArray = ["Email"];
    var isSalesIQIntegrationEnabled = false;
    var salesIQFieldsArray = [];
</script>

</html>