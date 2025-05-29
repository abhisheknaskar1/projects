<?php
use Cake\Core\Configure;
/**
 * @var \App\View\AppView $this
 */
?>
<style>
    .c-wrapper{
        position: fixed;
        bottom: 30px;
        left: 30px;
        background: #fff;
        max-width: 330px;
        border-radius: 15px;
        padding: 20px 20px 30px 20px;
        box-shadow: 0px 5px 11px 4px rgb(168 168 168);
        text-align: center;
    }
    .c-wrapper.hide{
        opacity: 0;
        pointer-events: none;
        transform: scale(0.8);
        transition: all 0.3s ease;
    }
    ::selection{
        color: #fff;
        background: #FCBA7F;
    }
    .c-wrapper img{
        max-width: 100px;
    }
    .c-wrapper .c-content{
        margin-top: 20px;
    }
    .c-wrapper header{
        font-size: 25px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .c-content{
        margin-top: 10px;
    }
    .c-content p{
        color: #858585;
        margin: 5px 0 20px 0;
        line-height: 1.5;
    }
    .c-content .c-buttons{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .c-buttons .item{
        margin: 0 10px;
    }
    .c-buttons button{
        padding: 10px 20px;
        background: #263238;
        border: none;
        outline: none;
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
    }
    .c-buttons button:hover{
        transform: scale(0.97);
    }
    .c-buttons a{
        color: #fcba7f;
    }
</style>
<div class="c-wrapper">
    <img src="<?php echo $this->Url->image('cookie.png')?>">
    <div class="c-content">
        <header><?php echo __('Cookie Policy')?></header>
        <p><?php echo __('This website use cookies to ensure you get the best experience')?></p>
        <div class="c-buttons">
            <?php
            echo $this->Form->button('Accept',
                [
                    'type' => 'button',
                    'class' => 'item',
                    'onclick' => 'hideAll()',
                    'id' => 'btnAcceptCookiePolicy',
                    'data-dismiss' => "alert",
                    'aria-label' => "Close"
                ],
            );
            ?>
            <?php
            echo $this->Form->button('Decline',
                [
                    'type' => 'button',
                    'class' => 'item',
                    'onclick' => 'hideAll()',
                    'id' => 'btnDeclineCookiePolicy',
                    'data-dismiss' => "alert",
                    'aria-label' => "Close"
                ],
            );
            ?>
        </div>
    </div>
</div>
<script>
    const cookieBox = document.querySelector(".c-wrapper"),
        acceptBtn = cookieBox.querySelector("#btnAcceptCookiePolicy");


    acceptBtn.onclick = ()=>{
        document.cookie = "CookieBy=RemitSo; max-age="+60*60*24*30;
        if(document.cookie){
            cookieBox.classList.add("hide");
        }else{
            alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
        }
    }

    let checkCookie = document.cookie.indexOf("CookieBy=RemitSo");
    checkCookie !== -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");

    const cookieBox1 = document.querySelector(".c-wrapper"),
        declineBtn = cookieBox1.querySelector("#btnDeclineCookiePolicy");
    declineBtn.onclick = ()=>{
            cookieBox1.classList.add("hide");
    }

</script>

