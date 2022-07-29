<?php

/**
 * Class GetAdminCheckedEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetAdminCheckedEntriesOutput",
 *     type="object"
 * )
 */
class GetAdminCheckedEntriesOutput
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
     *     description="entry_type. 1: Sales 2: Purchase, 3: Expenditure"
     * )
     *
     * @var int
     */
    private $entry_type;

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
     *     description="Invoice total amount"
     * )
     *
     * @var float
     */
    private $amount;

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
     *     description="updated_at",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $updated_at;

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
