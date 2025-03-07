<?php
// config/cakepdf.php
use CakePdf\Pdf\CakePdf;

return [
    'CakePdf' => [
        'engine' => 'CakePdf.Mpdf', // Use Mpdf as the PDF engine
        'options' => [
            'mode' => 'utf-8', // Mpdf mode
            'format' => 'A4',  // Page format
            'defaultFont' => 'sans-serif', // Default font
        ],
        'download' => true, // Force download in the browser
    ],
];