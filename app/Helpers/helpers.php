<?php

use App\Constants\General;
use Illuminate\Support\Facades\Storage;

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
/**
 * Check if given text is url or not
 *
 * @param $text
 * @return bool
 */
function isUrl($text)
{
    if(filter_var($text, FILTER_VALIDATE_URL))
    {
        return true;
    }
    return  false;
}

/**
 * Get image url from storage
 *
 * @param $path
 * @return string
 */
function getImageUrl($path)
{
    if (!$path) {
        return '';
//        return asset("images/mjm/no-img.png");
        //return Storage::url("default/images/profile.jpeg");
    }
    if (isUrl($path)) {
        return $path;
    }

    return Storage::url($path);
}

