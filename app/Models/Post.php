<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'user_id',
    ];

    public function categories(): BelongsToMany
    {
        return $this->BelongsToMany(Category::class);
    }
   
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

}
