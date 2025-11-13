<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (isset($keyword)) {
            $query->where('first_name', 'like', '%' . $keyword . '%')->orWhere('last_name', 'like', '%' . $keyword . '%')->orWhere('email', 'like', '%' .$keyword . '%');
        }
        return $query;
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (isset($gender)) {
            $query->where('gender', $gender);
        }
        return $query;
    }

    public function scopeCategoryIdSearch($query, $category_id)
    {
        if (isset($category_id)) {
            $query->where('category_id', $category_id);
        }
        return $query;
    }

    public function scopeCreatedAtSearch($query, $created_at)
    {
        if (isset($created_at)) {
            $query->where('created_at', "like", "%" . $created_at . "%");
        }
        return $query;
    }
}
