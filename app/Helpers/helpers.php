<?php

use App\Constants\General;

function getMediaTypes() {
    return [
        General::IMAGE,
        General::VIDEO,
    ];
}

function getNullSelectOption($selectOption, $value = 'Null') {
    $selectOption = $selectOption->toArray();
    $selectOption[-1] = $value;
    ksort($selectOption);

    return $selectOption;
}
