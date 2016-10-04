Feature: Custom features path
    In order to change the default features path
    As a SuiteSettingsExtension user
    I want to overwrite default suite settings

    Scenario: Custom features path
        Given a Behat configuration containing:
        """
        default:
            autoload:
                - "%paths.base%/custom_features/bootstrap"

            extensions:
                FriendsOfBehat\SuiteSettingsExtension:
                    paths:
                        - "custom_features"
        """
        And a context file "custom_features/bootstrap/FeatureContext.php" containing:
        """
        <?php

        use Behat\Behat\Context\Context;

        class FeatureContext implements Context
        {
            /** @Then it passes */
            public function itPasses() {}
        }
        """
        And a feature file "custom_features/passing.feature" containing:
        """
        Feature: Passing feature

            Scenario: Passing scenario
                Then it passes
        """
        When I run Behat
        Then it should pass
