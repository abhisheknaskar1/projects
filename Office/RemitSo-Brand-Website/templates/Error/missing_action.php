<?php

/**
 * @var App\View\AppView $this
 */
?>
<section class="error-page-min d-flex justify-content-center align-items-center w-100 vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">                
                <!-- <h2 class="error-message"><?= h($message) ?></h2> -->
                <h1 class="font-weight-bold">Ooops!</h1>

                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://lottie.host/04d741c1-e9a1-4c71-b9c9-e03ed702e440/2l2EFkUCez.json" 
                    background="transparent" speed="1" style="width: 400px; height: 400px; margin: -75px auto;" loop autoplay>
                </lottie-player>

                <p class="col-10 offset-1 mb-4">
                    The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
                </p>
                <div>
                    <a href="/" class="btn btn-primary">
                        <i class="bx bx-arrow-back mr-2"></i> Back to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>    
    .error-page-min {
        min-height: 100vh; 
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center; 
    }
    
    .error-message {
        font-size: 1.5rem;
        color: #555;
        margin-bottom: 1rem;
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
   
    p {
        font-size: 1.2rem;
    }
    
    .btn-primary {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        text-decoration: none;
    }
</style>
