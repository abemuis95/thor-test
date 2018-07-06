<?php

namespace Modules\Footer\Repositories\Eloquent;

use Modules\Footer\Repositories\FooterRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentFooterRepository extends EloquentBaseRepository implements FooterRepository
{
	public function findFooter()
    {
        return $this->model->first();
    }

    /**
     * Count all records
     * @return int
     */
    public function countAll()
    {
        return $this->model->count();
    }
}
