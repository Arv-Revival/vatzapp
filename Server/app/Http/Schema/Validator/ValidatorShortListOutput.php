<?php

/**
 * Class ValidatorShortListOutput
 *
 * @OA\Schema(
 *     schema="ValidatorShortListOutput",
 *     title="Validator short list output model",
 *     type="object"
 * )
 */
class ValidatorShortListOutput
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
}
