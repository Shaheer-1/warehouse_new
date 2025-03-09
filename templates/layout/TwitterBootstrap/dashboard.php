<?php
/**
 * @var \Cake\View\View $this
 */
use Cake\Core\Configure;


$this->Html->script([
    'https://code.jquery.com/jquery-3.7.1.js',
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js',
    'https://cdn.datatables.net/2.2.2/js/dataTables.js',
    'https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js',
    
    'https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js',
    'https://cdn.datatables.net/buttons/3.2.2/js/buttons.bootstrap5.js',
    'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js',
    'https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js',
    'https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js',


    ],['block' => true]);

$this->Html->script([
        'datatable_script',
        'BootstrapUI.sidebars',
        'virtual-select.min',
    ], ['block' => true]);

$this->Html->css([
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css',
    'https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css',
    'https://cdn.datatables.net/buttons/3.2.2/css/buttons.bootstrap5.css',

    ],['block' => true]);
$this->Html->css([
        'virtual-select.min',
        'BootstrapUI.dashboard',
        'BootstrapUI.sidebar',
    ], ['block' => true]);
$this->prepend(
    'tb_body_attrs',
    ' class="' .
        implode(' ', [h($this->request->getParam('controller')), h($this->request->getParam('action'))]) .
        '" '
);
$this->start('tb_sidebar');
?>

<div class="body_main">
    <div class="sidebar_main">
        <div class="flex-shrink-0 p-3">
            <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#rows-collapse" aria-expanded="false">
                Rows
                </button>
                <div class="collapse" id="rows-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><?= $this->Html->link(__('New Row'), ['controller' => 'RackRows', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Rows'), ['controller' => 'RackRows', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#cells-collapse" aria-expanded="false">
                Cells
                </button>
                <div class="collapse" id="cells-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><?= $this->Html->link(__('New Cell'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Cells'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
                </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#principals-collapse" aria-expanded="false">
                Principals
                </button>
                <div class="collapse" id="principals-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><?= $this->Html->link(__('New Principal'), ['controller' => 'Principals', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Principals'), ['controller' => 'Principals', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#products-collapse" aria-expanded="false">
                Products
                </button>
                <div class="collapse" id="products-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                </ul>
                </div>
            </li>
            </ul>
        </div>
    </div>
</div>
<?php
$this->end();
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <?= $this->Html->link(
            Configure::read('App.title'),
            '/',
            ['class' => 'navbar-brand col-md-3 col-lg-2 me-0 px-3']
        ) ?>
        <button
            class="navbar-toggler position-absolute d-md-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/logout">Sign out</a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <?= $this->fetch('tb_sidebar') ?>
                </div>
            </nav>

            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center
                            pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 page-header"><?= h($this->request->getParam('controller')) ?></h1>
                </div>
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash)) {
        echo $this->Flash->render();
    }
    $this->end();
}
$this->end();

$this->start('tb_body_end');
?>
            </main>
        </div>
    </div>
</body>
<?php
$this->end();

echo $this->fetch('content');
?>
