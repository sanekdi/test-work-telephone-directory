<?php

namespace App\Models\Directory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'directory_categories';

    protected $fillable = ['name'];
}
