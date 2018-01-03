<?php
// declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    protected static $curlCommand = 'curl -X POST -d \'{
      "transaction_details": {
        "order_id": "mobile-12345",
        "gross_amount": 280000
      },
      "item_details": [
        {
          "id": "A01",
          "price": 280000,
          "quantity": 1,
          "name": "Mie Ayam Komplit"
        }
      ],
      "customer_details": {
        "email": "tester@example.com",
        "first_name": "Budi",
        "last_name": "Khannedy",
        "phone": "628112341234"
      }
    }\' \'localhost:8001/charge/?key=VT-server-LOpE7O8_7niPnHylBjBz9x2x\'';
    protected static $cmdstr = 'nohup php -S localhost:8001 >> /dev/null 2>&1 & echo $!';
    protected static $killCommand = 'pkill -f localhost:8001';

    protected function setUp(){
        exec(self::$cmdstr);
        sleep(15);
    }

    public function testExecCurl(){
        $response = shell_exec(self::$curlCommand);
        $respObj = json_decode($response);
        // error_log(print_r($response,true));
        $this->assertObjectHasAttribute('token',$respObj);
    }

    protected function tearDown(){
        shell_exec(self::$killCommand);
    }
}