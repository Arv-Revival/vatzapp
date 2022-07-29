<?php

/**
 * Class LoginUserInput
 *
 * @OA\Schema(
 *     schema="LoginUserInput",
 *     title="Login User Input model",
 *     description="Login user input model",
 *     type="object"
 * )
 */
class LoginUserInput
{
    /**
     * @OA\Property(
     *     description="Email",
     *     title="Email",
     *     type="string",
     *     example="abc@gmail.com"      
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     description="Password",
     *     title="Password",
     *     maximum=255
     * )
     *
     * @var string
     */
    private $password;
}
