<?php
$I = new WebGuy($scenario);
$I->wantTo('verifikasi halaman home');
$I->amOnPage('/');
$I->click('Login');
$I->fillField('username','admin');
$I->fillField('password','password');
$I->click('Submit');
$I->see('Success');

