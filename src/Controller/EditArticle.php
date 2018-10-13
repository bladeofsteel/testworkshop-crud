<?php
namespace TestWorkshop\Controller;

use TestWorkshop\Model\Article as ArticleModel;

class EditArticle
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

    public function edit($request, $response, $args)
    {
        $articleId = (int)$args['id'];
        $articleId = filter_var($articleId, FILTER_SANITIZE_STRING);
        $article = $this->model->fetch($articleId);
        return $this->view->render($response, "article_update.phtml", ["article" => $article]);
    }
}
