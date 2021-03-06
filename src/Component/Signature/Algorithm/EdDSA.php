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

namespace Jose\Component\Signature\Algorithm;

use Base64Url\Base64Url;
use Jose\Component\Core\JWK;

final class EdDSA implements SignatureAlgorithm
{
    /**
     * {@inheritdoc}
     */
    public function allowedKeyTypes(): array
    {
        return ['OKP'];
    }

    /**
     * {@inheritdoc}
     */
    public function sign(JWK $key, string $input): string
    {
        $this->checkKey($key);
        if (!$key->has('d')) {
            throw new \InvalidArgumentException('The key is not private.');
        }
        $secret = Base64Url::decode($key->get('d'));
        $keyPair = sodium_crypto_sign_seed_keypair($secret);
        $secretKey = sodium_crypto_sign_secretkey($keyPair);

        switch ($key->get('crv')) {
            case 'Ed25519':
                return sodium_crypto_sign_detached($input, $secretKey);
            default:
                throw new \InvalidArgumentException('Unsupported curve');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function verify(JWK $key, string $input, string $signature): bool
    {
        $this->checkKey($key);

        $public = Base64Url::decode($key->get('x'));

        switch ($key->get('crv')) {
            case 'Ed25519':
                return sodium_crypto_sign_verify_detached($signature, $input, $public);
            default:
                throw new \InvalidArgumentException('Unsupported curve');
        }
    }

    /**
     * @param JWK $key
     */
    private function checkKey(JWK $key)
    {
        if (!in_array($key->get('kty'), $this->allowedKeyTypes())) {
            throw new \InvalidArgumentException('Wrong key type.');
        }
        foreach (['x', 'crv'] as $k) {
            if (!$key->has($k)) {
                throw new \InvalidArgumentException(sprintf('The key parameter "%s" is missing.', $k));
            }
        }
        if (!in_array($key->get('crv'), ['Ed25519'])) {
            throw new \InvalidArgumentException('Unsupported curve.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function name(): string
    {
        return 'EdDSA';
    }
}
