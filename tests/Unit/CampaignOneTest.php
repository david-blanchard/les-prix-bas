<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CampaignOneTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test if a campaign with ID 1 exists
     *
     * @return void
     */
    public function test_campaignOneExists()
    {
        $row = DB::table('campaigns')->select('id')->get()->first();

        $this->assertEquals($row->id, 1);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function test_campaignOneDiscountRateIs_15_percent()
    {
        $row = DB::table('campaigns')->select('discount')->get()->first();

        $this->assertEquals($row->discount, 15);
    }

}
