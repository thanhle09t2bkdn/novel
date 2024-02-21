<?php
/**
 * Created by PhpStorm.
 * User: T0ny
 * Date: 12/9/18
 * Time: 8:04 PM
 */

namespace App\Models;

use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Uuids;
    use HasFactory;
    use Sluggable;

    const NOVEL_TYPE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'view_number',
        'total_item',
        'rate',
        'type',
        'description',
        'short_description',
        'content',
        'image',
        'storage_link',
        'link',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongstoMany(Tag::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static $typeNames = [
        self::NOVEL_TYPE => 'Novel',
    ];

    public function getTypeNameAttribute()
    {
        if (!isset($this->type)) {
            return null;
        }
        return self::$typeNames[$this->type];
    }
}
