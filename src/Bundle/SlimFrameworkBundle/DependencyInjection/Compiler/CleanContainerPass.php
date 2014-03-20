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
        $this->removeTranslation($container);
        $this->removeFragment($container);
        $this->removeLocaleListener($container);
        $this->removeSecureRandom($container);
    }

    /**
     * @param ContainerBuilder $container
     */
    private function removeTranslation(ContainerBuilder $container)
    {
        $this->removeTranslationDefinitions($container);
        $this->removeTranslationLoaderDefinitions($container);
        $this->removeTranslationDumperDefinitions($container);
    }

    /**
     * @param ContainerBuilder $container
     */
    private function removeTranslationDefinitions(ContainerBuilder $container)
    {
        $container->removeDefinition('translation.extractor');
        $container->removeDefinition('translation.extractor.php');
        $container->removeDefinition('translation.loader');
        $container->removeDefinition('translation.writer');
        $container->removeDefinition('translator');
        $container->removeDefinition('translator.default');
        $container->removeDefinition('translator.selector');

        $container->getParameterBag()->remove('translation.extractor.class');
        $container->getParameterBag()->remove('translation.extractor.php.class');
        $container->getParameterBag()->remove('translation.loader.class');
        $container->getParameterBag()->remove('translation.writer.class');
        $container->getParameterBag()->remove('translator.class');
        $container->getParameterBag()->remove('translator.identity.class');
        $container->getParameterBag()->remove('translator.selector.class');
    }

    /**
     * @param ContainerBuilder $container
     */
    private function removeTranslationLoaderDefinitions(ContainerBuilder $container)
    {
        $taggedDefinitions = $container->findTaggedServiceIds('translation.loader');

        foreach (array_keys($taggedDefinitions) as $definitionId) {
            $container->removeDefinition($definitionId);
            $container->getParameterBag()->remove($definitionId . '.class');
        }

    }

    /**
     * @param ContainerBuilder $container
     */
    private function removeTranslationDumperDefinitions(ContainerBuilder $container)
    {
        $taggedDefinitions = $container->findTaggedServiceIds('translation.dumper');

        foreach (array_keys($taggedDefinitions) as $definitionId) {
            $container->removeDefinition($definitionId);
            $container->getParameterBag()->remove($definitionId . '.class');
        }
    }

    /**
     * @param ContainerBuilder $container
     */
    private function removeFragment(ContainerBuilder $container)
    {
        $container->removeDefinition('fragment.handler');
        $container->removeDefinition('fragment.renderer.esi');
        $container->removeDefinition('fragment.renderer.hinclude');
        $container->removeDefinition('fragment.renderer.inline');
        $container->removeDefinition('uri_signer');

        $container->getParameterBag()->remove('fragment.handler.class');
        $container->getParameterBag()->remove('fragment.path');
        $container->getParameterBag()->remove('fragment.renderer.esi.class');
        $container->getParameterBag()->remove('fragment.renderer.hinclude.class');
        $container->getParameterBag()->remove('fragment.renderer.hinclude.global_template');
        $container->getParameterBag()->remove('fragment.renderer.inline.class');
        $container->getParameterBag()->remove('uri_signer.class');
    }

    /**
     * @param ContainerBuilder $container
     */
    private function removeLocaleListener(ContainerBuilder $container)
    {
        $container->removeDefinition('locale_listener');
        $container->getParameterBag()->remove('locale_listener.class');
    }

    /**
     * @param ContainerBuilder $container
     */
    private function removeSecureRandom(ContainerBuilder $container)
    {
        $container->removeDefinition('security.secure_random');
        $container->getParameterBag()->remove('security.secure_random.class');
    }
}
