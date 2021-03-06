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

namespace Jose\Bundle\JoseFramework\Helper;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class ConfigurationHelper
{
    const BUNDLE_ALIAS = 'jose';

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $signatureAlgorithms
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWSBuilder(ContainerBuilder $container, string $name, array $signatureAlgorithms, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jws' => [
                    'builders' => [
                        $name => [
                            'is_public'            => $is_public,
                            'signature_algorithms' => $signatureAlgorithms,
                            'tags'                 => $tags,
                        ],
                    ],
                ],
            ],
        ];
        self::updateJoseConfiguration($container, $config, 'jws');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $signatureAlgorithms
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWSVerifier(ContainerBuilder $container, string $name, array $signatureAlgorithms, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jws' => [
                    'verifiers' => [
                        $name => [
                            'is_public'            => $is_public,
                            'signature_algorithms' => $signatureAlgorithms,
                            'tags'                 => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jws');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $serializers
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWSSerializer(ContainerBuilder $container, string $name, array $serializers, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jws' => [
                    'serializers' => [
                        $name => [
                            'is_public'   => $is_public,
                            'serializers' => $serializers,
                            'tags'        => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jws');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $serializers
     * @param string[]         $signature_algorithms
     * @param string[]         $header_checkers
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWSLoader(ContainerBuilder $container, string $name, array $serializers, array $signature_algorithms, array $header_checkers, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jws' => [
                    'loaders' => [
                        $name => [
                            'is_public'            => $is_public,
                            'serializers'          => $serializers,
                            'signature_algorithms' => $signature_algorithms,
                            'header_checkers'      => $header_checkers,
                            'tags'                 => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jws');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $jwe_serializers
     * @param string[]         $key_encryption_algorithms
     * @param string[]         $content_encryption_algorithms
     * @param string[]         $compression_methods
     * @param string[]         $jwe_header_checkers
     * @param string[]         $jws_serializers
     * @param string[]         $signature_algorithms
     * @param string[]         $jws_header_checkers
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addNestedTokenLoader(ContainerBuilder $container, string $name, array $jwe_serializers, array $key_encryption_algorithms, array $content_encryption_algorithms, array $compression_methods, array $jwe_header_checkers, array $jws_serializers, array $signature_algorithms, array $jws_header_checkers, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'nested_token' => [
                    'loaders' => [
                        $name => [
                            'is_public'                     => $is_public,
                            'jwe_serializers'               => $jwe_serializers,
                            'key_encryption_algorithms'     => $key_encryption_algorithms,
                            'content_encryption_algorithms' => $content_encryption_algorithms,
                            'compression_methods'           => $compression_methods,
                            'jwe_header_checkers'           => $jwe_header_checkers,
                            'jws_serializers'               => $jws_serializers,
                            'signature_algorithms'          => $signature_algorithms,
                            'jws_header_checkers'           => $jws_header_checkers,
                            'tags'                          => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'nested_token');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $jwe_serializers
     * @param string[]         $key_encryption_algorithms
     * @param string[]         $content_encryption_algorithms
     * @param string[]         $compression_methods
     * @param string[]         $jws_serializers
     * @param string[]         $signature_algorithms
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addNestedTokenBuilder(ContainerBuilder $container, string $name, array $jwe_serializers, array $key_encryption_algorithms, array $content_encryption_algorithms, array $compression_methods, array $jws_serializers, array $signature_algorithms, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'nested_token' => [
                    'builders' => [
                        $name => [
                            'is_public'                     => $is_public,
                            'jwe_serializers'               => $jwe_serializers,
                            'key_encryption_algorithms'     => $key_encryption_algorithms,
                            'content_encryption_algorithms' => $content_encryption_algorithms,
                            'compression_methods'           => $compression_methods,
                            'jws_serializers'               => $jws_serializers,
                            'signature_algorithms'          => $signature_algorithms,
                            'tags'                          => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'nested_token');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $serializers
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWESerializer(ContainerBuilder $container, string $name, array $serializers, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jwe' => [
                    'serializers' => [
                        $name => [
                            'is_public'   => $is_public,
                            'serializers' => $serializers,
                            'tags'        => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jwe');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $serializers
     * @param string[]         $key_encryption_algorithms
     * @param string[]         $content_encryption_algorithms
     * @param string[]         $compression_methods
     * @param string[]         $header_checkers
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWELoader(ContainerBuilder $container, string $name, array $serializers, array $key_encryption_algorithms, array $content_encryption_algorithms, array $compression_methods, array $header_checkers, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jwe' => [
                    'loaders' => [
                        $name => [
                            'is_public'                     => $is_public,
                            'serializers'                   => $serializers,
                            'key_encryption_algorithms'     => $key_encryption_algorithms,
                            'content_encryption_algorithms' => $content_encryption_algorithms,
                            'compression_methods'           => $compression_methods,
                            'header_checkers'               => $header_checkers,
                            'tags'                          => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jwe');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $claimCheckers
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addClaimChecker(ContainerBuilder $container, string $name, array  $claimCheckers, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'checkers' => [
                    'claims' => [
                        $name => [
                            'is_public' => $is_public,
                            'claims'    => $claimCheckers,
                            'tags'      => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'checkers');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string[]         $headerCheckers
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addHeaderChecker(ContainerBuilder $container, string $name, array  $headerCheckers, bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'checkers' => [
                    'headers' => [
                        $name => [
                            'is_public' => $is_public,
                            'headers'   => $headerCheckers,
                            'tags'      => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'checkers');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string           $type
     * @param array            $parameters
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addKey(ContainerBuilder $container, string $name, string $type, array  $parameters, bool $is_public = true, array $tags = [])
    {
        $parameters['is_public'] = $is_public;
        $parameters['tags'] = $tags;
        $config = [
            self::BUNDLE_ALIAS => [
                'keys' => [
                    $name => [
                        $type => $parameters,
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'keys');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param string           $type
     * @param array            $parameters
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addKeyset(ContainerBuilder $container, string $name, string $type, array  $parameters, bool $is_public = true, array $tags = [])
    {
        $parameters['is_public'] = $is_public;
        $parameters['tags'] = $tags;
        $config = [
            self::BUNDLE_ALIAS => [
                'key_sets' => [
                    $name => [
                        $type => $parameters,
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'key_sets');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param array            $parameters
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addKeyUri(ContainerBuilder $container, string $name, array $parameters, bool $is_public = true, array $tags = [])
    {
        $parameters['is_public'] = $is_public;
        $parameters['tags'] = $tags;
        $config = [
            self::BUNDLE_ALIAS => [
                'jwk_uris' => [
                    $name => $parameters,
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jwk_uris');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param array            $keyEncryptionAlgorithm
     * @param array            $contentEncryptionAlgorithms
     * @param array            $compressionMethods
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWEBuilder(ContainerBuilder $container, string $name, array $keyEncryptionAlgorithm, array $contentEncryptionAlgorithms, array $compressionMethods = ['DEF'], bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jwe' => [
                    'builders' => [
                        $name => [
                            'is_public'                     => $is_public,
                            'key_encryption_algorithms'     => $keyEncryptionAlgorithm,
                            'content_encryption_algorithms' => $contentEncryptionAlgorithms,
                            'compression_methods'           => $compressionMethods,
                            'tags'                          => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jwe');
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $name
     * @param array            $keyEncryptionAlgorithm
     * @param array            $contentEncryptionAlgorithms
     * @param array            $compressionMethods
     * @param bool             $is_public
     * @param array            $tags
     */
    public static function addJWEDecrypter(ContainerBuilder $container, string $name, array $keyEncryptionAlgorithm, array $contentEncryptionAlgorithms, array $compressionMethods = ['DEF'], bool $is_public = true, array $tags = [])
    {
        $config = [
            self::BUNDLE_ALIAS => [
                'jwe' => [
                    'decrypters' => [
                        $name => [
                            'is_public'                     => $is_public,
                            'key_encryption_algorithms'     => $keyEncryptionAlgorithm,
                            'content_encryption_algorithms' => $contentEncryptionAlgorithms,
                            'compression_methods'           => $compressionMethods,
                            'tags'                          => $tags,
                        ],
                    ],
                ],
            ],
        ];

        self::updateJoseConfiguration($container, $config, 'jwe');
    }

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     * @param string           $element
     */
    private static function updateJoseConfiguration(ContainerBuilder $container, array $config, string $element)
    {
        $jose_config = current($container->getExtensionConfig(self::BUNDLE_ALIAS));
        if (!isset($jose_config[$element])) {
            $jose_config[$element] = [];
        }
        $jose_config[$element] = array_merge($jose_config[$element], $config[self::BUNDLE_ALIAS][$element]);
        $container->prependExtensionConfig(self::BUNDLE_ALIAS, $jose_config);
    }
}
