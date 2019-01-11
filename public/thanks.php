<?php
require '../core/functions.php';

$meta = [];
$meta['title'] = 'Thank you!';
$meta['description'] = 'Thanks for writing!';

$content = <<<EOT
    <h1>Thank you for your submission!</h1>
    <p>Someone will be in touch in 3-5 business days, probably.</p>
EOT;

require '../core/layout.php';
