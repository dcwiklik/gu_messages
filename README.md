## How to use?
------------

1. Create adapter
```php
$adapter = new ApiAdapter();
```
2. Create message provider
```php
$provider = new SMS1();
```
3. Pass provider to adapter
```php
$adapter->setProvider($provider);`
```
4. Create gateway (set gateway type, pass adapter object)
```php
$smsGateway = new SMSGateway(GatewayAbstract::TYPE_SMS, $adapter);`
```
5. Push message to gateway
```php
try {
    $smsGateway->push('555555555', 'Wiadomość 1');
} catch (ProviderException $exception) {
    return $exception;`
}
```

## Todo
------------

### Monolog

* add logs

### RabbitMQ
* add message to queue (RabbitMQ)
* consume queue items
* send message through provider
* check status
* save result to database
