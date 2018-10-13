<?php

class AddArticleCest
{
    public function tryAddNewArticle(FunctionalTester $I)
    {
        $I->dontSeeInDatabase('articles', ['name' => 'New article']);
        $I->amOnPage('/');
        $I->see('Add a new article', 'button');
        $I->click('Add a new article');
        $I->amOnPage('/article/new');
        $I->fillField(['name' => 'name'], 'New article');
        $I->fillField(['name' => 'body'], 'Article Body');
        $I->click('Create');
        $I->seeInDatabase('articles', ['name' => 'New article']);
    }
}
