<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // =============================== RELATIONS ====================================
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    // =============================== MUTATORS ====================================
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => removeStrangeCharacters($value),
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => 1,
        );
    }

    // =============================== SCOPES ====================================
    public function scopeFilterByText($query, $filter)
    {
        $query->where(function ($q) use ($filter) {
            $q->where('name', 'iLike', "%$filter%")
                ->orWhere('description', 'iLike', "%$filter%");
        });
    }
}
