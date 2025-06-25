<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model {
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'category_id', 'location',
        'duration_days', 'price', 'available_from', 'available_to', 'created_by'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    // public function reviews() {
    //     return $this->hasMany(Review::class);
    // }
}
