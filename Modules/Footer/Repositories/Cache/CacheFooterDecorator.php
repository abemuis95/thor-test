<?php

namespace Modules\Footer\Repositories\Cache;

use Modules\Footer\Repositories\FooterRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFooterDecorator extends BaseCacheDecorator implements FooterRepository
{
    public function __construct(FooterRepository $footer)
    {
        parent::__construct();
        $this->entityName = 'footer.footers';
        $this->repository = $footer;
    }
}
