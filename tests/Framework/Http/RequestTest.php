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

        $request1 = new Request([
            'name' => 'John',
            'age' => 20,
        ]);

        $request2 = new Request([
            'name' => 'Jackob',
            'age' => '100'
        ]);

        self::assertEquals($data, $request1->getQueryParams());
        self::assertEquals($data, $request2->getQueryParams());
        self::assertNull($request1, $request1->getParsedBody());
        self::assertNull($request2, $request2->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $_POST = $data = ['title' => 'Title'];

        $request = new Request([], $data = ['title' => 'Title']);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}