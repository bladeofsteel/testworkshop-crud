<?php

// Routes

//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//    // Render index view
//    return phpinfo();//$this->renderer->render($response, 'index.phtml', $args);
//}
//);


// GET index route
$app->get('/', TestWorkshop\Controller\ArticleList::class . ':getArticles')->setName('list-articles');
// GET new article route
$app->get('/article/new', \TestWorkshop\Controller\NewArticle::class . ':newArticle')->setName('new-article');
// POST add new article route
$app->post('/article/new', \TestWorkshop\Controller\AddArticle::class . ':save')->setName('add-article');
// GET view article route
$app->get('/article/{id}', \TestWorkshop\Controller\ViewArticle::class . ':getArticleById')->setName('article-detail');
// GET edit article route
$app->get('/article/edit/{id}', \TestWorkshop\Controller\EditArticle::class . ':edit')->setName('article-edit');
// POST update article route
$app->post('/article/update/{id}', \TestWorkshop\Controller\UpdateArticle::class . ':save')->setName('article-update');
// GET delete article route
$app->get('/article/delete/{id}', \TestWorkshop\Controller\DeleteArticle::class . ':drop')->setName('article-delete');
