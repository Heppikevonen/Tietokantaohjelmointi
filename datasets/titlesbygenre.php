<?php

require_once('../incl/functions.php');

$limit = $_GET['limit'];
$genretitle = $_GET['genre'];
$genre = '%' . $genretitle . '%';
$db = getConnection();

$sql = "CALL TitlesByGenre(?, ?);";

$prepared = $db->prepare($sql);
$prepared->execute([$genre, $limit]);
$rows = $prepared->fetchAll();

$html = '<h1> Titles by genre ' . $genretitle . '</h1>';
$html .= '<ul>';

foreach($rows as $row) {
    $html .= '<li>' . $row['primary_title'] . '</li>';
}
$html .= '</ul>';

$html .= '<form><button type="submit" formaction="../index.php">Back to criteria page</button></form>';


echo $html;