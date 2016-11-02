<?php
namespace Front\Model;

use Illuminate\Database\Eloquent\Model;
use System\Classified\Model\Classified;

/**
 * User: Viet Trung
 * Date: 22/4/2016
 * Time: 2:34 PM
 */
class Province extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classifieds()
    {
        return $this->hasMany(Classified::class);
    }
}