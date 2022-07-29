<?php

/**
 * Class GetAdminCheckerPendingEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetAdminCheckerPendingEntriesOutput",
 *     type="object"
 * )
 */
class GetAdminCheckerPendingEntriesOutput
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
     *     description="Entry status id. 1: Pending 2: Validator recheck"
     * )
     *
     * @var int
     */
    private $entry_status_id;

    /**
     * @OA\Property(
     *     description="Comment",
     * )
     *
     * @var string
     */
    private $comment;

         /**
     * @OA\Property(
     *     description="Checker name",
     * )
     *
     * @var string
     */
    private $checker_name;

    /**
     * @OA\Property(
     *     description="Checker user id",
     * )
     *
     * @var integer
     */
    private $checker_user_id;

    /**
     * @OA\Property(
     *     description="Client user id",
     * )
     *
     * @var integer
     */
    private $client_user_id;
}
