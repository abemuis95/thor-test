<?php

namespace Modules\Footer\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface FooterRepository extends BaseRepository
{
	/**
     * Find the page set as homepage
     * @return object
     */
    public function findFooter();

    /**
     * Count all records
     * @return int
     */
    public function countAll();
}
