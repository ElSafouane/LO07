<?php
class Charte
{

static function html_head_bootstrap($titre)
{
$resultat = "<html>\n";
$resultat .= " <head>\n";
    $resultat .= "  <meta charset='UTF-8'>\n";
    $resultat .= "  <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
    $resultat .= "  <link href='bootstrap.css' rel='stylesheet'/>\n";
    $resultat .= "  <link href='my_css.css' rel='stylesheet'/>\n";

    $resultat .= "  <title>$titre</title>\n";
    $resultat .= " </head>\n";

$resultat .= " <body>\n";
$resultat .= "   <div class = 'container'>\n";
    $resultat .= "    <div class='panel panel-success'>\n";
        $resultat .= "      <div class = 'panel-heading'>\n";
            $resultat .= "        <h3 class='panel-title'>$titre</h3>\n";
            $resultat .= "      </div>\n";
        $resultat .= "    </div> \n";
    return $resultat;
    }

    static function html_foot_bootstrap()
    {
    $resultat = "  <div/>\n";
    $resultat .= "  <!-- Charte.html_foot_bootstrap() -->\n";
    $resultat .= " </body>\n";
$resultat .= "</html>\n";
return $resultat;
}

}


?>