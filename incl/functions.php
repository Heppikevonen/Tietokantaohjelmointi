<?php

function getConnection(): PDO {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=imdb", "root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $connection;
}

function createGenreDropDown() {
    $db = getConnection();
    $sql = "SELECT DISTINCT genre FROM title_genres";
    $prepared = $db->prepare($sql);
    $prepared->execute();
    $rows = $prepared->fetchAll();
    $html = '<label for="genre">Genre</label><br>';
    $html .= '<select id="genre" name="genre">';

    foreach($rows as $row){
        $html .= '<option>' . $row['genre'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}

function createRegionDropDown() {
    $db = getConnection();
    $sql = "SELECT DISTINCT region FROM aliases";
    $prepared = $db->prepare($sql);
    $prepared->execute();
    $rows = $prepared->fetchAll();
    $html = '<br><label for="region">Region</label><br>';
    $html .= '<select id="region" name="region">';

    foreach($rows as $row){
        $html .= '<option>' . $row['region'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}

function createRatingDropDown() {
    $html = '<br><label for="rating">Rating</label><br>';
    $html .= '<select id="rating" name="rating">';
    for ($i=1; $i <= 10 ; $i += 1) { 
        $html .= '<option>' . $i . '</option>';
    }
    $html .= '</select>';
    return $html;
}

function createPersonInfo() {
    $html = '<label for="name">Person name</label>';
    $html .= '<input type="text" id="name" name="name" />';
    return $html;
}

function createLimitDropdown() {
    $html = '<br><label for="limit">Limit</label><br>';
    $html .= '<select id="limit" name="limit">';
    for ($i=10; $i <= 50 ; $i += 10) { 
        $html .= '<option>' . $i . '</option>';
    }
    $html .= '</select>';
    return $html;
}

function createActorsByRole() {
    $html = '<label for="role">Role</label>';
    $html .= '<input type="text" id="role" name="role" />';
    return $html;
}
