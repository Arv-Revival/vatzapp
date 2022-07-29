<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    protected $user;
    protected $uploadFolder = "resources";

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['upload', 'download', 'view']]);
        $this->user = $this->guard()->user();
    }

    /**
     * @OA\Post(
     *     path="/api/file/upload",
     *     tags={"File"},
     *     summary="Upload file.",
     *     operationId="file_upload",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="file to upload",
     *                     property="file",
     *                     type="file",
     *                ),
     *                 required={"file"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="File uploaded successfully.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="File uploaded successfully."),
     *             @OA\Property(property="payload", type="object", ref="#/components/schemas/FileUploadOutput")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="File creation error.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="File creation error."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function upload(Request $request)
    {
        //image:jpeg,png,jpg,gif,svg
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|file|max:50000',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $image = $request->file('file');
        $image_uploaded_path = $image->store($this->uploadFolder, 'public');

        $file = File::create(
            [
                "note" => $request->input("note"),
                "file_path" => $image_uploaded_path
            ]
        );

        $payload = [
            "file_id" => $file->id
        ];

        return $this->send_response('File uploaded successfully', $payload, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/file/download",
     *     tags={"File"},
     *     summary="Download file.",
     *     operationId="file_download",
     *     @OA\Parameter(
     *         name="file_name",
     *         in="query",
     *         description="File name",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="File sent successfully.",
     *         @OA\Schema(
     *             @OA\Property(
     *                  description="File sent upload",
     *                  property="file",
     *                  type="file",
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="File not found.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="File not found."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function download(Request $request)
    {
        //image:jpeg,png,jpg,gif,svg
        $validator = Validator::make(
            $request->all(),
            [
                'file_name' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $image_uploaded_path = storage_path('app/public/' . $request->file_name);

        return response()->download($image_uploaded_path);
    }

    /**
     * @OA\Get(
     *     path="/api/file/view",
     *     tags={"File"},
     *     summary="View file.",
     *     operationId="file_view",
     *     @OA\Parameter(
     *         name="file_name",
     *         in="query",
     *         description="File name",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="File sent successfully.",
     *         @OA\Schema(
     *             @OA\Property(
     *                  description="File sent upload",
     *                  property="file",
     *                  type="file",
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="File not found.",
     *         @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="File not found."),
     *             @OA\Property(property="payload", type="object")
     *         )
     *     )
     * )
     */
    public function view(Request $request)
    {
        //image:jpeg,png,jpg,gif,svg
        $validator = Validator::make(
            $request->all(),
            [
                'file_name' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return $this->send_validation_error_response($error);
        }

        $image_uploaded_path = storage_path('app/public/' . $request->file_name);

        return response()->file($image_uploaded_path);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
