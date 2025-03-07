<?php
/**
 * @var \Cake\View\View $this
 */
use Cake\Core\Configure;


$this->Html->script([
    'https://code.jquery.com/jquery-3.7.1.js',
    'https://cdn.datatables.net/2.2.2/js/dataTables.js',
    'https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js',
    'https://cdn.datatables.net/buttons/3.2.2/js/buttons.dataTables.js',
    'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js',
    'https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js',
    'https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js',

    'https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js',
    'https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js',
    'https://cdn.datatables.net/select/3.0.0/js/dataTables.select.js',
    'https://cdn.datatables.net/select/3.0.0/js/select.dataTables.js',
    ],['block' => true]);

$this->Html->script('datatable_script', ['block' => true]);

$this->Html->css([
        'https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css',
        'https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.css',
        'https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css',
        'https://cdn.datatables.net/select/3.0.0/css/select.dataTables.css',
    ],['block' => true]);
$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend(
    'tb_body_attrs',
    ' class="' .
        implode(' ', [h($this->request->getParam('controller')), h($this->request->getParam('action'))]) .
        '" '
);
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
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
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