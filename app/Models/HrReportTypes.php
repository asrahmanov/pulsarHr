<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\HrReportTypes
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newQuery()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withoutTrashed()
 * @mixin \Eloquent
 * @property string $info
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereInfo($value)
 */
class HrReportTypes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'report_types';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        "name",

    ];
    protected $hidden=[
        "created_at",
        "updated_at",
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [
            "name"=>'string',
        ]);
    }
}
