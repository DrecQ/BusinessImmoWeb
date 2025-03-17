<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'surface',
        'rooms',
        'bedrooms',
        'bathrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'country',
        'sold',
    ];

    public function option() : BelongsToMany
    {
        return $this-> belongsToMany(Option::class);
    }

    public function getSlug () : string
    {
        return Str::slug($this->title);
    }

    public function imageUrl() : string
    {       
         return Storage::disk('public')->url($this->image ?? '');
    }

    public function scopeAvailable(Builder $builder) : Builder 
    {
        return $builder->where('sold', false);
    }

    public function scopeRecent(Builder $builder) : Builder 
    {
        return $builder->orderBy('created_at', 'desc');
    }

}
