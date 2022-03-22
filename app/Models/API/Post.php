<?php

namespace App\Models\API;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "desc",
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
