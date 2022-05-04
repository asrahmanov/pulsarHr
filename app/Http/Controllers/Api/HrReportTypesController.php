<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HrReportTypes;
use Illuminate\Http\Request;

class HrReportTypesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/hr-report-types",
     *     tags={"HR Report types"},
     *     @OA\Parameter( name="api_token", in="header", required=false, description="API token", @OA\Schema( type="string" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="array",
     *     @OA\Items(type="object",
     *              @OA\Property(property="id", type="number", example="1"),
     *              @OA\Property(property="name",description="название отчета", type="string", example="Тест"),
     *     )
     * )
     *      ),
     * )
     */
    public function index()
    {
        return response(HrReportTypes::withTrashed()->get(),200) ;
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
     *     path="/api/hr-report-types",
     *     tags={"HR Report Types"},
     *     @OA\Parameter( name="api_token", in="header", required=false, description="API token", @OA\Schema( type="string" ) ),
     *     @OA\RequestBody(
     *    request="Create HR Report Types",
     *    description="Create HR Report Types Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *
     *          @OA\Property(property="name",description="название на Русском", type="string", example="Тест"),
     *
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="id", type="number", example="443"),
     *
     *              @OA\Property(property="name",description="название на Русском", type="string", example="Тест"),
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
        $entity = new HrReportTypes();

        $validator = $entity->validate($request->all());
        if ($validator->fails()){
            return response(['errors'=>$validator->errors()],422);
        }

        $entity->fill($request->only($entity->getFillable()))->save();

        return response(
            HrReportTypes::whereId($entity->id)->first()->toArray(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     *     path="/api/hr-report-types/{id}",
     *     tags={"HR Report Types"},
     *     @OA\Parameter( name="api_token", in="header", required=false, description="API token", @OA\Schema( type="string" ) ),
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update HR Report Types",
     *    description="Update HR Report Types Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="name",description="название на Русском", type="string", example="Тест"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="id", type="number", example="1"),
     *              @OA\Property(property="name",description="название", type="string", example="Тест"),
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
        $entity = HrReportTypes::whereId($id)->first();
        if (!$entity){
            return response([], 404) ;
        }

        $validator = $entity->validate($request->all(),false);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()],422);
        }

        $entity->fill($request->only($entity->getFillable()));

        if ($entity->save()){

            return response($entity->toArray(),200);
        }else{
            return response('anyError',500);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Delete  (
     *     path="/api/hr-report-types/{id}",
     *     tags={"HR Report Types"},
     *     @OA\Parameter( name="api_token", in="header", required=false, description="API token", @OA\Schema( type="string" ) ),
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
        $is_deleted = (bool)HrReportTypes::whereId($id)->delete();

        return  response(['is_deleted' => $is_deleted],$is_deleted?200:400);
    }
}
