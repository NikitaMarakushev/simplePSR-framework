<?php

namespace Framework\Http;

class Response
{
    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var
     */
    private $body;

    /**
     * @var
     */
    private $statusCode;

    /**
     * @var string
     */
    private $reasonPhrase = '';

    /**
     * @var string[]
     */
    private static $phrases = [
        200 => 'OK',
        201 => 'Moved Permanently',
        400 => 'Bad Request',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Error'
    ];

    /**
     * Response constructor.
     * @param $body
     * @param int $status
     */
    public function __construct($body, $status = 200)
    {
        $this->body = $body;
        $this->statusCode = $status;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param $body
     * @return $this
     */
    public function withBody($body): self
    {
        $new = clone $this;
        $new->body = $body;
        return $new;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getReasonPhrase()
    {
        if (!$this->reasonPhrase && isset(self::$phrases[$this->statusCode])) {
            $this->reasonPhrase = self::$phrases[$this->statusCode];
        }
        return $this->reasonPhrase;
    }

    /**
     * @param $code
     * @param string $reasonPhrase
     * @return $this
     */
    public function withStatus($code, $reasonPhrase = ''): self
    {
        $new  = clone $this;
        $new->statusCode = $code;
        $new->reasonPhrase = $reasonPhrase;
        return $new;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param $header
     * @return bool
     */
    public function hasHeader($header): bool
    {
        return isset($this->headers[$header]);
    }


    /**
     * @param $header
     * @return mixed|null
     */
    public function getHeader($header)
    {
        if (!$this->hasHeader($header)) {
            return null;
        }
        return $this->headers[$header];
    }

    /**
     * @param $header
     * @param $value
     * @return $this
     */
    public function withHeader($header, $value): self
    {
        $new = clone $this;
        if ($new->hasHeader($header)) {
            unset($new->headers[$header]);
        }
        $new->headers[$header] = $value;
        return $new;
    }
}


















