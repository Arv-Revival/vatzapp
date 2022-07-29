<?php

/**
 * Class SetValidatorEntryInput
 *
 * @OA\Schema(
 *     schema="SetValidatorEntryInput",
 *     type="object"
 * )
 */
class SetValidatorEntryInput
{
    /**
     * @OA\Property(
     *     description="entry_id",
     * )
     *
     * @var int
     */
    private $entry_id;

    /**
     * @OA\Property(
     *     description="Status ID 2: Rejected, 4:Approved",
     * )
     *
     * @var int
     */
    private $status_id;

    /**
     * @OA\Property(
     *     description="Comment if any",
     * )
     *
     * @var string
     */
    private $comment;
}
