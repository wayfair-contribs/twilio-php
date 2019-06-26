<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Wireless\V1\Sim;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class UsageRecordTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                       ->usageRecords->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://wireless.twilio.com/v1/Sims/DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/UsageRecords'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "usage_records": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "commands": {
                            "billing_units": "USD",
                            "billed": 0,
                            "total": 3,
                            "from_sim": 1,
                            "to_sim": 2,
                            "home": {
                                "billing_units": "USD",
                                "billed": 0,
                                "total": 3,
                                "from_sim": 1,
                                "to_sim": 2
                            },
                            "national_roaming": {
                                "billing_units": "USD",
                                "billed": 0,
                                "total": 0,
                                "from_sim": 0,
                                "to_sim": 0
                            },
                            "international_roaming": []
                        },
                        "data": {
                            "billing_units": "USD",
                            "billed": 0.35,
                            "total": 3494609,
                            "upload": 731560,
                            "download": 2763049,
                            "units": "bytes",
                            "home": {
                                "billing_units": "USD",
                                "billed": 0.35,
                                "total": 3494609,
                                "upload": 731560,
                                "download": 2763049,
                                "units": "bytes"
                            },
                            "national_roaming": {
                                "billing_units": "USD",
                                "billed": 0,
                                "total": 0,
                                "upload": 0,
                                "download": 0,
                                "units": "bytes"
                            },
                            "international_roaming": []
                        },
                        "sim_sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "period": {
                            "start": "2015-07-30T20:00:00Z",
                            "end": "2015-07-30T20:00:00Z"
                        }
                    },
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "commands": {},
                        "data": {},
                        "sim_sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "period": {}
                    }
                ],
                "meta": {
                    "first_page_url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/UsageRecords?Start=2015-07-30T20%3A00%3A00Z&End=2015-07-30T20%3A00%3A00Z&PageSize=50&Page=0",
                    "key": "usage_records",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/UsageRecords?Start=2015-07-30T20%3A00%3A00Z&End=2015-07-30T20%3A00%3A00Z&PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->usageRecords->read();

        $this->assertNotNull($actual);
    }
}