<?php

namespace Yoast\PHPUnitPolyfills\Tests\Unit\Polyfills;

use Exception;
use PHPUnit\Framework\TestCase;
use Yoast\PHPUnitPolyfills\Polyfills\ExpectExceptionMessageMatches;

/**
 * Availability test for the function polyfilled by the ExpectExceptionMessageMatches trait.
 *
 * @covers \Yoast\PHPUnitPolyfills\Polyfills\ExpectExceptionMessageMatches
 */
final class ExpectExceptionMessageMatchesTest extends TestCase {

	use ExpectExceptionMessageMatches;

	/**
	 * Verify availability of the expectExceptionMessageMatches() method.
	 *
	 * @return void
	 *
	 * @throws Exception For testing purposes.
	 */
	public function testExpectExceptionMessageMatches() {
		$this->expectException( Exception::class ); // Needed for PHPUnit 5.x.
		$this->expectExceptionMessageMatches( '`^a poly[a-z]+ [a-zA-Z0-9_]+ me(s){2}age$`i' );

		throw new Exception( 'A polymorphic exception message' );
	}
}
