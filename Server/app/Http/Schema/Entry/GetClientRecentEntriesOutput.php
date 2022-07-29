<?php

/**
 * Class GetClientRecentEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetClientRecentEntriesOutput",
 *     title="Get client recent entries output model",
 *     type="object"
 * )
 */
class GetClientRecentEntriesOutput
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
     *     description="Invoice date.",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $invoice_date;

    /**
     * @OA\Property(
     *     description="Invoice number",
     * )
     *
     * @var string
     */
    private $invoice_number;

    /**
     * @OA\Property(
     *     description="Amount",
     * )
     *
     * @var float
     */
    private $amount;

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
}
