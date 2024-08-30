<?php

if($_GET['user'] == 'admin' && $_GET['pass'] == 'admin123') {
    echo json_encode(array('result' => '1', 'username' => 'bob', 'first_name' => 'Bob', 'last_name' => 'Jacobsen', 'email' => 'aaben@lobaugh.net'));
} else {
    echo json_encode(array('result' => '0'));
}