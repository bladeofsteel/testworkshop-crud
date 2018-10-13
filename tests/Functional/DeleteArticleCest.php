<?php

class DeleteArticleCest
{
    public function tryDeleteExistedArticle(FunctionalTester $I)
    {
        $I->seeInDatabase('articles', ['id' => 1]);
        $I->amOnPage('/');
        $I->see('First article');
        $I->click('a[href="/article/delete/1"]');
        $I->dontSeeInDatabase('articles', ['id' => 1]);
    }
}
