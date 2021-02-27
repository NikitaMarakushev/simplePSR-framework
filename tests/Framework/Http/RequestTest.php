<?php /** @noinspection PhpParamsInspection */

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase {

    protected function setUp(): void
    {
        parent::setUp();

        $_GET = [];
        $_POST = [];

    }

    protected function testEmpty(): void
    {
        $request = new Request();

        self::assertEquals([], $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    protected function testQueryParams(): void
    {
        $_GET = $data = [
            'name' => 'John',
            'age' => 20,
        ];

        $request = new Request();

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request, $request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $_POST = $data = ['title' => 'Title'];

        $request = new Request();

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}