<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

/**
 * @author Kamil Kokot <kamil@kokot.me>
 */
final class CustomFeatureContext implements Context
{
    /**
     * @Given turpis proin nisl ante
     * @When cursus at condimentum vel
     * @Then ornare sed metus
     */
    public function doNothing()
    {

    }
}
