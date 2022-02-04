<?php

namespace App\Models\Directory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phonebook extends Model
{
    use HasFactory;

    protected $table = 'directory_phonebooks';

    protected $fillable = ['family','name','middle_name', 'phone', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
