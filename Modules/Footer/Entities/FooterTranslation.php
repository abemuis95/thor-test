<?php

namespace Modules\Footer\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Footer\Events\FooterContentIsRendering;

class FooterTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'footer_id',
    	'footer'];
    protected $table = 'footer__footer_translations';

    public function getFooterAttribute($footer)
    {
        event($event = new FooterContentIsRendering($footer));

        return $event->getFooter();
    }
}
