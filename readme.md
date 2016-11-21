# Merchant Server Reference implementation for mobile Apps (PHP version)

This is a testing server for the development of Midtrans's IOs and Android SDK. Also acts as a reference implementation for the methods to be implemented by merchants to use the mobile sdk.
Please refer more to the [Documentation of mobile SDK](http://mobile-docs.midtrans.com/)

There is only one endpoint from the merchant server that are required to use Midtrans mobile SDK.

## Endpoints

```
POST /charge
```

This endpoint will redirect client request to Midtrans Snap API `'https://app.midtrans.com/snap/v1/transactions' or 'https://app.sandbox.midtrans.com/snap/v1/transactions'` with added HTTP header generated based on your Midtrans `Server Key`.

The response of API will be printed/returned to client as is. Example response that will be printed

```
{
  "token": "45aafdbf-831b-40e6-a042-04b80c195324"
}
```

## How to use
Edit file `charge/index.php`, insert your Midtrans Account Server Key to `'<server key>'`.
Upload these to your host, and make sure the url `[your server endpoint]/charge` can be accessed from the mobile app.

## Testing
You can mock client's request by executing this CURL command to the `/charge` endpoint:

```
curl -X POST -d '{
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
}' "http://<your host>/charge"
```

note: dont forget to change `"http://<your host>/charge"` to your url.
You can also import that curl command to Postman.

You can test

## Notes
This is just for basic implementation reference, in production, you should implement your backend more securely.

### Get help
* [Midtrans&nbsp;](https://www.midtrans.com)
* [Midtrans registration](https://dashboard.midtrans.com/register)
* [Midtrans documentation](http://docs.midtrans.com)
* Can't find answer you looking for? email to [support@midtrans.com](mailto:support@midtrans.com)