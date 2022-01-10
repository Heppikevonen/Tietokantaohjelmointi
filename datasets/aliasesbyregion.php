<?php

require_once('../incl/functions.php');

$limit = $_GET['limit'];
$region = $_GET['region'];
$db = getConnection();

$sql = "CALL GetAliasesByRegion(?, ?);";

$prepared = $db->prepare($sql);
$prepared->execute([$region, $limit]);
$rows = $prepared->fetchAll();

$html = '<h1> Titles by region ' . $region . '</h1>';
$html .= '<ul>';

foreach($rows as $row) {
    $html .= '<li>' . $row['title'] . '</li>';
}
$html .= '</ul>';

$html .= '<form><button type="submit" formaction="../index.php">Back to criteria page</button></form>';


echo $html;