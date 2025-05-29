<?php
/**
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;400;600;700&display=swap" rel="stylesheet">
    <title><?php echo $titleForLayout ?? "AtlPay"; ?></title>
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
<body class="sidebar-toggled">
<div id="wrapper">
    <?php echo $this->element("sidebar_dashboard"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php echo $this->element("header_dashboard"); ?>
            <section class="bg-light wrapper">
                <div class="container">
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
</body>
</html>
