<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    /**
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    protected function respondWithData($data = [])
    {
        return new Response(json_encode($data), 200);
    }

    /**
     * respond with all validation errors
     * @param  \Illuminate\Validation\Validator $validator the validator that failed to pass
     * @return \Illuminate\Http\Response the appropriate response containing the error message
     */
    protected function respondWithFailedValidation(\Illuminate\Validation\Validator $validator)
    {
        return $this->respondWithErrors($validator->messages()->all());
    }

    protected function respondWithErrors(array $errors)
    {
        return new Response(json_encode([
            'errors' => $errors
        ]), 400);
    }
}
