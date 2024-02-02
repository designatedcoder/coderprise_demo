<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['make', 'model', 'year', 'price', 'description', 'image'];

    /**
     * Get the vehicle's calculated price.
    */
    public function calculatedPrice(): Attribute {
        return new Attribute(
            fn($value, $attributes) => number_format($attributes['price'] / 100, 2)
        );
    }

    /**
     * Get the vehicle's custom image.
    */
    public function customImage(): Attribute {
        return Attribute::get(function(): string {
            return $this->image
                    ? asset('/storage/images/'.$this->attributes['image'])
                    : asset('/storage/images/defaults/no_image.jpg');
        });
    }
}
