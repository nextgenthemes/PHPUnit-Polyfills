<?php

namespace Yoast\PHPUnitPolyfills\Tests\Unit\TestCases;

use Exception;
use Yoast\PHPUnitPolyfills\Tests\Unit\Polyfills\AssertFileEqualsSpecializationsTest;
use Yoast\PHPUnitPolyfills\Tests\Unit\Polyfills\Fixtures\ValueObject;

/**
 * Tests for the TestCase setups.
 */
trait TestCaseTestTrait {

	/**
	 * Data provider for the testHaveFixtureMethodsBeenTriggered() test.
	 *
	 * @return array[]
	 */
	final public static function dataHaveFixtureMethodsBeenTriggered() {
		return [
			[ 1, 1, 0, 1, 0 ],
			[ 1, 2, 1, 2, 1 ],
			[ 1, 3, 2, 3, 2 ],
		];
	}

	/**
	 * Test availability of trait polyfilled PHPUnit methods [1].
	 *
	 * @return void
	 *
	 * @throws Exception For testing purposes.
	 */
	final public function testAvailabilityExpectExceptionObjectTrait() {
		$exception = new Exception( 'message', 101 );
		$this->expectExceptionObject( $exception );

		throw new Exception( 'message', 101 );
	}

	/**
	 * Test availability of trait polyfilled PHPUnit methods [2].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertIsTypeTrait() {
		self::assertIsInt( self::$beforeClass );
	}

	/**
	 * Test availability of trait polyfilled PHPUnit methods [3].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertStringContainsTrait() {
		$this->assertStringContainsString( 'foo', 'foobar' );
	}

	/**
	 * Test availability of trait polyfilled PHPUnit methods [4].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertEqualsSpecializationsTrait() {
		static::assertEqualsIgnoringCase( 'a', 'A' );
	}

	/**
	 * Test availability of trait polyfilled PHPUnit methods [6].
	 *
	 * @return void
	 *
	 * @throws Exception For testing purposes.
	 */
	final public function testAvailabilityExpectExceptionMessageMatchesTrait() {
		$this->expectException( Exception::class );
		$this->expectExceptionMessageMatches( '`^a poly[a-z]+ [a-zA-Z0-9_]+ me(s){2}age$`i' );

		throw new Exception( 'A polymorphic exception message' );
	}

	/**
	 * Test availability of trait polyfilled PHPUnit methods [7].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertFileEqualsSpecializationsTrait() {
		self::assertStringEqualsFileIgnoringCase(
			\dirname( __DIR__ ) . '/Polyfills' . AssertFileEqualsSpecializationsTest::PATH_TO_EXPECTED,
			"Testing 123\n"
		);
	}

	/**
	 * Test availability of trait polyfilled PHPUnit methods [8].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertionRenamesTrait() {
		$this->assertMatchesRegularExpression( '/foo/', 'foobar' );
	}

	/**
	 * Verify availability of trait polyfilled PHPUnit methods [12].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertClosedResource() {
		$resource = \fopen( __FILE__, 'r' );
		\fclose( $resource );

		$this->assertIsClosedResource( $resource );
	}

	/**
	 * Verify availability of trait polyfilled PHPUnit methods [13].
	 *
	 * @return void
	 */
	final public function testAvailabilityEqualToSpecializations() {
		self::assertThat( [ 2, 3, 1 ], $this->equalToCanonicalizing( [ 3, 2, 1 ] ) );
	}

	/**
	 * Verify availability of trait polyfilled PHPUnit methods [14].
	 *
	 * @requires PHP 7.0
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertObjectEquals() {
		$expected = new ValueObject( 'test' );
		$actual   = new ValueObject( 'test' );
		$this->assertObjectEquals( $expected, $actual );
	}

	/**
	 * Verify availability of trait polyfilled PHPUnit methods [15].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertIgnoringLineEndings() {
		self::assertStringContainsStringIgnoringLineEndings( "b\nc", "a\r\nb\r\nc\r\nd" );
	}

	/**
	 * Verify availability of trait polyfilled PHPUnit methods [16].
	 *
	 * @return void
	 */
	final public function testAvailabilityAssertIsList() {
		static::assertIsList( [ 0, 1, 2 ] );
	}
}
