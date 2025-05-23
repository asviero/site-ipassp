<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $fillable = ['title', 'content', 'views', 'slug', 'displayed', 'parent_id', 'order', 'user_id'];
    
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
