<?php
/**
 * @var \App\View\AppView $this
 * @var string $name
 * @var string $email
 * @var string $message
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;600&display=swap" rel="stylesheet">
</head>
<body style="background-color: #f1f1f1; font-family: 'Work Sans', sans-serif;">
<div style="max-width: 600px; margin: 0 auto;">
    <table style="width: 100%;">
        <tr>
            <td style="padding: 1em 2.5em; background: #263238; text-align: center;">
                <h1 style="margin: 10px 0px;"><img src="<?php echo $this->Url->image('logo.svg')?>" style="width: 150px;" alt=""></h1 style="margin: 0px;">
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="padding: 4em 0; background: #fff;">
                <div class="text" style="padding: 0 3em; text-align: left;">
                    <h2 style="color: #364655;"><strong><?php echo __('Hi there,')?></strong></h2>
                    <p><?php echo __('The Contact form submission details are given below.')?></p>
                    <h4 style="margin-bottom: 5px;"> <?php echo __("Name : {0}", '<strong>'.$name.'</strong>'); ?></h4>
                    <h4 style="margin-bottom: 5px;"> <?php echo __("Email : {0}", '<strong>'.$email.'</strong>'); ?></h4>
                    <p style="margin-bottom: 5px; line-height: 1.5rem;"><?php echo __("Message : {0}", '<strong>'.$message.'</strong>'); ?></p>
                </div>
            </td>
        </tr>
    </table>
    <table style="width: 100%; padding: 2em 2.5em; background: #263238; line-height: 1.5;">
        <tr>
            <td>
                <h3 class="heading" style="color: #ffffff;"><?php echo __('Find us')?></h3>
                <p style="color: #ccc;"><?php echo __('Please feel free to connect with us to know how we can assist you in expanding your online international money transfer business.')?></p>
                <p style="color: #ccc; margin: 7px 0px;"><span>&#8250;</span><?php echo __('9878/25 sec 9 rohini 35')?> </p>
                <p style="color: #ccc; margin: 7px 0px;"><span>&#8250;</span><?php echo __('+44 20 7193 7878')?> </p>
                <p style="color: #ccc; margin: 7px 0px;"><span>&#8250;</span><?php echo __('info@example.com')?> </p>
            </td>
        </tr>
        <tr>
            <td style="">
                <p style="color: #ccc;">
                    <?php echo __('© 2022 Remitso.com | All Rights Reserved.')?>
                </p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
