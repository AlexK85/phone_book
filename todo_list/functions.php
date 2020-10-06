<?php

function renderTask($nameTask, $isDone) {

    $checked = '';
    if ($isDone) {
        $checked = 'checked';
    }

    return '<li>
                <input type="checkbox" ' . $checked . '>
                <span>' . $nameTask . '</span>
                <button>✏️</button>
                <button>✖️</button>
            </li>';
}