<?php

namespace Framework\Http;

use Psr\Http\Message\StreamInterface;

class Stream implements StreamInterface
{

    /**
     * @var string
     */
    private $content;

    /**
     * Stream constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getContents();
    }


    /**
     * @return string
     */
    public function getContents(): string
    {
        return $this->content;
    }

    /**
     * @param string $string
     * @return int|void
     */
    public function write($string)
    {
        $this->content .= $string;
    }

    /**
     * @return int|null
     */
    public function getSize()
    {
        return mb_strlen($this->content);
    }

    public function close() {}

    public function detach() {}

    public function tell() {}

    public function eof() {}

    public function isSeekable() {}

    public function seek($offset, $whence = SEEK_SET) {}

    public function rewind() {}

    public function isWritable() {}

    public function isReadable() {}

    public function read($length) {}

    public function getMetadata($key = null){}
}