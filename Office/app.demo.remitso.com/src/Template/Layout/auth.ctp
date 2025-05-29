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
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="<?php echo $title ?? null;?>" />
    <meta property="og:description" content="<?php echo $desc ?? null; ?>" />
    <meta name="description" content="<?php echo $desc ?? null; ?>"/>
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <title><?php echo $title ?? null;?></title>
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
<?php echo $this->element("auth_header"); ?>
<main>
    <?php echo $this->fetch("content"); ?>
</main>
<?php echo $this->Html->script([
    "/assets/vendor/jquery/jquery.min.js",
    "/vendors/js/vendor.bundle.base",
    "/assets/js/main.js",
]); ?>
<script>
    $(function(){
        $('#eye').click(function(){

            if($(this).hasClass('bx-show')){

                $(this).removeClass('bx-show');

                $(this).addClass('bx-hide');

                $('#inputPassword').attr('type','text');

            }else{

                $(this).removeClass('bx-hide');

                $(this).addClass('bx-show');

                $('#inputPassword').attr('type','password');
            }
        });
    });
    $(function(){
        $("#sign-in-form").submit(function(e){
            $(this).parents(".ui.form").addClass("loading");
        });
    });
</script>
</body>
</html>
