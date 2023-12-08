<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class BaseFormRequest
{
    protected $_REQUEST;
    /**
     * @var bool
     */
    private $status = true;
    /**
     * @var array
     */
    private $errors = [];

    abstract public function rules() : array;

    public function __construct(Request $request = null, $forceDie = true)
    {
        if(!is_null($request))
        {
            $this->_REQUEST = $request;
            $rules = $this->rules();

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails())
            {
                if($forceDie)
                {
                    $error = $validator->errors()->toArray();
                    $error = ValidationException::withMessages($error);
                    throw $error;
                }else{
                    $this->status = false;
                    $this->errors = $validator->errors()->toArray();
                }
            }
        }
    }

    /**
     * @return bool
     */
    public function isStatus() : bool
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getErrors() : array
    {
        return $this->errors;
    }

    public function request()
    {
        return $this->_REQUEST;
    }


}
