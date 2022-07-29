<?php

/**
 * Class GetClientRejectedEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetClientRejectedEntriesOutput",
 *     title="Get client rejected entries output model",
 *     type="object"
 * )
 */
class GetClientRejectedEntriesOutput
{
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
     *     description="Entry status ID. Status ID 2|3: In Progress, 4:Approved",
     * )
     *
     * @var int
     */
    private $entry_status_id;

    /**
     * @OA\Property(
     *     description="Comment from client or validator",
     * )
     *
     * @var string
     */
    private $comment;

    /**
     * @OA\Property(
     *     description="Requested for delete",
     * )
     *
     * @var bool
     */
    private $requested_for_delete;

    /**
     * @OA\Property(
     *     description="Client user id",
     * )
     *
     * @var int
     */
    private $client_user_id;

    /**
     * @OA\Property(
     *      description="Created at",
     *      type="string",
     *      format="Date"
     * )
     *
     * @var string
     */
    private $created_at;
}
