<?php
use App\View\AppView;
use Cake\I18n\I18n;

/**
 * @var AppView $this
 * @var string $titleForLayout
 */
?>
<!DOCTYPE html>
<html lang="<?php echo substr(I18n::getLocale(), 0, 2); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $titleForLayout ?? "RemitSo Demo"; ?></title>
    <?php echo $this->Html->css([
        "style",
        "/vendors/css/vendor.bundle.base",
        "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
        "/vendors/iconfonts/flag-icon/css/flag-icon.min",
        "/vendors/iconfonts/payment-font/css/paymentfont.min",
    ]); ?>
    <?php echo $this->Html->script([
        "/vendors/js/vendor.bundle.base",
    ]); ?>
</head>
<body>
<?php echo $this->fetch("content"); ?>
</body>
</html>
