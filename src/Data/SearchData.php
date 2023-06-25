<?php

namespace App\Data;

class SearchData
{
    /**
     * @ar string
     */
    public $q = '';

    /**
     * @var CarCategory[]
     */
    public $carCategories = [];

    /**
     * @var int
     */
    public $page = 1;
}
