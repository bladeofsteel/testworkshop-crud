<?php
namespace TestWorkshop\Controller;

use TestWorkshop\Model\Article as ArticleModel;

class NewArticle
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

    public function newArticle($request, $response)
    {
        $response = $this->view->render($response, "article_add.phtml");
        return $response;
    }
}
