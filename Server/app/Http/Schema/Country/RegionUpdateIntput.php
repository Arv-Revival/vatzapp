<?php

/**
 * Class RegionUpdateIntput
 *
 * @OA\Schema(
 *     title="RegionUpdateIntput model",
 *     description="Region update input model",
 * )
 */
class RegionUpdateIntput
{
    /**
     * @OA\Property(
     *     description="id",
     *     title="The id of region",
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     description="name",
     *     title="The name of region",
     * )
     *
     * @var string
     */
    private $name;
}
