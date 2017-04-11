<?php

namespace Ipitchkhadze\LightPages\App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Ipitchkhadze\LightPages\App\Models\Lang;

class Page extends Model {

    use Sluggable;
    use SluggableScopeHelpers;

    protected $table      = 'pages';
    protected $primaryKey = 'id';
    public $timestamps    = true;
    protected $fillable   = ['name', 'page_id', 'lang_id', 'title', 'slug', 'content', 'state'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    public function lang() {
        return $this->belongsTo('\Ipitchkhadze\LightPages\App\Models\Lang', 'lang_id', 'id');
    }

}
