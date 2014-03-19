<?php

namespace Bundle\SlimFrameworkBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Bundle\SlimFrameworkBundle\DependencyInjection\Compiler\CleanContainerPass;

/**
 * SlimFrameworkBundle.
 *
 * @author Ian Monge <ianmonge@gmail.com>
 */
class SlimFrameworkBundle extends Bundle
{
    /**
     * @TODO Maybe add reference to parent bundle
     */

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CleanContainerPass());
    }
}
