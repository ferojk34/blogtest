<?php

namespace Modules\Blog\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\BlogRepository;
use Modules\Core\Http\Controllers\BaseController;

class BlogController extends BaseController
{
    protected $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
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

        return $this->successResponse($blogs);
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
