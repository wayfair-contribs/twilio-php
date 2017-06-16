<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Sync\V1\Service\Document;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string serviceSid
 * @property string documentSid
 * @property string identity
 * @property boolean read
 * @property boolean write
 * @property boolean manage
 * @property string url
 */
class DocumentPermissionInstance extends InstanceResource {
    /**
     * Initialize the DocumentPermissionInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Sync Service Instance SID.
     * @param string $documentSid Sync Document SID.
     * @param string $identity Identity of the user to whom the Sync Document
     *                         Permission applies.
     * @return \Twilio\Rest\Sync\V1\Service\Document\DocumentPermissionInstance 
     */
    public function __construct(Version $version, array $payload, $serviceSid, $documentSid, $identity = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'documentSid' => Values::array_get($payload, 'document_sid'),
            'identity' => Values::array_get($payload, 'identity'),
            'read' => Values::array_get($payload, 'read'),
            'write' => Values::array_get($payload, 'write'),
            'manage' => Values::array_get($payload, 'manage'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'documentSid' => $documentSid,
            'identity' => $identity ?: $this->properties['identity'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Sync\V1\Service\Document\DocumentPermissionContext Context for this DocumentPermissionInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new DocumentPermissionContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['documentSid'],
                $this->solution['identity']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a DocumentPermissionInstance
     * 
     * @return DocumentPermissionInstance Fetched DocumentPermissionInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the DocumentPermissionInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the DocumentPermissionInstance
     * 
     * @param boolean $read Read access.
     * @param boolean $write Write access.
     * @param boolean $manage Manage access.
     * @return DocumentPermissionInstance Updated DocumentPermissionInstance
     */
    public function update($read, $write, $manage) {
        return $this->proxy()->update(
            $read,
            $write,
            $manage
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Sync.V1.DocumentPermissionInstance ' . implode(' ', $context) . ']';
    }
}