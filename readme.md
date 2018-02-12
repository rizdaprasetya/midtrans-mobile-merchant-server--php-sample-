Simple Merchant Server Implementation Reference for Mobile SDK (PHP version).

## Description
This is a example mobile SDK server for Midtrans's iOS and Android SDK, as an implementation reference to use the mobile sdk.
Please read more in [Documentation of Midtrans mobile SDK](http://mobile-docs.midtrans.com/)

## Endpoints
There is only one endpoint that are required to use Midtrans mobile SDK:

```
POST /charge
```

This endpoint will proxy/forward client request to Midtrans Snap API `'https://app.midtrans.com/snap/v1/transactions'` (or `'https://app.sandbox.midtrans.com/snap/v1/transactions'` for sandbox) with added HTTP Authorization Header generated based on your Midtrans `Server Key`.

The response of API will be printed/returned to client as is. Example response that will be printed

```
{
  "token": "45aafdbf-831b-40e6-a042-04b80c195324"
}
```

## Usage
Edit file `charge/index.php`, insert your Midtrans Account Server Key to `'<server key>'`.
Upload these to your host, and make sure the url `<url where you host this>/charge/index.php` can be accessed from the mobile app.

Set `<url where you host this>/charge/index.php` as `merchant base url` in mobile SDK. (refer to [Midtrans mobile SDK doc](https://mobile-docs.midtrans.com))

> **Advanced Tips:**
> You can also configure your HTTP server to route `<url where you host this>/charge` url to `/charge/index.php` file, so the `merchant base url` can be just configured as `<url where you host this>/charge`(without /index.php).

## Testing
You can mock client's request by executing this CURL command to the `/charge/index.php` endpoint:

```
curl -X POST -d '{  
   "transaction_details":{  
      "order_id":"mobile-12345",
      "gross_amount":280000
   },
   "item_details":[  
      {  
         "id":"A01",
         "price":280000,
         "quantity":1,
         "name":"Mie Ayam Komplit"
      }
   ],
   "customer_details":[  
      {  
         "email":"tester@example.com",
         "first_name":"Budi",
         "last_name":"Khannedy",
         "phone":"628112341234"
      }
   ]
}' "https://<your url>/charge/index.php"
```

Note: dont forget to change `"http://<your url>/charge/index.php"` to your url where you hosted the `/charge/index.php`.

You can also import that curl command to Postman.

## Notes
This is just for very basic implementation reference, in production, you should implement your backend more securely.

### Get help
* [Midtrans&nbsp;](https://www.midtrans.com)
* [Midtrans registration](https://dashboard.midtrans.com/register)
* [Midtrans documentation](http://docs.midtrans.com)
* Can't find answer you looking for? email to [support@midtrans.com](mailto:support@midtrans.com)
