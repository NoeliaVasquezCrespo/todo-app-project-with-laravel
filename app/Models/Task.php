<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->whereNull('categories.deleted_at');;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->whereNull('tags.deleted_at');
    }
}
