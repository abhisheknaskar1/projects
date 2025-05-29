<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>

<div class="modal" id="<?php echo $id; ?>">
    <div class="modal-dialog confirmation-modal modal-lg">
        <?php echo $this->Form->create(NULL, [
            "url" => $url,
            "data-submit" => "disable"
        ]); ?>
        <div class="modal-content px-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="font-weight-bold pb-2 mb-3 mt-5"><?php echo __('Terms & Conditions For “SELFIE WITH CARD”'); ?></h3>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="d-block mb-4">
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('1. What is Selfie with Card Verification Technique?')?></h5>
                            <p><?php echo __('The “Selfie with Card” is a feature that allows customers to verify their identity by taking a selfie with their physical card. The purpose of this service is to increase platform security and stop fraudulent activities.')?></p>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('2. How do I upload the Selfie?')?></h5>
                            <p><?php echo __('To access this option, here are the steps:')?></p>
                            <div class="d-block mb-4">
                                <ol type="a">
                                    <li>
                                        <p><?php echo __('Log in to your DemoApp account and follow the instructions on the app or website.')?></p>
                                        <p><?php echo __('You will be prompted to take a selfie with your card. Choose a spot with good lighting. Look straight at the camera. Hold the card on the other hand, making sure required details are visible. Ensure both face & card show properly.')?></p>
                                    </li>
                                    <li>
                                        <p><?php echo __('Now submit the selfie; Tap the "upload" button, then choose the required files. Photos up to 8 MB in size can be uploaded in JPG, PNG, or PDF formats.')?></p>
                                        <p><?php echo __('PS; No sunglasses, hats, or headgear during the selfie.')?></p>
                                    </li>
                                </ol>
                                <div class="row">
                                    <?php
                                    if (I18n::getLocale() === 'en_GB') { ?>
                                        <div class="col-lg-5"><iframe width="100%" height="350.59" src="https://www.youtube.com/embed/Ix7WjEKYaUY"></iframe></div>
                                    <?php } elseif (I18n::getLocale() === 'fr_FR') { ?>
                                        <div class="col-lg-5"><iframe width="100%" height="350.59" src="https://www.youtube.com/embed/UjmQns8mAro"></iframe></div>
                                    <?php } elseif (I18n::getLocale() === 'pt_BR') { ?>
                                        <div class="col-lg-5"><iframe width="100%" height="350.59" src="https://www.youtube.com/embed/CmjMiy5VG5Q"></iframe></div>
                                    <?php }
                                    ?>
<!--                                    <div class="col-sm-3">-->
<!--                                        <img src="--><?php //echo $this->Url->build('/') ?><!--img/hand.png" class="img-fluid" alt="">-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('3. What information is required for the Selfie with Card Service?')?></h5>
                            <p><?php echo __('Customers using <b>virtual cards</b> are required to submit the last four digits of their card and the card bearer\'s name.')?></p>
                            <p><?php echo __('Customers using <b>physical cards</b> must take a selfie with the card showing only the last four digits and the bearer\'s name.')?></p>
                            <div class="row">
                                <div class="col-sm-5"><p><img src="<?php echo $this->Url->build('/') ?>img/selfie-with-card-demo-replace.png" class="img-fluid" alt=""></p></div>
                            </div>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('4. Is it mandatory to upload the Selfie with Card?')?></h5>
                            <p><?php echo __('Yes, the Selfie with Card verification process is mandatory for all DemoApp customers who use our physical and virtual cards. This is to ensure the security and integrity of our platform.')?></p>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('5. How is my privacy protected while using the Selfie with Card Service?')?></h5>
                            <p><?php echo __('We take your privacy seriously, and we only use your information for verification purposes. All information submitted through the Selfie with Card Service is encrypted and stored securely on our servers.')?></p>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('6. What happens if I accidentally disclose confidential information while uploading?')?></h5>
                            <p><?php echo __('Customers are solely responsible for ensuring that no confidential information is disclosed during the process. If a customer accidentally reveals any personal information, we shall not be held liable for any losses or damages resulting from the customer\'s actions.')?></p>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('7. Why did the attempt to verify card fail?')?></h5>
                            <p><?php echo __('Your account won\'t have access to the <b>‘send’</b> option if the presented card or "selfie" doesn\'t pass our requirements.')?></p>
                            <p><?php echo __('If necessary, upload the "selfie" with the card again to make sure it complies with our requirements')?></p>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('8. Can I do the Selfie with Card on any of my devices?')?></h5>
                            <p><?php echo __('Yes, the Selfie with Card is available on both the DemoApp app and website. You can use it on any device that is compatible with our platform.')?></p>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('9. How long does it take to verify my identity using the Selfie?')?></h5>
                            <p><?php echo __('The verification process is usually completed within a few minutes. However, in some cases, it may take longer depending on the volume of requests we receive.')?></p>
                            <h5 class="mb-3 text-theme font-weight-bold"><?php echo __('10. What happens if my selfie is not clear enough for verification?')?></h5>
                            <p><?php echo __('If your selfie is not clear enough for verification, you may be prompted to take another one. We recommend that you take the selfie in a well-lit environment and ensure that your face and card are clearly visible.')?></p>
                        </div>
                        <div class="modal-footer p-0">
                            <div class="btn-group border-0 d-flex w-100">
                                <button class="btn btn-outline-light border-right text-dark w-100 btn-sm  p-2" data-dismiss="modal"><?php echo __("Cancel"); ?></button>
                                <button class="btn btn-outline-light border-left text-dark w-100 btn-sm  p-2"><?php echo __("Accept"); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>


