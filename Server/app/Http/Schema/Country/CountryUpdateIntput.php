<?php

/**
 * Class CountryUpdateIntput
 *
 * @OA\Schema(
 *     title="CountryUpdateIntput model",
 *     description="Country update input model",
 * )
 */
class CountryUpdateIntput
{
    /**
     * @OA\Property(
     *     description="id",
     *     title="The id of country",
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     description="name",
     *     title="The name of country",
     * )
     *
     * @var string
     */
    private $name;
}
