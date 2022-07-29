<?php

/**
 * Class FileUploadOutput
 *
 * @OA\Schema(
 *     title="FileUploadOutput model",
 *     description="File upload output model",
 * )
 */
class FileUploadOutput
{
    /**
     * @OA\Property(
     *     description="file_id",
     *     title="The id of file",
     * )
     *
     * @var integer
     */
    private $file_id;
}
