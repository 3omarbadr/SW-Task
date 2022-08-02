<?php

namespace TestTask\Http;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function back($route)
    {
        header('Location:' . $route);

        return $this;
    }
}
