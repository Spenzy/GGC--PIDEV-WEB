<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerEnsbaip\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerEnsbaip/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerEnsbaip.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerEnsbaip\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerEnsbaip\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'Ensbaip',
    'container.build_id' => '943dcbcb',
    'container.build_time' => 1649538361,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerEnsbaip');
