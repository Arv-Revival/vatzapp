<?php

/**
 * Class SupplierShortListOutput
 *
 * @OA\Schema(
 *     schema="SupplierShortListOutput",
 *     title="Supplier short list output model",
 *     type="object"
 * )
 */
class SupplierShortListOutput
{
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
     *     description="id",
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="trn",
     * )
     *
     * @var string
     */
    private $trn;
}
