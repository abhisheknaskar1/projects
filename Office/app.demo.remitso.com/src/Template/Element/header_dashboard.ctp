<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php echo $this->Html->css([
    "/assets/vendor/bootstrap/css/bootstrap.min",
    "style",
    "/assets/vendor/icofont/icofont.min",
    "/assets/vendor/boxicons/css/boxicons.min",
    "/assets/css/sb-admin-2.min.css",
    "/assets/vendor/fontawesome-free/css/all.min.css",
]); ?>
<style>
    .topbar
    {
        height: 5.0rem;
    }
    .topbar #sidebarToggleTop:active, .topbar #sidebarToggleTop:hover, .topbar #sidebarToggleTop:focus {
        background-color: transparent;
    }
    .topbar #sidebarToggleTop {
        height: auto;
        width: auto;
    }
</style>
<nav class="navbar navbar-expand navbar-light topbar fixed-top d-print-none" style="border-bottom: solid 1px #343a40;">
    <a class="px-4" href="<?php echo $this->Url->build("/"); ?>"><img style="width: 150px" src="<?php echo $this->Url->build('/'); ?>assets/img/DemoApp_logo.svg" alt=""></a>
    <a href="javascript:" id="sidebarToggleTop" class="p-2 d-md-none mr-3 float-right">
        <svg style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </a>
</nav>
