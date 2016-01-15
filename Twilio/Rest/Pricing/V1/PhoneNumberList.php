<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Pricing\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Rest\Pricing\V1\PhoneNumber\CountryList;
use Twilio\Version;

/**
 * @property CountryList countries
 */
class PhoneNumberList extends ListResource {
    protected $_countries = null;

    /**
     * Construct the PhoneNumberList
     * 
     * @param Version $version Version that contains the resource
     * @return PhoneNumberList 
     */
    public function __construct(Version $version) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array();
    }

    /**
     * Access the countries
     */
    protected function getCountries() {
        if (!$this->_countries) {
            $this->_countries = new CountryList(
                $this->version
            );
        }
        
        return $this->_countries;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Pricing.V1.PhoneNumberList]';
    }
}