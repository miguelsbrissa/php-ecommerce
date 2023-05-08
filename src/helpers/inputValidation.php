<?php

function handleInputText($inputName)
{
    if (!empty($_POST[$inputName])) {
        $inputValue = filter_input(INPUT_POST, $inputName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    } else {
        $inputValue = null;
    }

    return $inputValue;
}

function handleInputEmail($inputName)
{
    if (!empty($_POST[$inputName])) {
        $inputValue = filter_input(INPUT_POST, $inputName, FILTER_SANITIZE_EMAIL);
    } else {
        $inputValue = null;
    }

    return $inputValue;
}

function handleRadioInput($inputName)
{
    if (!empty($_POST[$inputName])) {
        $inputValue = $_POST[$inputName];
    } else {
        $inputValue = null;
    }

    return $inputValue;
}
