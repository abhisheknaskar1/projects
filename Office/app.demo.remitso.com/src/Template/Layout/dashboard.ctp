<?php
/**
 * @var \App\View\AppView $this
 * @var \DeviceDetector\DeviceDetector $deviceDetector
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo $this->Url->build('/'); ?>img/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <title><?php echo $titleForLayout ?? "DemoApp"; ?></title>
    <?php echo $this->Html->css([
        "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
        "/vendors/iconfonts/flag-icon/css/flag-icon.min",
        "/vendors/gdpr/gdpr-cookie",
        "/assets/vendor/icofont/icofont.min",
        "/assets/vendor/boxicons/css/boxicons.min",
        "/assets/vendor/venobox/venobox",
        "/assets/css/sb-admin-2.min.css",
        "/assets/vendor/fontawesome-free/css/all.min.css",
        "/assets/vendor/flagstrap/flags.css",
        "/assets/vendor/bootstrap/css/bootstrap.min",
        "dashboard",
        "style",
    ]); ?>
    <?php echo $this->Html->script([
        "/vendors/js/vendor.bundle.base",
    ]); ?>
</head>
<body class="sidebar-toggled bg-matt-black">
<div id="wrapper" class="bg-matt-black">
    <?php echo $this->element("sidebar_dashboard"); ?>
    <div id="content-wrapper" class="d-flex flex-column bg-matt-black">
        <div id="content">
            <?php echo $this->element("header_dashboard"); ?>
            <section class="p-0">
                <div class="">
                    <?php $this->Flash->render()?>
                    <div class="row">
                    <?php echo $this->fetch("content"); ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php echo $this->Html->script([
    "/assets/js/main.js",
    "/assets/js/sb-admin-2.min.js"
]); ?>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>
