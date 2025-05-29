<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */

$this->disableAutoLayout();
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titleForLayout ?? __('') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $this->Url->image('favicon.png')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"">
    <meta name="title" content="<?php echo $title ?? __(''); ?>">
    <meta name="description" content="<?php echo $desc ?? __(''); ?>">
    <meta name="keywords" content="<?php echo $keywords ?? __(''); ?>">
    <meta property="og:url" content="<?php echo $this->Url->build('https://www.accropolix.ai/'.$ogUrl) ?? __('')?>" />
    <meta property="og:title" content="<?php echo $title ?? __('');?>" />
    <meta property="og:description" content="<?php echo $desc ?? __(''); ?>" />
    <meta property="title" content="<?php echo $title ?? __(''); ?>" />
    <meta property="description" content="<?php echo $desc ?? __(''); ?>" />
    <meta property="keywords" content="<?php echo $keywords ?? __(''); ?>" />
    <meta property="og:image" content="<?php echo $this->Url->image('https://www.accropolix.ai'.$ogImage) ?? $this->Url->image('https://www.accropolix.ai/img/banner2.jpg')?>" />
    <meta property="og:title" content="<?php echo $title ?? __('');?>" />
    <meta property="og:description" content="<?php echo $desc ?? __(''); ?>" />
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 day">
    <link rel="canonical" href="<?php echo $this->Url->build('https://www.accropolix.ai/'.$ogUrl) ?? __('')?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <?php echo $this->Html->css("/assets/bootstrap/css/bootstrap.min"); ?>
    <?php echo $this->Html->css("/assets/slick/slick.css"); ?>
    <?php echo $this->Html->css("/assets/slick/slick-theme.css"); ?>
    <?php echo $this->Html->css("/assets/boxicons/css/boxicons.min.css"); ?>
    <?php echo $this->Html->css("/assets/video-js/video-js.css"); ?>
    <?php echo $this->Html->css("contact-form"); ?>
    <?php echo $this->Html->css("style"); ?>

    <?php echo $this->fetch("css"); ?>
    <?php echo $this->fetch('meta') ?>
    <script src="https://cdn-in.pagesense.io/js/accropolixmediasolutionspteltd/54498c7a1e8d4c8f8c19f539f4397f9a.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W2P4SG0YN9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-W2P4SG0YN9');
    </script>
    <script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "siq0214a26bad5511b234cfbc30f039bd130ef9ac6799429009004398b6c3308584baa293e18288c3083d126f6abbd96914", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>
    <meta name="google-site-verification" content="dogM7AWoQBHYRUjy4tVCKRDvHilRTghAxwhndAL7XXg" />
</head>

<body>

<main>
    <section class="min-vh-100 d-flex justify-content-center align-items-center w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1 class="font-weight-bold">Thank You !</h1>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_2dlzxeim.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; margin: auto;"  loop  autoplay></lottie-player>
                    <p>Your exclusive e-book is on its way to your inbox. 📩 Dive into its pages and discover something amazing!</p>
                    <div>
                        <a href="<?php echo $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'contact',
                        ])?>" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
<?php echo $this->Html->script([
    '/assets/jquery/jquery.min',
    '/assets/slick/slick.min.js',
    'validation',
    'main',
])
?>
<?php echo $this->fetch("scriptSchema"); ?>
<?php echo $this->fetch("scriptBottom"); ?>
<script>
    $(document).ready(function () {
        $(window).resize(function () {
            if ($(window).width() >= 980) {
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show");
                });
                $(".navbar .dropdown-menu").mouseleave(function () {
                    $(this).removeClass("show");
                });
            }
        });

    });
</script>
</body>
</html>
