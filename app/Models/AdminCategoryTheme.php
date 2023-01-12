<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  AdminCategoryTheme extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'category_theme';
    protected $guarded = [];
}
