<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HrReportCovid;
use Illuminate\Http\Request;

class HrReportCovidController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/hr-report-covid",
     *     tags={"Hr Report Covid"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(HrReportCovid::get(), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Hr Report Covid"},
     *     path="/api/hr-report-covid/get-by-report-day/{report_day}/{company_id}",
     *     @OA\Parameter( name="report_day", in="path", required=false, description="Получить все отчеты по дате", @OA\Schema( type="date" ) ),
     *     @OA\Parameter( name="company_id", in="path", required=false, description="", @OA\Schema( type="integer" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     * )
     *      ),
     * )
     */
    public function getByReportDay($report_day, $company_id)
    {
        return HrReportCovid::select()
            ->whereReportDay($report_day)
            ->whereCompanyId($company_id)
            ->get();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="/api/hr-report-covid",
     *     tags={"Hr Report Covid"},
     *     @OA\RequestBody(
     *    request="Create Hr Report Covid",
     *    description="Create Hr Report Covid Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="n_1",description="1", type="integer", example="1"),
     *          @OA\Property(property="n_2",description="2", type="integer", example="1"),
     *          @OA\Property(property="n_3",description="3", type="integer", example="1"),
     *          @OA\Property(property="n_4",description="4", type="integer", example="1"),
     *          @OA\Property(property="n_5",description="5", type="integer", example="1"),
     *          @OA\Property(property="n_6",description="6", type="integer", example="1"),
     *          @OA\Property(property="n_7",description="7", type="integer", example="1"),
     *          @OA\Property(property="n_8",description="8", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="n_1",description="1", type="integer", example="1"),
     *          @OA\Property(property="n_2",description="2", type="integer", example="1"),
     *          @OA\Property(property="n_3",description="3", type="integer", example="1"),
     *          @OA\Property(property="n_4",description="4", type="integer", example="1"),
     *          @OA\Property(property="n_5",description="5", type="integer", example="1"),
     *          @OA\Property(property="n_6",description="6", type="integer", example="1"),
     *          @OA\Property(property="n_7",description="7", type="integer", example="1"),
     *          @OA\Property(property="n_8",description="8", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     * )
     * )
     *      ),
     * )
     */
    public function store(Request $request)
    {
        $entity = new HrReportCovid();

        $validator = $entity->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $entity->fill($request->only($entity->getFillable()))->save();

        return response(
            HrReportCovid::whereId($entity->id)->first()->toArray(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Patch (
     *     path="/api/hr-report-covid/{id}",
     *     tags={"Hr Report Covid"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update Hr Report Covid",
     *    description="Update Hr Report Covid Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="n_1",description="1", type="integer", example="1"),
     *          @OA\Property(property="n_2",description="2", type="integer", example="1"),
     *          @OA\Property(property="n_3",description="3", type="integer", example="1"),
     *          @OA\Property(property="n_4",description="4", type="integer", example="1"),
     *          @OA\Property(property="n_5",description="5", type="integer", example="1"),
     *          @OA\Property(property="n_6",description="6", type="integer", example="1"),
     *          @OA\Property(property="n_7",description="7", type="integer", example="1"),
     *          @OA\Property(property="n_8",description="8", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="n_1",description="1", type="integer", example="1"),
     *          @OA\Property(property="n_2",description="2", type="integer", example="1"),
     *          @OA\Property(property="n_3",description="3", type="integer", example="1"),
     *          @OA\Property(property="n_4",description="4", type="integer", example="1"),
     *          @OA\Property(property="n_5",description="5", type="integer", example="1"),
     *          @OA\Property(property="n_6",description="6", type="integer", example="1"),
     *          @OA\Property(property="n_7",description="7", type="integer", example="1"),
     *          @OA\Property(property="n_8",description="8", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     *     @OA\Property(property="field2", type="array",  @OA\Items(example="The field2 field is required."))
     * )
     * )
     *      ),
     * )
     */
    public function update(Request $request, $id)
    {
        $entity = HrReportCovid::whereId($id)->first();
        if (!$entity) {
            return response([], 404);
        }

        $validator = $entity->validate($request->all(), false);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $entity->fill($request->only($entity->getFillable()));

        if ($entity->save()) {

            return response($entity->toArray(), 200);
        } else {
            return response('anyError', 500);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Delete  (
     *     path="/api/hr-report-covid/{id}",
     *     tags={"Hr Report Covid"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=true),
     *         )
     *      ),
     *     @OA\Response(
     *          response=400,
     *          description="Error Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=false),
     *         )
     *      ),
     *
     * )
     */
    public function destroy($id)
    {
        $is_deleted = (bool)HrReportCovid::whereId($id)->delete();

        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
