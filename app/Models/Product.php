<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;
    public function prices()
    {
        return $this->hasMany('Prices');
    }
    public function description()
    {
        return $this->hasOne('Description');
    }
    public $sortable = ['id', 'name', 'priceID', 'descriptionID'];
}
