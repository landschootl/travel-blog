<?php

echo "<div>";

    use \Michelf\Markdown;

    if (file_exists('public/sujet.md')) {
        $parser = new Markdown;
        $parser->predef_urls = array('casutil' => URL.'public/images/casUtilisation.png', 'sysinfo' => URL.'public/images/marathon.png');
        $my_text = file_get_contents('public/sujet.md');
        $my_html = $parser->transform($my_text);
    } else {
        $my_html = Markdown::defaultTransform("<h3 style='color: red'> Le sujet non trouvé</h3>");
    }
echo $my_html;
echo "</div>";

?>