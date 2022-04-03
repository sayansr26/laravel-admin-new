<?php

namespace Website\Admin\Grid\Filter;

class StartsWith extends Like
{
    protected $exprFormat = '{value}%';
}
