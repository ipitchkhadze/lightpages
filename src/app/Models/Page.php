<?php

namespace Ipitchkhadze\LightPages\App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Page extends Model {

    use Sluggable;
    use SluggableScopeHelpers;

    protected $table       = 'pages';
    protected $primaryKey  = 'id';
    public $timestamps     = true;
    protected $fillable    = ['name', 'title', 'slug', 'content', 'extras'];
    protected $fakeColumns = ['extras'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    public function getPageLink() {
        return url($this->slug);
    }

    public function getOpenButton() {
        return '<a class="btn btn-default btn-xs" href="' . $this->getPageLink() . '" target="_blank"><i class="fa fa-eye"></i> Open</a>';
    }

    public function getSlugOrTitleAttribute() {
        if ($this->slug != '') {
            return $this->slug;
        }
        return $this->title;
    }

}
