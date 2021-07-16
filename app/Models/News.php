<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string|null $source
 * @property string|null $publish_date
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $spoiler
 * @property int $is_private
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Query\Builder|News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSpoiler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|News withoutTrashed()
 * @mixin \Eloquent
 * @property string $enclosure
 * @property string|null $guid
 * @method static \Illuminate\Database\Eloquent\Builder|News whereEnclosure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereGuid($value)
 */
class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'source',
        'category_id',
        'is_private',
        'spoiler',
        'enclosure',
        'guid',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
