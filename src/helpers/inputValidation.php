<?php

function handleInputText($inputName)
{
    if (!empty($_POST[$inputName])) {
        $inputValue = filter_input(INPUT_POST, $inputName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    } else {
        $inputValue = '';
    }

    return $inputValue;
}

function handleInputEmail($inputName)
{
    if (!empty($_POST[$inputName])) {
        $inputValue = filter_input(INPUT_POST, $inputName, FILTER_SANITIZE_EMAIL);
    } else {
        $inputValue = '';
    }

    return $inputValue;
}

function handleEmptyInput($inputName)
{
    if (!empty($_POST[$inputName])) {
        $inputValue = $_POST[$inputName];
    } else {
        $inputValue = '';
    }

    return $inputValue;
}
