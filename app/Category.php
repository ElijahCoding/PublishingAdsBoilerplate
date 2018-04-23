<?php

namespace App;

use App\Area;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeWithListingInArea($query, Area $area)
    {
      return $query->with(['listings' => function ($query) use ($area) {
        $query->isLive()->inArea($area);
      }]);
    }

    public function listings()
    {
      return $this->hasMany(Listing::class);
    }
}
