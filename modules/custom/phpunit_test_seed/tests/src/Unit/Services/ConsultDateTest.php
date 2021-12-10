<?php

namespace Drupal\phpunit_test_seed\Unit\Services;

use Drupal\phpunit_test_seed\Services\ConsultDate;
use Drupal\Tests\UnitTestCase;

/**
 * Provides unit tests for
 *
 * @coversDefaultClass \Drupal\phpunit_test_seed\Services\ConsultDate
 *
 * @group phpunit_test_seed
 */
class ConsultDateTest extends UnitTestCase {
  protected $object;
  protected $response;

  protected function setUp()
  {
    parent::setUp(); // TODO: Change the autogenerated stub
    $datformatter = $this->createMock('Drupal\Core\Datetime\DateFormatter');
    $datformatter->expects($this->any())->method('format')->willReturn('24/12/2021');
    $this->object = new ConsultDate($datformatter);
  }

  protected function tearDown(): void
  {
    parent::tearDown(); // TODO: Change the autogenerated stub
    unset($this->object);
    unset($this->response);
  }

  /*
   * Aca se prueba el return booleano
   */
  public function testView() {
    $this->setUp();
    $this->response = $this->object->getCurrentDate(false, '21223');
    $this->assertIsBool($this->response);
    $this->tearDown();
  }

  public function testViewFormat() {
    $this->setUp();
    $this->response = $this->object->getCurrentDate('custom', 'Y-m-d H:i:s');
    $this->assertIsString($this->response);
    $this->tearDown();
  }
}
