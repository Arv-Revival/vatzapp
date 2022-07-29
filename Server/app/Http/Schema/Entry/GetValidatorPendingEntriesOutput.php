<?php

/**
 * Class GetValidatorPendingEntriesOutput
 *
 * @OA\Schema(
 *     schema="GetValidatorPendingEntriesOutput",
 *     type="object"
 * )
 */
class GetValidatorPendingEntriesOutput
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
}
