# Merchant Server Reference implementation for mobile Apps (PHP version)

This is a testing server for the development of Veritran's IOs and Android SDK. Also acts as a reference implementation for the methods to be implemented by merchants to use the mobile sdk.
Please refer more to the [Documentation of mobile SDK](http://mobile-docs.midtrans.com/)

## Required 
There is only one endpoint from the merchant server that are required to use this SDK.

`/charge` - used to do the charging of the transactions.

This endpoint is just used to do the charging to Midtrans Payment API with added server key on the header.

So the response is just the same as the payment response from Midtrans Payment API.

## How to use
Upload these to your host, and make sure the url `[your server endpoint]/charge` can be accessed from the mobile app.

## Notes
This is just for basic implementation reference, in production, you should implement your backend more securely.

### Get help
* [Midtrans&nbsp;](https://www.midtrans.com)
* [Midtrans registration](https://dashboard.midtrans.com/register)
* [Midtrans documentation](http://docs.midtrans.com)
* Can't find answer you looking for? email to [support@midtrans.com](mailto:support@midtrans.com)