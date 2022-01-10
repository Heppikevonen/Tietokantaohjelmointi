<?php

require_once('../incl/functions.php');

$limit = $_GET['limit'];
$roletitle = $_GET['role'];
$role = '%' . $roletitle . '%';
$db = getConnection();

$sql = "CALL ActorsByRole(?, ?);";

$prepared = $db->prepare($sql);
$prepared->execute([$role, $limit]);
$rows = $prepared->fetchAll();

$html = '<h1> Actors by role ' . $roletitle . '</h1>';
$html .= '<table>';
$html .= '<tr><th>Name</th><th>Role</th></tr>';

foreach($rows as $row) {
    $html .= '<tr><td>' . $row['name_'] . '</td>';
    $html .= '<td>' . $row['role_'] . '</td></tr>';
}
$html .= '</table>';

$html .= '<form><button type="submit" formaction="../index.php">Back to criteria page</button></form>';


echo $html;