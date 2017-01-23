<?php

namespace MoySklad\Exceptions;

use \Exception;

class ApiResponseException extends RequestFailedException{
    protected
        $code,
        $errorText,
        $moreInfo;

    public function __construct($request, $response)
    {
        parent::__construct($request, $response);
        $error = $response->errors[0];
        $this->code = $error->code;
        $this->errorText = $error->errorText;
        $this->moreInfo = $error->moreInfo;
    }

    public function getApiCode(){
        return $this->code;
    }

    public function getErrorText(){
        return $this->errorText;
    }

    public function getMoreInfo(){
        return $this->moreInfo;
    }
}