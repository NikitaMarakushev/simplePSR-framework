<?php


namespace Framework\Http\Core;


interface ResponseInterface
{
    /**
     * @return mixed
     */
    public function getBody();

    /**
     * @return mixed
     */
    public function withBody();

    /**
     * @return mixed
     */
    public function getReasonPhrase();

    /**
     * @param $code
     * @param string $reasonPhrase
     * @return mixed
     */
    public function withStatus($code, $reasonPhrase = '');

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param $header
     * @return bool
     */
    public function hasHeader($header): bool;

    /**
     * @param $header
     * @return mixed
     */
    public function getHeader($header);

    /**
     * @param $header
     * @param $value
     * @return mixed
     */
    public function withHeader($header, $value);
}