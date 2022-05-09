<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\HrReportCovid
 *
 * @property int $id
 * @property int $company_id
 * @property int $n_1
 * @property int $n_2
 * @property int $n_3
 * @property int $n_4
 * @property int $n_5
 * @property int $n_6
 * @property int $n_7
 * @property int $n_9
 * @property string|null $report_day
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid newQuery()
 * @method static \Illuminate\Database\Query\Builder|HrReportCovid onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid query()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereN9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereReportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportCovid whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|HrReportCovid withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HrReportCovid withoutTrashed()
 * @mixin \Eloquent
 */
class HrReportCovid extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'report_covid';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable=[

        "company_id",
        "report_day",
        "n_1",
        "n_2",
        "n_3",
        "n_4",
        "n_5",
        "n_6",
        "n_7",
        "n_8",

    ];
    protected $hidden=[
        "created_at",
        "updated_at",
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [
            "n_1"=>'integer',
            "n_2"=>'integer',
            "n_3"=>'integer',
            "n_4"=>'integer',
            "n_5"=>'integer',
            "n_6"=>'integer',
            "n_7"=>'integer',
            "n_7"=>'integer',
        ]);
    }
}
