<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'database',
        'ftp',
        'website',
        'user_id',
    ];

    //Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function records()
    {
        return $this->hasMany(Record::class, 'domain_id');
    }
}
