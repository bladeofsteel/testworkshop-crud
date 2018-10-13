<?php
namespace TestWorkshop\Controller;

use TestWorkshop\Model\Article as ArticleModel;

class ViewArticle
{
    /**
     * @var \Slim\Views\PhpRenderer
     */
    private $view;
    /**
     * @var \Slim\Router
     */
    private $router;
    /**
     * @var \TestWorkshop\Model\Article
     */
    private $model;

    /**
     * Article constructor.
     *
     * @param                             $view
     * @param                             $router
     * @param \TestWorkshop\Model\Article $model
     */
    public function __construct($view, $router, ArticleModel $model)
    {
        $this->model = $model;
        $this->view = $view;
        $this->router = $router;
    }

    public function getArticleById($request, $response, $args)
    {
        $results = $this->model->fetch((int)$args['id']);
        $response = $this->view->render(
            $response,
            "article_detail.phtml",
            ["article" => $results, "router" => $this->router]
        );
        return $response;
    }
}
