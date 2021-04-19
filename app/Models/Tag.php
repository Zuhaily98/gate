<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Many to Many. Tag can have many blogs. A blog can have many tags. A tag belongs to many blogs. A blog belongs to many tags
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
