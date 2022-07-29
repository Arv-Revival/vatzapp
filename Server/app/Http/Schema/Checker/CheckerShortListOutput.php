<?php

/**
 * Class CheckerShortListOutput
 *
 * @OA\Schema(
 *     schema="CheckerShortListOutput",
 *     title="Checker short list output model",
 *     type="object"
 * )
 */
class CheckerShortListOutput
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
