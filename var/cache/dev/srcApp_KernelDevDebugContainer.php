<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container84P8O54\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container84P8O54/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container84P8O54.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container84P8O54\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \Container84P8O54\srcApp_KernelDevDebugContainer([
    'container.build_hash' => '84P8O54',
    'container.build_id' => '42fc24d7',
    'container.build_time' => 1650121293,
], __DIR__.\DIRECTORY_SEPARATOR.'Container84P8O54');
