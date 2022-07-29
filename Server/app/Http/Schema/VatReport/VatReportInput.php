<?php

/**
 * Class VatReportInput
 *
 * @OA\Schema(
 *     schema="VatReportInput",
 *     type="object"
 * )
 */
class VatReportInput
{
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
