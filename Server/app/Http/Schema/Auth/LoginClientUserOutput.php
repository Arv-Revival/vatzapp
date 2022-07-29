<?php

/**
 * Class LoginClientUserOutput
 *
 * @OA\Schema(
 *     title="LoginClientUserOutput model",
 *     description="Login client user output model",
 * )
 */
class LoginClientUserOutput
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

    /**
     * @OA\Property(
     *     description="Is checker assigned",
     * )
     *
     * @var integer
     */
    private $is_checker_assigned;
}
