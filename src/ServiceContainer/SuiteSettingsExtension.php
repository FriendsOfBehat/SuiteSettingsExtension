<?php

declare(strict_types=1);

/*
 * This file is part of the SuiteSettingsExtension package.
 *
 * (c) Kamil Kokot <kamil@kokot.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FriendsOfBehat\SuiteSettingsExtension\ServiceContainer;

use Behat\Testwork\ServiceContainer\Extension;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class SuiteSettingsExtension implements Extension
{
    /**
     * {@inheritdoc}
     */
    public function getConfigKey(): string
    {
        return 'fob_suite_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(ExtensionManager $extensionManager): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function configure(ArrayNodeDefinition $builder): void
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
    public function load(ContainerBuilder $container, array $config): void
    {
        $container->setParameter('suite.generic.default_settings', array_merge(
            $container->getParameter('suite.generic.default_settings'),
            $config
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container): void
    {
    }
}
