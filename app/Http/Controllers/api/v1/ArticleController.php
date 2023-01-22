<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ArticleService;

/*
*
     */

class ArticleController extends Controller
{



    private $articleService;

    /**
     * ArticleController constructor.
     *
     * @param \App\Services\ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->successResponse($this->articleService->fetchProducts());
    }

    /**
     * @param $product
     *
     * @return mixed
     */
    public function show($product)
    {
        return $this->successResponse($this->articleService->fetchArticle($product));
    }



    public function show_comments($article)
    {
        return $this->successResponse($this->articleService->fetchComments($article));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {

        return $this->successResponse($this->articleService->createProduct($request->all()));
    }

    public function store_comments(Request $request, $id)
    {

        return $this->successResponse( $this->articleService->store_comments($request->all(), $id));
    }

    public function show_likes(Request $request, $id)
    {

        return $this->successResponse( $this->articleService->show_likes($request->all(), $id));
    }


    public function show_views(Request $request, $id)
    {

        return $this->successResponse( $this->articleService->show_views($request->all(), $id));
    }

    public function like_article(Request $request, $id)
    {

        return $this->successResponse( $this->articleService->like_article( $request->all(),$id));
    }


    public function view_article(Request $request, $id)
    {

        return $this->successResponse( $this->articleService->view_article($request->all(), $id));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $product
     *
     * @return mixed
     */
    public function update(Request $request, $id)
    {

        return $this->successResponse($this->articleService->updateProduct($id, $request->all()));
    }

    /**
     * @param $product
     *
     * @return mixed
     */
    public function destroy($product)
    {
        return $this->successResponse($this->articleService->deleteProduct($product));
    }
}

