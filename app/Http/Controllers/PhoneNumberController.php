<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhoneNumber;
use Illuminate\Database\QueryException;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\NumberParseException;

class PhoneNumberController extends Controller
{
    public function validatePhoneNumber(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'country_code' => 'required'
        ]);

        $phoneNumber = $request->input('phone_number');
        $countryCode = $request->input('country_code');

        try {
            // Check if the phone number already exists in the database
            $existingNumber = PhoneNumber::where('phone_number', $phoneNumber)
                ->where('country_code', $countryCode)
                ->first();

            if ($existingNumber) {
                return response()->json(['error' => 'Phone number already exists.'], 409);
            }

            // If not exists, proceed to create new record
            $phoneData = [
                'phone_number' => $phoneNumber,
                'country_code' => $countryCode,
            ];

            PhoneNumber::create($phoneData);

            return response()->json($phoneData);
        } catch (NumberParseException $e) {
            return response()->json(['error' => 'Invalid phone number format.'], 400);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        }
    }
}