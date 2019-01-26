<?php
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

use \Michelf\Markdown;

$my_text = file_get_contents(URL.'public/sujet.md');
$my_html = Markdown::defaultTransform($my_text);

echo $my_html;