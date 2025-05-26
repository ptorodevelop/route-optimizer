<?php

namespace App\Models;

class Constant
{
    // HTTP CODES
    public const HTTP_CODE_UNAUTHORIZED = 401;
    public const HTTP_CODE_FORBIDDEN = 403;
    public const HTTP_CODE_NOT_FOUND = 404;
    public const HTTP_CODE_METHOD_NOT_ALLOWED = 405;
    public const HTTP_CODE_NOT_ACCEPTABLE = 406;
    public const HTTP_CODE_CONFLICT = 409;
    public const HTTP_UNPROCESSABLE_CONTENT = 422;
    public const HTTP_CODE_INTERNAL_SERVER_ERROR   = 500;
    public const HTTP_CODE_OK   = 200;
}
