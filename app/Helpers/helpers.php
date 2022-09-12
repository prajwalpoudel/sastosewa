<?php

use App\Constants\General;

function getMediaTypes() {
    return [
        General::IMAGE => General::IMAGE,
        General::VIDEO => General::VIDEO ,
    ];
}

function getNullSelectOption($selectOption, $value = 'Null') {
    $selectOption = $selectOption->toArray();
    $selectOption[-1] = $value;
    ksort($selectOption);

    return $selectOption;
}

function getActiveNavClass($route) {
    $currentRoute = request()->route()->getName();
    if(is_array($route)) {
        if(in_array($currentRoute, $route)) {
            return 'active-nav-link';
        }
    }
    else {
        if($currentRoute == $route) {
            return 'active-nav-link';
        }
    }

    return null;

}

function getAuthenticatedUser($guard='front', $attribute=null) {
    if(Auth::guard($guard)->check()) {
        $user = Auth::guard($guard)->user();
        if($attribute) {
            return $user->{$attribute};
        }
        return $user;
    }
}

