<?php

namespace Tests\Unit;

use Laravel\Lumen\Testing\TestCase;
use App\Models\PhoneNumber;

class PhoneNumberControllerTest extends TestCase
{
    public function createApplication()
    {
        return require __DIR__.'/../../bootstrap/app.php';
    }

    public function testValidatePhoneNumber()
    {
        // Create a new PhoneNumber record to simulate existing data
        PhoneNumber::create([
            'phone_number' => '+14155552671',
            'country_code' => 'US',
        ]);

        // Attempt to validate the same phone number
        $response = $this->post('/validate', [
            'phone_number' => '+14155552671',
            'country_code' => 'US',
        ]);

        $this->assertResponseStatus(409);

        $response->seeJsonStructure([
            'error',
        ]);
    }
}