<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $fillable = [
        'title', 'slug', 'short_description', 'description', 'image', 'status', 'user_id', 'published_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
