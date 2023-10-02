<?php

namespace App\Models;

trait Favorable
{

    protected static function bootFavorable(){
        static::deleting(function ($model){
            $model->favorites->each->delete();
        });
    }

    public function isFavorited()
    {
        return !!$this->favorites->where('user_id', auth()->id())->count();
    }
    public function getIsFavoritedAttribute(){
        return $this->isFavorited();
    }

    public function getFavCount()
    {
        return $this->favorites->count();
    }
    public function getFavCountAttribute()
    {
        return $this->favorites->count();
    }
    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (!$this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    public function unfavorite()
    {
        $attributes = ['user_id' => auth()->id()];
        $this->favorites()->where($attributes)->get()->each(function ($favorite){
            $favorite->delete();
        });

        }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');

    }

}
