Feature: Custom default context class
    In order to change the default context class
    As a SuiteSettingsExtension user
    I want to overwrite default suite settings

    Scenario: Custom default context path
        Given a Behat configuration containing:
        """
        default:
            extensions:
                FriendsOfBehat\SuiteSettingsExtension:
                    contexts:
                        - "CustomFeatureContext"
        """
        And a context file "features/bootstrap/CustomFeatureContext.php" containing:
        """
        <?php

        use Behat\Behat\Context\Context;

        class CustomFeatureContext implements Context
        {
            /** @Then it passes */
            public function itPasses() {}
        }
        """
        And a feature file "features/passing.feature" containing:
        """
        Feature: Passing feature

            Scenario: Passing scenario
                Then it passes
        """
        When I run Behat
        Then it should pass
