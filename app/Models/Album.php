<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Album extends Model
{
    protected $guarded = ['id'];

    public function item() {
    	return $this->hasMany(Item::class, 'album_id')->orderBy('number', 'asc');
    }

    public function image() {
        return url('upload/' . $this->poster);
    }

    public function link() {
        return url('album/' . $this->id);
    }

    public function getCreatedAtAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }

    public function getUpdatedAtAttribute() {
    	return Carbon::parse($this->attributes['updated_at'])->format('d/m/Y');
    }
}
