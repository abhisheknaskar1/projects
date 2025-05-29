<?php
use App\View\AppView;
use Cake\I18n\I18n;
use Cake\Utility\Text;

/**
 * @var AppView $this
 * @var string $titleForLayout
 * @var string $metaDescriptionForLayout
 * @var \DeviceDetector\DeviceDetector $deviceDetector
 */
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <title><?php echo $titleForLayout ?? null; ?></title>
</head>
<body>
<?php echo $this->Html->css([
    "style",
    "/assets/css/vendor.bundle.base.css",
    "/assets/vendor/bootstrap/css/bootstrap.min",
    "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
    "/assets/vendor/boxicons/css/boxicons.min",
    "/assets/vendor/venobox/venobox",
]); ?>
<?php echo $this->element("info_header"); ?>
<?php echo $this->fetch("content"); ?>
<?php echo $this->Html->script([
    "/assets/js/main.js",
]); ?>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>
