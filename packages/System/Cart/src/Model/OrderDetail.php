<?php


namespace System\Cart\Model;

use Illuminate\Database\Eloquent\Model;
use System\Classified\Model\Classified;

class OrderDetail extends Model
{
    public function classifieds()
    {
        return $this->belongsTo(Classified::class, 'classified_id');
    }
}