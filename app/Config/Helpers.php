<?php

use Illuminate\Support\Str;

function sideMenuActive($path) {
    if(Str::startsWith(request()->path(),$path)) {
        return 'font-weight-bold';
    }
}

function tabMenuActive($path) {
    if(request()->path() == $path) {
        return 'active';
    }
}

/**
 * @param int $numero
 *
 * @return string
 */
function prononcer(int $numero) {
    $prononcer = new NumberFormatter(config('app.site_locale'),NumberFormatter::SPELLOUT);
    return $prononcer->format($numero);
}
function sluggify($string) {
    return Str::slug(now()->format('m-Y-').$string);
}
