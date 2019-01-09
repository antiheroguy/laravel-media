<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    protected $guarded = ['id'];

    public function album() {
    	return $this->belongsTo(Album::class, 'album_id');
    }

    public function image() {
        return $this->album_id ? url('upload/' . $this->album->poster) : url('images/default.jpg');
    }

    public function link() {
        return url('item/' . $this->id);
    }

    public function getCreatedAtAttribute() {
    	return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }

    public function getUpdatedAtAttribute() {
        return Carbon::parse($this->attributes['updated_at'])->format('d/m/Y');
    }
}
