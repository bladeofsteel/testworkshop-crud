<?php
namespace TestWorkshop\Controller;

use TestWorkshop\Model\Article as ArticleModel;

class AddArticle
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

    public function save($request, $response, $args)
    {
        // Parse received fields
        $data = $request->getParsedBody();
        $customer_data = [];
        foreach (['name', 'body'] as $fieldData) {
            $customer_data[$fieldData] = filter_var($data[$fieldData], FILTER_SANITIZE_STRING);
        }
        $this->model->store($customer_data);
        $response = $response->withRedirect("/");

        return $response;
    }
}
