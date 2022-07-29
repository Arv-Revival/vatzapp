<?php

/**
 * Class GetCheckerPendingEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetCheckerPendingEntriesOutput",
 *     type="object"
 * )
 */
class GetCheckerPendingEntriesOutput
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
     *     description="comment",
     * )
     *
     * @var string
     */
    private $comment;

    /**
     * @OA\Property(
     *     description="Client user ID",
     * )
     *
     * @var int
     */
    private $client_user_id;
}
