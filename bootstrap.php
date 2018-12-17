<?php
/**
 * Created by PhpStorm.
 * User: Jiang Yu
 * Date: 2018/12/17
 * Time: 16:27.
 */

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

if (!function_exists('appServiceContainerLoader')) {
    /**
     * @param bool $isDebug
     *
     * @return \Symfony\Component\DependencyInjection\Container
     */
    function appServiceContainerLoader(bool $isDebug): \Symfony\Component\DependencyInjection\Container
    {
        $appServiceContainerClass = 'AppServiceContainer';
        $cachedServiceContainerFile = __DIR__.'/runtime/cache/container.php';
        $containerConfigCache = new ConfigCache($cachedServiceContainerFile, $isDebug);

        if (!$containerConfigCache->isFresh()) {
            $containerBuilder = new ContainerBuilder();
            $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__.'/config'));
            try {
                $loader->load('services.yaml');
            } catch (\Throwable $exception) {
                var_dump($exception->getMessage());
            }
            $containerBuilder->compile();

            $dumper = new PhpDumper($containerBuilder);
            $containerConfigCache->write(
                $dumper->dump(['class' => $appServiceContainerClass]),
                $containerBuilder->getResources()
            );
        }

        require_once $cachedServiceContainerFile;
        $container = new $appServiceContainerClass();

        return $container;
    }
};
