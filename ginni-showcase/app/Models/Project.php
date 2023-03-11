<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'url',
        'published_date',
        'image',
        'thumb',
        'category_id',
        'slug'
    ];

     // Load the Tags for this Project
     public function tags()
     {
         return $this->belongsToMany(Tag::class, 'projects_tags', 'projects_id', 'tags_id');
     }
}
