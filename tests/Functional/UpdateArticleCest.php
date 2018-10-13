<?php

class UpdateArticleCest
{
    public function tryUpdateArticle(FunctionalTester $I)
    {
        $I->seeInDatabase('articles', ['id' => 1]);
        $I->amOnPage('/article/edit/1');
        $I->fillField(['name' => 'name'], 'New article');
        $I->fillField(['name' => 'body'], 'Article Body');
        $I->click('Update');
        $I->seeInDatabase('articles', ['id' => 1, 'name' => 'New article', 'body' => 'Article Body']);
    }
}
