<?php

namespace Modules\Category\Entities;

use Illuminate\Support\Facades\Cache;
use TypiCMS\NestableTrait;
use Modules\Base\Eloquent\Model;
use Modules\Base\Traits\Sluggable;
use Modules\Base\Eloquent\Translatable;
use Modules\Ebook\Entities\Ebook;

class Category extends Model
{
    use Translatable, Sluggable, NestableTrait;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'slug', 'position', 'is_searchable', 'is_active'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_searchable' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['name'];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */

    public function Ebook() {
        return $this->belongsTo(Ebook::class); 
    }

    protected static function boot()
    {
        parent::boot();
        static::addActiveGlobalScope();
    }
    
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
    public function isRoot()
    {
        return $this->exists && is_null($this->parent_id);
    }

    /**
     * Returns the public url for the category.
     *
     * @return string
     */
    public function url()
    {
        return route('categories.show', [$this->slug]);
    }

    public static function tree()
    {
        return Cache::tags(['categories'])->rememberForever('categories.tree:' . locale(), function () {
            return static::orderByRaw('-position DESC')->get()->nest();
        });
    }

    public static function treeList()
    {
        return Cache::tags(['categories'])->rememberForever('categories.tree_list:' . locale(), function () {
            return static::orderByRaw('-position DESC')
                ->get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }

    /**
     * Get searchable categoires.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function searchable()
    {
        return Cache::tags(['categories'])->rememberForever('categories.searchable:' . locale(), function () {
            return static::where('is_searchable', true)->orderByRaw('-position DESC')->get();
        });
    }
}
