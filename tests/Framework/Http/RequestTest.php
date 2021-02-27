<?php /** @noinspection PhpParamsInspection */

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase {

    protected function testEmpty(): void
    {
        $request = new Request();

        self::assertEquals([], $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    protected function testQueryParams(): void
    {

        $request = new Request($data = [
            'name' => 'John',
            'age' => 20,
        ]);

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request, $request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $request = new Request([], $data = ['title' => 'Title']);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}