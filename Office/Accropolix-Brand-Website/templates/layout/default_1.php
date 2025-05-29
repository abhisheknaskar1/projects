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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.0/css/all.min.css">
    <link rel="stylesheet" href="assets/aos/aos.css">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="casestudy-pagebody">
<?php echo $this->element('header');?>
<main>
    <?php echo $this->fetch('content')?>
</main>
<?php echo $this->element('footer');?>
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="assets/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
<script src="assets/aos/aos.js"></script>
<script src="assets/counter/active.js"></script>
<script src="assets/js/circularProgressBar.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
