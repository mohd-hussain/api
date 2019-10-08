<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait{

    public function apiException($request,$e){

        if($this->isModel($e)){

            return $this->modelResponse($e);
        }

        if($this->isHttp($e)){

            return $this->httpResponse($e);

        }

        return parent::render($request, $exception);

    }

    public function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    public function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    public function modelResponse($e)
    {
        return response()->json([
            'errors' => 'Product Model Not Found'],Response::HTTP_NOT_FOUND);
    }

    public function httpResponse($e)
    {
        return response()->json([
            'errors' => 'Incorrect Route'],Response::HTTP_NOT_FOUND);
    }
}