<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// Database
$container['pdo'] = function ($c) {
    $dbSettings = $c['settings']['db'];
    $dsn = "mysql:host={$dbSettings['host']};dbname={$dbSettings['database']};charset=utf8";
    $usr = $dbSettings['username'];
    $pwd = $dbSettings['password'];
    $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
    return $pdo;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Article Model
$container[TestWorkshop\Model\Article::class] = function ($c) {
    return new \TestWorkshop\Model\Article($c['pdo']);
};

// Article Controller
$container[TestWorkshop\Controller\ArticleList::class] = function ($c) {
    return new \TestWorkshop\Controller\ArticleList($c['renderer'], $c['router'], $c[TestWorkshop\Model\Article::class]);
};
$container[TestWorkshop\Controller\NewArticle::class] = function ($c) {
    return new \TestWorkshop\Controller\NewArticle($c['renderer'], $c['router'], $c[TestWorkshop\Model\Article::class]);
};
$container[TestWorkshop\Controller\AddArticle::class] = function ($c) {
    return new \TestWorkshop\Controller\AddArticle($c['renderer'], $c['router'], $c[TestWorkshop\Model\Article::class]);
};
$container[TestWorkshop\Controller\EditArticle::class] = function ($c) {
    return new \TestWorkshop\Controller\EditArticle($c['renderer'], $c['router'], $c[TestWorkshop\Model\Article::class]);
};
$container[TestWorkshop\Controller\UpdateArticle::class] = function ($c) {
    return new \TestWorkshop\Controller\UpdateArticle($c['renderer'], $c['router'], $c[TestWorkshop\Model\Article::class]);
};
$container[TestWorkshop\Controller\DeleteArticle::class] = function ($c) {
    return new \TestWorkshop\Controller\DeleteArticle($c['renderer'], $c['router'], $c[TestWorkshop\Model\Article::class]);
};
$container[TestWorkshop\Controller\ViewArticle::class] = function ($c) {
    return new \TestWorkshop\Controller\ViewArticle($c['renderer'], $c['router'], $c[TestWorkshop\Model\Article::class]);
};
