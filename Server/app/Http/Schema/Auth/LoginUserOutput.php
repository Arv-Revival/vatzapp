<?php

/**
 * Class LoginUserOutput
 *
 * @OA\Schema(
 *     title="LoginUserOutput model",
 *     description="Login user output model",
 * )
 */
class LoginUserOutput
{
    /**
     * @OA\Property(
     *     description="Token",
     * )
     *
     * @var string
     */
    private $token;

    /**
     * @OA\Property(
     *     description="Token type",
     * )
     *
     * @var string
     */
    private $token_type;

    /**
     * @OA\Property(
     *     description="Token validity",
     * )
     *
     * @var integer
     */
    private $token_validity;

    /**
     * @OA\Property(
     *     description="User Name",
     * )
     *
     * @var string
     */
    private $user_name;

    /**
     * @OA\Property(
     *     description="User role",
     * )
     *
     * @var string
     */
    private $user_role;

    /**
     * @OA\Property(
     *     description="The user role ID",
     * )
     *
     * @var integer
     */
    private $user_role_id;

    /**
     * @OA\Property(
     *     description="Profile image",
     * )
     *
     * @var string
     */
    private $profile_image;
}
