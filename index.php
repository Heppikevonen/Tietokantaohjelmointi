<?php

require_once('incl/functions.php');

// Kaikki tietokantahaut ovat procedureja, koska ajattelin sen yhtenäistävän hakuja.

//Luontilauseet sql-tiedostossa.

$html = "<h2>Criteria</h2>";
$html .= '<form action="GET">';

$html .= createGenreDropDown();

$html .= createRegionDropDown();

$html .= createRatingDropDown();

$html .= '<br>';

$html .= createPersonInfo();

$html .= '<br>';

$html .= createActorsByRole();

$html .= createLimitDropdown();


$path = 'datasets';
if ($handle = opendir($path)) {
    while ($file = readdir($handle)) {
        if ('.' === $file) continue;
        if ('..' ===  $file) continue;

        $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
    }
    closedir($handle);
}
$html .= '</form>';

echo $html;