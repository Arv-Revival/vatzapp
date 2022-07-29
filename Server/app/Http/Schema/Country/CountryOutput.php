<?php

/**
 * Class CountryOutput
 *
 * @OA\Schema(
 *     title="CountryOutput model",
 *     description="Country output model",
 * )
 */
class CountryOutput
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
