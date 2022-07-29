<?php

/**
 * Class CountryIntput
 *
 * @OA\Schema(
 *     title="Country Intput model",
 *     description="Education input model",
 * )
 */
class CountryIntput
{
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
