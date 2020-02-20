<?php


namespace Rentit;


interface View{
    public function render(Array $dataview, string $template);
    // resta de vistes, p.e. amb json....
}