<?php

namespace Drupal\Tests\amazon_ses\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Aws\Ses\SesClient;
use Aws\Ses\Exception\SesException;
use Prophecy\Argument;

/**
 * Tests the Amazon SES handler service.
 *
 * @group amazon_ses
 */
class AmazonSesHandlerTest extends KernelTestBase {

  /**
   * An SesClient mock object.
   *
   * @var \Prophecy\Prophecy\ObjectProphecy
   */
  protected $prophecy;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'amazon_ses',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->prophecy = $this->prophesize(SesClient::class);
  }

  /**
   * Tests that the handler successfully sends an email.
   *
   * @dataProvider messageData
   */
  public function testSend($message) {
    $message_id = $this->randomString();
    $this->prophecy->sendEmail(Argument::type('array'))
      ->willReturn(['MessageId' => $message_id]);
    $client = $this->prophecy->reveal();

    $this->container->set('amazon_ses.client', $client);
    $handler = $this->container->get('amazon_ses.handler');

    $return = $handler->send($message);
    $this->assertEquals($return, $message_id);
  }

  /**
   * Tests that a failed send is handled.
   *
   * @dataProvider messageData
   */
  public function testFailedSend($message) {
    $this->prophecy->sendEmail(Argument::type('array'))
      ->willThrow(SesException::class);
    $client = $this->prophecy->reveal();

    $this->container->set('amazon_ses.client', $client);
    $handler = $this->container->get('amazon_ses.handler');

    $return = $handler->send($message);
    $this->assertFalse($return);
  }

  /**
   * Provides message data.
   */
  public function messageData() {
    return [
      [
        [
          'to' => 'success@simulator.amazonses.com',
          'from' => 'test@example.com',
          'subject' => 'Amazon SES test',
          'body' => 'test message body',
          'headers' => [
            'Content-Type' => 'text/plain',
          ],
        ],
      ],
    ];
  }

}
