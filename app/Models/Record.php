<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'url',
        'username',
        'password',
        'domain_id',
        'user_id',
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['domain_id'] ?? false) {
            $query->where('domain_id', '=', request('domain_id'));
        }
    }
}
