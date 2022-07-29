<?php

/**
 * Class ChangePasswordIntput
 *
 * @OA\Schema(
 *     title="ChangePasswordIntput model",
 *     description="ChangePasswordIntput model",
 * )
 */
class ChangePasswordIntput
{
    /**
     * @OA\Property(
     *     description="Old password",
     * )
     *
     * @var string
     */
    private $old_password;

        /**
     * @OA\Property(
     *     description="New password",
     * )
     *
     * @var string
     */
    private $new_password;
}
