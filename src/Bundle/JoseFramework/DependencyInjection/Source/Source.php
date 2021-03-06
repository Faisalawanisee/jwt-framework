<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2018 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Jose\Bundle\JoseFramework\DependencyInjection\Source;

use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

interface Source
{
    /**
     * @return string
     */
    public function name(): string;

    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container);

    /**
     * @param NodeDefinition $node
     */
    public function getNodeDefinition(NodeDefinition $node);

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     *
     * @return array
     */
    public function prepend(ContainerBuilder $container, array $config): array;
}
