<?php

namespace FriendsOfBehat\SuiteSettingsExtension\ServiceContainer;

use Behat\Testwork\ServiceContainer\Extension;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Kamil Kokot <kamil@kokot.me>
 */
final class SuiteSettingsExtension implements Extension
{
    /**
     * {@inheritdoc}
     */
    public function getConfigKey()
    {
        return 'fob_suite_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(ExtensionManager $extensionManager)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        $builder
            ->validate()
                ->ifTrue(function ($value) { return !is_array($value); })
                ->thenInvalid('Configuration should be an array')
        ;

        $builder->prototype('variable')->defaultValue([]);
    }

    /**
     * {@inheritdoc}
     */
    public function load(ContainerBuilder $container, array $config)
    {
        $container->setParameter('suite.generic.default_settings', array_merge(
            $container->getParameter('suite.generic.default_settings'),
            $config
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {

    }
}
