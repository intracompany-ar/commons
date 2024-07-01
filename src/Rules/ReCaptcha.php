<?php

namespace IntraCompany\Commons\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class ReCaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ( app()->isProduction() ) {
            return true;
        }else{
            $client = new Client([
                'base_uri' => 'https://google.com/recaptcha/api/'
            ]);

            $response = $client->post('siteverify', [// https://google.com/recaptcha/api/siteverify
                'query' => [
                    'secret'    => config('services.recaptcha.secret'),
                    'remoteip'  => request()->getClientIp(),
                    'response'  => $value,
                ]
            ]);
            return json_decode($response->getBody())->success;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Por favor, tilde el check "No soy un robot".';
    }
}
