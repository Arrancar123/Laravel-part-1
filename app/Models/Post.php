<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class)->orderBy('created_at', 'DESC');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class);
    }

    public function saves()
    {
        return $this->belongsToMany(User::class);
    }


}
