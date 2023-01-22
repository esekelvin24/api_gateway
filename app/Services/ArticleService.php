<?php

//declare(strict_types = 1);

namespace App\Services;

use App\Traits\RequestService;

use function config;

class ArticleService
{
    use RequestService;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $secret;

    /**
     * ProductService constructor.
     */
    public function __construct()
    {
        $this->baseUri = config('services.article.base_uri');
        $this->secret = config('services.article.secret');
    }

    /**
     * @return string
     */
    public function fetchProducts() : string
    {

        return $this->request('GET', '/api/v1/articles');
    }

    /**
     * @param $article
     *
     * @return string
     */
    public function fetchArticle($article) : string
    {

        return $this->request('GET', "/api/v1/articles/{$article}");
    }

    public function fetchComments($article) : string
    {

        return $this->request('GET', "/api/v1/articles/{$article}/comments");
    }



    /**
     * @param $data
     *
     * @return string
     */
    public function createProduct($data) : string
    {
        return $this->request('POST', '/api/v1/articles', $data);
    }

    public function store_comments($data, $id) : string
    {
        return $this->request('POST', '/api/v1/articles/'.$id.'/comments', $data);
    }

    public function show_likes($data, $id) : string
    {

        return $this->request('GET', '/api/v1/articles/'.$id.'/likes', $data);
    }

    public function show_views($data, $id) : string
    {
        return $this->request('GET', '/api/v1/articles/'.$id.'/views', $data);
    }

    public function like_article($data, $id) : string
    {

        return $this->request('PUT', '/api/v1/articles/'.$id.'/likes', $data);
    }

    public function view_article($data, $id) : string
    {
        return $this->request('PUT', '/api/v1/articles/'.$id.'/views', $data);
    }







    /**
     * @param $product
     * @param $data
     *
     * @return string
     */
    public function updateProduct($product, $data) : string
    {

        return $this->request('PATCH', "/api/v1/articles/{$product}", $data);
    }

    /**
     * @param $product
     *
     * @return string
     */
    public function deleteProduct($product) : string
    {
        return $this->request('DELETE', "/api/v1/articles/{$product}");
    }
}

?>
