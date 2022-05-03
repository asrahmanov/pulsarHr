<?php

namespace App\Virtual;


/**
 * @OA\Schema(
 *      title="Store QC request",
 *      description="Store QC request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreQCRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new project",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $name;


    /**
     * @OA\Property(
     *     title="pathologist_id",
     *     description="Патолог",
     *     example="1"
     * )
     */
    public $pathologist_id;




}
