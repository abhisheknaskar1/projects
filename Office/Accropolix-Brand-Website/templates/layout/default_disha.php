<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

/**
 * @var string $titleForLayout
 * @var string $title
 * @var string $desc
 * @var string $keywords
 * @var string $ogImage
 * @var string $ogUrl
 */
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>

    <?php echo $this->Html->meta('favicon.png', '/img/favicon', ['type' => 'favicon']) ?>
    <title><?php echo $titleForLayout ?? __(''); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $this->Url->image('favicon.png') ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta name="title" content="<?php echo $titleForLayout ?? __(''); ?>">
    <meta name="description" content="<?php echo $desc ?? __(''); ?>" />

    <meta property="og:url" content="<?php echo h($ogUrl); ?>">

    <meta property="og:title" content="<?php echo $titleForLayout ?? __(''); ?>" />

    <meta property="og:image" content="<?php echo $ogImage ?? __(''); ?>" />

    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 day">
    <link rel="canonical" href="<?php echo $this->Url->build('https://www.accropolix.ai/' . $ogUrl) ?? __('') ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> -->
    <?php echo $this->Html->css('/assets/bootstrap/css/bootstrap.min'); ?>
    <?php echo $this->Html->css('/assets/slick/slick.css'); ?>
    <?php echo $this->Html->css('/assets/slick/slick-theme.css'); ?>
    <?php echo $this->Html->css('/assets/boxicons/css/boxicons.min.css'); ?>
    <?php echo $this->Html->css('/assets/video-js/video-js.css'); ?>
    <?php echo $this->Html->css('/assets/glightbox/css/glightbox.css'); ?>
    <?php echo $this->Html->css('/assets/glightbox/css/glightbox.min.css'); ?>
    <?php echo $this->Html->css('/css/form-cont.css'); ?>
    <?php echo $this->Html->css('contact-form'); ?>
    <?php echo $this->Html->css('/assets/aos/aos'); ?>
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->css('success'); ?>
    <?php echo $this->Html->css('subcribe'); ?>
    <?php echo $this->Html->css('owl.carousel.min'); ?>
    <?php echo $this->Html->css('owl.theme.default.min'); ?>
    <?php echo $this->Html->css('form'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('meta') ?>
    <script type="text/javascript">
        (function(w, s) {
            var e = document.createElement("script");
            e.type = "text/javascript";
            e.async = true;
            e.src = "https://cdn-in.pagesense.io/js/accropolixmediasolutionspteltd/7ccfeb4d884c457db263927aaa4a1f52.js";
            var x = document.getElementsByTagName("script")[0];
            x.parentNode.insertBefore(e, x);
        })(window, "script");
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11316824525"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-11316824525');
    </script>
    <!-- Event snippet for Website lead conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-11316824525/_fofCMD7ytgYEM2TpJQq'
        });
    </script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

    <script src="https://cdn-in.pagesense.io/js/accropolixmediasolutionspteltd/54498c7a1e8d4c8f8c19f539f4397f9a.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W2P4SG0YN9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-W2P4SG0YN9');
    </script>
    <script type="text/javascript" id="zsiqchat">
        var $zoho = $zoho || {};
        $zoho.salesiq = $zoho.salesiq || {
            widgetcode: "siq0214a26bad5511b234cfbc30f039bd130ef9ac6799429009004398b6c3308584baa293e18288c3083d126f6abbd96914",
            values: {},
            ready: function() {}
        };
        var d = document;
        s = d.createElement("script");
        s.type = "text/javascript";
        s.id = "zsiqscript";
        s.defer = true;
        s.src = "https://salesiq.zohopublic.in/widget";
        t = d.getElementsByTagName("script")[0];
        t.parentNode.insertBefore(s, t);
    </script>
    <meta name="google-site-verification" content="dogM7AWoQBHYRUjy4tVCKRDvHilRTghAxwhndAL7XXg" />
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js" integrity="sha512-jEnuDt6jfecCjthQAJ+ed0MTVA++5ZKmlUcmDGBv2vUI/REn6FuIdixLNnQT+vKusE2hhTk2is3cFvv5wA+Sgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- Google tag (gtag.js) -->
    <amp-analytics type="gtag" data-credentials="include">
        <script type="application/json">
            {
                "vars": {
                    "gtag_id": "AW-11316824525",
                    "config": {
                        "AW-11316824525": {
                            "groups": "default"
                        }
                    }
                },
                "triggers": {}
            }
        </script>
    </amp-analytics>
    <?php echo $this->element('header_disha') ?>
    <main>
        <?php echo $this->fetch('content') ?>
    </main>
    <?php echo $this->element('footer_disha') ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
    <?php echo $this->Html->script([
        '/assets/jquery/jquery.min',
        '/assets/slick/slick.min.js',
        'validation',
        '/assets/aos/aos',
        '/assets/js/circularProgressBar.min',
        'main',
        '/assets/js/success',
        '/assets/js/validation',
        'owl.carousel.min',
        '/assets/js/valid',
        '/assets/js/subscribe',
        '/assets/glightbox/js/glightbox',
        '/assets/glightbox/js/glightbox.min'
    ])
    ?>
    <?php echo $this->fetch('scriptSchema'); ?>
    <?php echo $this->fetch('scriptBottom'); ?>

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
        $(document).ready(function() {
            $(window).resize(function() {
                if ($(window).width() >= 980) {
                    $(".navbar .dropdown-toggle").hover(function() {
                        $(this).parent().toggleClass("show");
                        $(this).parent().find(".dropdown-menu").toggleClass("show");
                    });
                    $(".navbar .dropdown-menu").mouseleave(function() {
                        $(this).removeClass("show");
                    });
                }
            });

        });
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
        })(window, document, "clarity", "script", "o50df30dzr");
    </script>

</body>

</html>