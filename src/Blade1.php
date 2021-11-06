<?php


namespace TpWeb;
use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;


class Blade1 {
    private BladeInstance $blade;

    public function __construct() {
        $this->blade = new BladeInstance(__DIR__ . "/../../views", __DIR__ . "/../../cache");
    }


}