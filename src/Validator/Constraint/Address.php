<?php

declare(strict_types=1);

/*
 * This file is part of the BazingaGeocoderBundle package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

namespace Bazinga\GeocoderBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * @author Tomas Norkūnas <norkunas.tom@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Address extends Constraint
{
    public const INVALID_ADDRESS_ERROR = '2243aa07-2ea7-4eb7-962c-6a9586593f2c';

    protected const ERROR_NAMES = [
        self::INVALID_ADDRESS_ERROR => 'INVALID_ADDRESS_ERROR',
    ];

    /**
     * @param class-string $service
     */
    public function __construct(
        public string $message = 'Address {{ address }} is not valid.',
        public string $service = AddressValidator::class,
        ?array $groups = null,
        mixed $payload = null,
    ) {
        parent::__construct(null, $groups, $payload);

        $this->message = $message ?? $this->message;
    }

    public function validatedBy(): string
    {
        return $this->service;
    }
}
