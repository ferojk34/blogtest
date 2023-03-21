<?php

namespace Modules\Blog\Entities;

use Modules\Core\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "description",
        "image",
    ];
}
