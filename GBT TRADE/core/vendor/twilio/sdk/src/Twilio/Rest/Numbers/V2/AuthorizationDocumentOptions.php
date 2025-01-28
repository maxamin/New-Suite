<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Numbers
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Numbers\V2;

use Twilio\Options;
use Twilio\Values;

abstract class AuthorizationDocumentOptions
{
    /**
     * @param string $contactTitle The title of the person authorized to sign the Authorization Document for this phone number.
     * @param string[] $ccEmails Email recipients who will be informed when an Authorization Document has been sent and signed.
     * @return CreateAuthorizationDocumentOptions Options builder
     */
    public static function create(
        
        string $contactTitle = Values::NONE,
        array $ccEmails = Values::ARRAY_NONE

    ): CreateAuthorizationDocumentOptions
    {
        return new CreateAuthorizationDocumentOptions(
            $contactTitle,
            $ccEmails
        );
    }



    /**
     * @param string $email Email that this AuthorizationDocument will be sent to for signing.
     * @param string $status Status of an instance resource. It can hold one of the values: 1. opened 2. signing, 3. signed LOA, 4. canceled, 5. failed. See the section entitled [Status Values](https://www.twilio.com/docs/api/phone-numbers/hosted-number-authorization-documents#status-values) for more information on each of these statuses.
     * @return ReadAuthorizationDocumentOptions Options builder
     */
    public static function read(
        
        string $email = Values::NONE,
        string $status = Values::NONE

    ): ReadAuthorizationDocumentOptions
    {
        return new ReadAuthorizationDocumentOptions(
            $email,
            $status
        );
    }

}

class CreateAuthorizationDocumentOptions extends Options
    {
    /**
     * @param string $contactTitle The title of the person authorized to sign the Authorization Document for this phone number.
     * @param string[] $ccEmails Email recipients who will be informed when an Authorization Document has been sent and signed.
     */
    public function __construct(
        
        string $contactTitle = Values::NONE,
        array $ccEmails = Values::ARRAY_NONE

    ) {
        $this->options['contactTitle'] = $contactTitle;
        $this->options['ccEmails'] = $ccEmails;
    }

    /**
     * The title of the person authorized to sign the Authorization Document for this phone number.
     *
     * @param string $contactTitle The title of the person authorized to sign the Authorization Document for this phone number.
     * @return $this Fluent Builder
     */
    public function setContactTitle(string $contactTitle): self
    {
        $this->options['contactTitle'] = $contactTitle;
        return $this;
    }

    /**
     * Email recipients who will be informed when an Authorization Document has been sent and signed.
     *
     * @param string[] $ccEmails Email recipients who will be informed when an Authorization Document has been sent and signed.
     * @return $this Fluent Builder
     */
    public function setCcEmails(array $ccEmails): self
    {
        $this->options['ccEmails'] = $ccEmails;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Numbers.V2.CreateAuthorizationDocumentOptions ' . $options . ']';
    }
}



class ReadAuthorizationDocumentOptions extends Options
    {
    /**
     * @param string $email Email that this AuthorizationDocument will be sent to for signing.
     * @param string $status Status of an instance resource. It can hold one of the values: 1. opened 2. signing, 3. signed LOA, 4. canceled, 5. failed. See the section entitled [Status Values](https://www.twilio.com/docs/api/phone-numbers/hosted-number-authorization-documents#status-values) for more information on each of these statuses.
     */
    public function __construct(
        
        string $email = Values::NONE,
        string $status = Values::NONE

    ) {
        $this->options['email'] = $email;
        $this->options['status'] = $status;
    }

    /**
     * Email that this AuthorizationDocument will be sent to for signing.
     *
     * @param string $email Email that this AuthorizationDocument will be sent to for signing.
     * @return $this Fluent Builder
     */
    public function setEmail(string $email): self
    {
        $this->options['email'] = $email;
        return $this;
    }

    /**
     * Status of an instance resource. It can hold one of the values: 1. opened 2. signing, 3. signed LOA, 4. canceled, 5. failed. See the section entitled [Status Values](https://www.twilio.com/docs/api/phone-numbers/hosted-number-authorization-documents#status-values) for more information on each of these statuses.
     *
     * @param string $status Status of an instance resource. It can hold one of the values: 1. opened 2. signing, 3. signed LOA, 4. canceled, 5. failed. See the section entitled [Status Values](https://www.twilio.com/docs/api/phone-numbers/hosted-number-authorization-documents#status-values) for more information on each of these statuses.
     * @return $this Fluent Builder
     */
    public function setStatus(string $status): self
    {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Numbers.V2.ReadAuthorizationDocumentOptions ' . $options . ']';
    }
}

