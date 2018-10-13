<?php 

class ArticleListCest
{
    public function tryViewArticleList(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('First article');
        $I->see('Another article');
    }
}
