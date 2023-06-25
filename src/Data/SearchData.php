<?php

namespace App\Data;

class SearchData
{
    /**
     * @var string
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
