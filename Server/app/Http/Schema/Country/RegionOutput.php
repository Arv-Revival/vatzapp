<?php

/**
 * Class RegionOutput
 *
 * @OA\Schema(
 *     title="RegionOutput model",
 *     description="Region output model",
 * )
 */
class RegionOutput
{
    /**
     * @OA\Property(
     *     description="ID",
     *     title="ID",
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="Name",
     *     title="Name",
     * )
     *
     * @var string
     */
    private $name;
}
