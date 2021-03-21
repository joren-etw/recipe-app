<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $appends = ['amount_of_people'];

    protected $with = ['category'];

    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Default amount of people is 2
     *
     * @return int
     */
    public function getAmountOfPeopleAttribute(): int
    {
        return 2;
    }

    /**
     * Set the amount of people for this model, this will modify the quantities returned
     *
     * @param mixed $value
     */
    public function setAmountOfPeopleAttribute($value)
    {
        $this->attributes['amount_of_people'] = $value;

        $this->ingredients->map(static function ($ingredient) use ($value) {
            $ingredient->setCalculatedQuantityAttribute($value);
        });
    }

    public function scopeFilter($query, ?string $filter)
    {
        return $query->when($filter, static function ($query) use ($filter) {
            return $query->where('name', 'like', '%' . $filter . '%')->orWhereHas('ingredients', function ($q) use ($filter) {
                $q->whereHas('ingredient', function ($q) use ($filter) {
                    $q->where('name', 'like', '%' . $filter . '%');
                });
            });
        });
    }

    public function scopeFilterByCategory($query, ?int $categoryId)
    {
        return $query->when($categoryId, static function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        });
    }
}
