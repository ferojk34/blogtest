<?php

namespace Modules\Blog\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Modules\Blog\Transformers\BlogResource;
use Modules\Blog\Repositories\BlogRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Core\Http\Controllers\BaseController;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogController extends BaseController
{
    protected $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function resource(object $blog): JsonResource
    {
        return new BlogResource($blog);
    }

    public function collection(object $blog): ResourceCollection
    {
        return BlogResource::collection($blog);
    }

    public function index(Request $request)
    {
        try {
            $blogs = $this->repository->fetchAll(
                request: $request
            );
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }

        return $this->successResponse(
            payload: $this->collection($blogs),
            message: "fetch-success",
        );
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $blog = $this->repository->storeBlog($request);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }

        return $this->successResponse(
            payload: $this->resource($blog),
            message: "create-success",
            response_code: Response::HTTP_CREATED
        );
    }

    public function show(int $id): JsonResponse
    {
        try {
            $fetched = $this->repository->fetch($id);
        }
        catch (Exception $exception) {
            return $this->handleException($exception);
        }

        return $this->successResponse(
            payload: $this->resource($fetched),
            message: "fetch-success"
        );
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $blog = $this->repository->updateBlog($request, $id);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }

        return $this->successResponse(
            payload: $this->resource($blog),
            message: "update-success"
        );
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->repository->delete($id);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }

        return $this->successResponseWithMessage(
            message: "delete-success"
        );
    }
}
