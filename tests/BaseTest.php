<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

abstract class BaseTest extends TestCase
{
    use CreatesApplication, RefreshDatabase;
}