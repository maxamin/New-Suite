<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Microvisor
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Microvisor\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;
use Twilio\Deserialize;


/**
 * @property string|null $key
 * @property \DateTime|null $dateRotated
 * @property string|null $url
 */
class AccountSecretInstance extends InstanceResource
{
    /**
     * Initialize the AccountSecretInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $key The secret key; up to 100 characters.
     */
    public function __construct(Version $version, array $payload, string $key = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'key' => Values::array_get($payload, 'key'),
            'dateRotated' => Deserialize::dateTime(Values::array_get($payload, 'date_rotated')),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = ['key' => $key ?: $this->properties['key'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return AccountSecretContext Context for this AccountSecretInstance
     */
    protected function proxy(): AccountSecretContext
    {
        if (!$this->context) {
            $this->context = new AccountSecretContext(
                $this->version,
                $this->solution['key']
            );
        }

        return $this->context;
    }

    /**
     * Delete the AccountSecretInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        return $this->proxy()->delete();
    }

    /**
     * Fetch the AccountSecretInstance
     *
     * @return AccountSecretInstance Fetched AccountSecretInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): AccountSecretInstance
    {

        return $this->proxy()->fetch();
    }

    /**
     * Update the AccountSecretInstance
     *
     * @param string $value The secret value; up to 4096 characters.
     * @return AccountSecretInstance Updated AccountSecretInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $value): AccountSecretInstance
    {

        return $this->proxy()->update($value);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Microvisor.V1.AccountSecretInstance ' . \implode(' ', $context) . ']';
    }
}

