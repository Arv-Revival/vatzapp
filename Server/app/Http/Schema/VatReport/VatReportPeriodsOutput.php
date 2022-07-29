<?php

/**
 * Class VatReportPeriodsOutput
 *
 * @OA\Schema(
 *     schema="VatReportPeriodsOutput",
 *     type="object"
 * )
 */
class VatReportPeriodsOutput
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

    /**
     * @OA\Property(
     *     description="company_name",
     * )
     *
     * @var string
     */
    private $company_name;
}
