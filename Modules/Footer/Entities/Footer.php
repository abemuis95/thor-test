<?php

namespace Modules\Footer\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use Translatable;

    protected $table = 'footer__footers';
    public $translatedAttributes = [
    	'footer_id',
    	'footer'
    ];
    protected $fillable = [
    	'footer_id',
    	'footer'
    ];

    public function __call($method, $parameters)
    {
        #i: Convert array to dot notation
        $config = implode('.', ['asgard.page.config.relations', $method]);

        #i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }
}
