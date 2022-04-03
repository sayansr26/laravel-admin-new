<?php

namespace Jewel\Admin\Grid\Actions;

use Jewel\Admin\Actions\RowAction;

class Edit extends RowAction
{
    /**
     * @return array|null|string
     */
    public function name()
    {
        return __('admin.edit');
    }

    /**
     * @return string
     */
    public function href()
    {
        return "{$this->getResource()}/{$this->getKey()}/edit";
    }
}
