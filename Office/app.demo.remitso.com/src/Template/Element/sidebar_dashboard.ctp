<?php
/**
 * @var \App\View\AppView $this
 */

use App\WebService\Customer;

/** @var Customer $customer */
$customer = $this->getRequest()->getSession()->read("Auth.User.account");

$controller = $this->getRequest()->getParam('controller');
$action = $this->getRequest()->getParam('action');
$sidebarItems = [
    [
        'url' => [
            'controller' => 'Customers',
            'action' => 'dashboard',
        ],
        'href' => null,
        'attributes' => [],
        'title' => __('Dashboard'),
        'children' => [],
        'is_active' => $controller === "Customers" && $action === "dashboard",
    ], [
        'url' => [
            'controller' => 'Orders',
            'action' => 'index',
        ],
        'href' => null,
        'attributes' => [],
        'title' => __('Your transfers'),
        'children' => [],
        'is_active' => $controller === "Orders" && $action === "index",
    ], [
        'url' => [
            'controller' => 'Recipients',
            'action' => 'index',
        ],
        'href' => null,
        'attributes' => [],
        'title' => __('Your recipients'),
        'children' => [],
        'is_active' => $controller === "Recipients" && $action === "index",
    ], [
        'url' => [
            'controller' => 'Customers',
            'action' => 'documents',
        ],
        'href' => null,
        'attributes' => [],
        'title' => __('Account Verification'),
        'children' => [],
        'is_active' => $controller === "Customers" && $action === "documents",
    ], [
        'url' => [
            'controller' => 'Customers',
            'action' => 'settings',
        ],
        'href' => null,
        'attributes' => [],
        'title' => __('Account Settings'),
        'children' => [],
        'is_active' => $controller === "Customers" && $action === "settings",
    ], [
        'url' => [
            'controller' => 'Customers',
            'action' => 'logout',
        ],
        'href' => null,
        'attributes' => [],
        'title' => __('Logout'),
        'children' => [],
        'is_active' => $controller === "Customers" && $action === "logout",
    ],
  ];
?>
<?php echo $this->Html->css([
    "/vendors/css/vendor.bundle.base",
    "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
    "/vendors/iconfonts/flag-icon/css/flag-icon.min",
    "/vendors/gdpr/gdpr-cookie",
    "/assets/vendor/bootstrap/css/bootstrap.min",
    "/assets/vendor/icofont/icofont.min",
    "/assets/vendor/boxicons/css/boxicons.min",
    "/assets/vendor/venobox/venobox",
    "style",
]); ?>
<style>
    @media only screen and (min-width: 768px){
        .sidebar-brand img
        {
            width: 200px;
        }
        .sidebar-close
        {
            display: none;
        }
    }
    @media only screen and (max-width: 767px){
        .sidebar-close
        {
            position: absolute;
            right: -32px;
            width: 30px;
            height: 30px;
        }
        .sidebar-close a{
            color: #000000;
            text-decoration: none;
            font-size: 2rem;
        }
    }
</style>
<ul class="navbar-nav sidebar sidebar-dark accordion bg-indigo d-print-none toggled" id="accordionSidebar">
    <?php foreach ($sidebarItems as $sidebarItem) { ?>
    <li class="nav-item <?php echo $sidebarItem['is_active'] ? 'active' : ''; ?>">
        <a class="nav-link text-white" href="<?php echo $sidebarItem['href'] ?? $this->Url->build($sidebarItem['url']); ?>">
            <span><?php echo $sidebarItem['title'] ?></span>
            <span class="float-right"><i class="bx bx-chevron-right"></i></span>
        </a>
    </li>
    <?php } ?>
    <li class="px-lg-4 mt-4">
        <?php if ($customer->getProperty('blocked') == true) { ?>
        <a href="<?php echo $this->Url->build(['controller' => 'Customers', 'action' => 'blocked'])?>" class="btn btn-primary text-white btn-block p-2 align-items-center btn-sm"><?php echo __('Send Money')?></a>
        <?php } else { ?>
        <a href="<?php echo $this->Url->build(['controller' => 'Orders', 'action' => 'send'])?>" class="btn btn-primary text-white btn-block p-2 align-items-center btn-sm"><?php echo __('Send Money')?></a>
    <?php } ?>
    </li>
</ul>
