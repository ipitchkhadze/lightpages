<?php

namespace Ipitchkhadze\LightPages\App\Models;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model {

    protected $table      = 'lang';
    protected $primaryKey = 'id';
    public $timestamps    = true;
    protected $fillable   = ['name', 'lang'];

    public function pages() {
        return $this->hasMany('pages', 'lang_id', 'id');
    }

}
