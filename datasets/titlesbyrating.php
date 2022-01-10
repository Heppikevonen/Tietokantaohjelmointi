<?php

require_once('../incl/functions.php');
$limit = $_GET['limit'];
$rating = $_GET['rating'];
$db = getConnection();

$sql = "CALL TitlesByRating(?, ?);";

$prepared = $db->prepare($sql);
$prepared->execute([$rating, $limit]);
$rows = $prepared->fetchAll();

$html = '<h1> Titles by rating "' . $rating . '"</h1>';
$html .= '<table>';
$html .= '<tr><th>Title</th><th>Rating</th></tr>';

foreach($rows as $row) {
    $html .= '<tr><td>' . $row['primary_title'] . '</td>';
    $html .= '<td>' . $row['average_rating'] . '</td></tr>';
}
$html .= '</table>';

$html .= '<form><button type="submit" formaction="../index.php">Back to criteria page</button></form>';


echo $html;