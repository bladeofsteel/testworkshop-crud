<?php 

class ArticleDetailCest
{
    public function tryViewArticleDetail(FunctionalTester $I)
    {
        $I->amOnPage('/article/2');
        $I->see('Another Article');
        $I->see('Second article body');
    }
}
