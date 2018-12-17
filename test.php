<?php
/**
 * Created by PhpStorm.
 * User: Jiang Yu
 * Date: 2018/12/17
 * Time: 15:39.
 */

require __DIR__.'/bootstrap.php';

use App\NewsletterManager;

$isDebug = true;
$container = appServiceContainerLoader($isDebug);

try {
    /** @var NewsletterManager $manager */
    $manager = $container->get(NewsletterManager::class);
    var_dump($manager);
} catch (\Throwable $exception) {
    var_dump($exception->getMessage());
    exit;
}

$manager->send('aaa');
