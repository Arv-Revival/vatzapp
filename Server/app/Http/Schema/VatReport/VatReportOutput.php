<?php

/**
 * Class VatReportOutput
 *
 * @OA\Schema(
 *     schema="VatReportOutput",
 *     type="object"
 * )
 */
class VatReportOutput
{
    /**
     * @OA\Property(
     *     description="trn",
     * )
     *
     * @var string
     */
    private $trn;

    /**
     * @OA\Property(
     *     description="name",
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     description="building_name",
     * )
     *
     * @var string
     */
    private $building_name;

    /**
     * @OA\Property(
     *     description="p_o_box",
     * )
     *
     * @var string
     */
    private $p_o_box;

    /**
     * @OA\Property(
     *     description="palce",
     * )
     *
     * @var string
     */
    private $palce;

    /**
     * @OA\Property(
     *     description="city",
     * )
     *
     * @var string
     */
    private $city;

    /**
     * @OA\Property(
     *     description="region",
     * )
     *
     * @var string
     */
    private $region;

    /**
     * @OA\Property(
     *     description="country",
     * )
     *
     * @var string
     */
    private $country;

    /**
     * @OA\Property(
     *     description="vat_return_start_period",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $vat_return_start_period;

    /**
     * @OA\Property(
     *     description="vat_return_end_period",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $vat_return_end_period;

    /**
     * @OA\Property(
     *     description="vat_return_due_date",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $vat_return_due_date;

    /**
     * @OA\Property(
     *     description="sale_amount",
     * )
     *
     * @var float
     */
    private $sale_amount;

    /**
     * @OA\Property(
     *     description="sale_vat_amount",
     * )
     *
     * @var float
     */
    private $sale_vat_amount;

    /**
     * @OA\Property(
     *     description="purchase_amount",
     * )
     *
     * @var float
     */
    private $purchase_amount;

    /**
     * @OA\Property(
     *     description="purchase_vat_amount",
     * )
     *
     * @var float
     */
    private $purchase_vat_amount;

    /**
     * @OA\Property(
     *     description="net_vat_sale_due",
     * )
     *
     * @var float
     */
    private $net_vat_sale_due;

    /**
     * @OA\Property(
     *     description="net_vat_purchase_due",
     * )
     *
     * @var float
     */
    private $net_vat_purchase_due;

    /**
     * @OA\Property(
     *     description="payable_tax_for_the_period",
     * )
     *
     * @var float
     */
    private $payable_tax_for_the_period;
}
