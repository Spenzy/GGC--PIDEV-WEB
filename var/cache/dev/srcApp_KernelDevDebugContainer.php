<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQNjwwwo\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQNjwwwo/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerQNjwwwo.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerQNjwwwo\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerQNjwwwo\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'QNjwwwo',
    'container.build_id' => 'ebcc6bab',
    'container.build_time' => 1650196438,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerQNjwwwo');
