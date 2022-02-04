<?php

namespace App\Http\Controllers\Api\V1\Directory;

use App\Http\Controllers\Controller;
use App\Models\Directory\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category): array
    {
        return ['categories' => $category->pluck('name')];
    }
}
