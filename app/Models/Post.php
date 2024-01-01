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

    const POST_TYPE = 1;
    const PAGE_TYPE = 2;
    const BOOK_TYPE = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'type',
        'description',
        'content',
        'image'
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

    public function audios()
    {
        return $this->hasMany(Audio::class);
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
        self::POST_TYPE => 'Post',
        self::PAGE_TYPE => 'Page',
        self::BOOK_TYPE => 'Book',
    ];

    public function getTypeNameAttribute()
    {
        if (!isset($this->type)) {
            return null;
        }
        return self::$typeNames[$this->type];
    }
}
