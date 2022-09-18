<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Description extends Model
{
    use HasFactory;
    use Sortable;
    public function product()
    {
        return $this->belongsTo('Product');
    }
    public $sortable = ['id', 'description'];
    
}
