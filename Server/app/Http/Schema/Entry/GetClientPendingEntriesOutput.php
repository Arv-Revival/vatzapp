<?php

/**
 * Class GetClientPendingEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetClientPendingEntriesOutput",
 *     title="Get client pending entries output model",
 *     type="object"
 * )
 */
class GetClientPendingEntriesOutput
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
     *     description="Entry Type:
     *                      1: Sale
     *                      2: Purchase
     *                      3: Expenditure",
     * )
     *
     * @var int
     */
    private $entry_type;

    /**
     * @OA\Property(
     *     description="VAT perentage 0 or 5",
     * )
     *
     * @var float
     */
    private $vat_percentage;
}
