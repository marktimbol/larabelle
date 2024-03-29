<?php

namespace Tests;

// use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, ActingAs, CreateModels;

    public $baseUrl = 'http://localhost';
}
