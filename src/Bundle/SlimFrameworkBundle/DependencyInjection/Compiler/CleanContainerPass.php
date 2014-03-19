<?php

namespace Bundle\SlimFrameworkBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Class CleanContainerPass
 *
 * @package Bundle\SlimFrameworkBundle\DependencyInjection\Compiler
 */
class CleanContainerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        /**
         * @TODO
         * Remove services with tag 'translation.loader'
         * Remove services with tag 'translation.dumper'
         * Remove services with tag 'translation.extractor'
         * Remove services with tag 'kernel.fragment_renderer'
         *
         * Remove LocaleListener
         */
    }
}
