<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Wireless\Device;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class UsageContext extends InstanceContext {
    /**
     * Initialize the UsageContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $deviceSid The device_sid
     * @return \Twilio\Rest\Preview\Wireless\Device\UsageContext 
     */
    public function __construct(Version $version, $deviceSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'deviceSid' => $deviceSid,
        );
        
        $this->uri = '/Devices/' . $deviceSid . '/Usage';
    }

    /**
     * Fetch a UsageInstance
     * 
     * @param array $options Optional Arguments
     * @return UsageInstance Fetched UsageInstance
     */
    public function fetch(array $options = array()) {
        $options = new Values($options);
        
        $params = Values::of(array(
            'End' => $options['end'],
            'Start' => $options['start'],
        ));
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new UsageInstance(
            $this->version,
            $payload,
            $this->solution['deviceSid']
        );
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
        return '[Twilio.Preview.Wireless.UsageContext ' . implode(' ', $context) . ']';
    }
}