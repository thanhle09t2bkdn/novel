<?php
/**
 * Created by PhpStorm.
 * User: T0ny
 * Date: 12/9/18
 * Time: 8:04 PM
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    use Sluggable;
    const NOVEL_COOL_TYPE = 1;
    const ROYAL_ROAD_TYPE = 2;
    const SCRIBBLE_HUB_TYPE = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'name',
        'slug',
        'view_number',
        'description',
        'content',
        'link',
        'video_link',
        'type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
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
        self::NOVEL_COOL_TYPE => 'Novel Cool',
        self::ROYAL_ROAD_TYPE => 'Royal Road',
        self::SCRIBBLE_HUB_TYPE => 'Scribble Hub',
    ];
}
