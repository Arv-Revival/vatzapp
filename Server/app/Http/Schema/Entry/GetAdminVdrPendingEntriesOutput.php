<?php

/**
 * Class GetAdminVdrPendingEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetAdminVdrPendingEntriesOutput",
 *     type="object"
 * )
 */
class GetAdminVdrPendingEntriesOutput
{
    /**
     * @OA\Property(
     *     description="Company name",
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     description="id",
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="File name",
     * )
     *
     * @var string
     */
    private $file_path;

    /**
     * @OA\Property(
     *     description="Created date.",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $created_at;

    /**
     * @OA\Property(
     *     description="Entry type",
     * )
     *
     * @var int
     */
    private $entry_type;

     /**
     * @OA\Property(
     *     description="checker name",
     * )
     *
     * @var string
     */
    private $checker_name;

    /**
     * @OA\Property(
     *     description="checker_user_id name",
     * )
     *
     * @var integer
     */
    private $checker_user_id;

        /**
     * @OA\Property(
     *     description="validator name",
     * )
     *
     * @var string
     */
    private $validator_name;

    /**
     * @OA\Property(
     *     description="validator_user_id name",
     * )
     *
     * @var integer
     */
    private $validator_user_id;
}
