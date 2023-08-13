<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Options extends Model
{

    use HasFactory;
    use Sortable;

    public $sortable = [
        'name',
        'value',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'value',
        'description',
    ];

}
