<?php

require_once('../incl/functions.php');
$name = $_GET['name'];
$db = getConnection();

$sql = "CALL BirthAndDeathYears(?);";

$prepared = $db->prepare($sql);
$prepared->execute([$name]);
$rows = $prepared->fetchAll();

$html = '<h1>Person info for"' . $name . '"</h1>';
$html .= '<table>';
$html .= '<tr><th>Name</th><th>Birth year</th><th>Death year</th><th>Age</th></tr>';

foreach($rows as $row) {
    $html .= '<tr><td>' . $row['name_'] . '</td>';
    $html .= '<td>' . $row['birth_year'] . '</td>';
    $html .= '<td>' . $row['death_year'] . '</td>';
    $html .= '<td>' . $row['age'] . '</td></tr>';
}
$html .= '</table>';

$html .= '<form><button type="submit" formaction="../index.php">Back to criteria page</button></form>';

echo $html;