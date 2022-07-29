<?php

/**
 * Class VatReportOthersInput
 *
 * @OA\Schema(
 *     schema="VatReportOthersInput",
 *     type="object"
 * )
 */
class VatReportOthersInput
{
    /**
     * @OA\Property(
     *     description="user_id",
     * )
     *
     * @var integer
     */
    private $user_id;
    
    /**
     * @OA\Property(
     *     description="start_date",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $start_date;

    /**
     * @OA\Property(
     *     description="end_date",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $end_date;
}
