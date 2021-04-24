<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ExportRequest
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string $email
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest newQuery()
 * @method static \Illuminate\Database\Query\Builder|ExportRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExportRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ExportRequest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ExportRequest withoutTrashed()
 * @mixin \Eloquent
 */
class ExportRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "export_requests";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
    ];
}
