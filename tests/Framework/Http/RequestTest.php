<?php /** @noinspection PhpParamsInspection */

namespace tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase {

    protected function testEmpty(): void
    {
        $_GET = [];
        $_POST = [];

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
        $_POST = [];

        $request = new Request();

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($data, $request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $_GET = [];
        $_POST = $data = ['title' => 'Title'];

        $request = new Request();

        self::assertEquals([], $request->getQueryParams());
        self::assertNull($data, $request->getParsedBody());
    }
}