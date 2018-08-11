---
title: API Reference

language_tabs: # must be one of https://git.io/vQNgJ

toc_footers:
  - <a href='https://github.com/lord/slate'>Documentation Powered by Slate</a>

includes:
  - errors

search: true
---

# Introduction

Package for Integrating Laravel with Midtrans. This package encourages user to interact with API.

Veltrans bridges Midtrans API with Laravel so that the usage will be brief using Laravel Framework.

# Requirements, recommended environment

* Latest stable and LTS Laravel versions.
* PHP 7+

# Installation

The general way to install this package is through composer

`composer require endru/veltrans`

# Deploy configuration

First publish the configuration files so you can modify it to your needs:

`php artisan vendor:publish --tag veltrans`

Put side code to your `.env` and set the value to your needs:

```
VELTRANS_MERCHANT_ID=yourmerchantid
VELTRANS_CLIENT_KEY=youclientkey
VELTRANS_SERVER_KEY=yourserverkey
VELTRANS_IS_PRODUCTION=false
VELTRANS_IS_SANITIZED=true
VELTRANS_IS_3DS=true
VELTRANS_NOTIFICATION_URL=yourownappsnotificationurl
```

# Endpoint and Default Configuration

Veltrans default endpoint : `http://yourdomain/veltrans/`

Veltrans default payment list : `credit_card`,`mandiri_clickpay`,`cimb_clicks`,`bca_klikbca`,`bca_klikpay`,`bri_epay`,`echannel`,`indosat_dompetku`,`mandiri_ecash`,`permata_va`,`bca_va`,`bni_va`,`bni_va`,`other_va`,`gopay`,`kioson`,`indomaret`,`gci`,`danamon_online`

# Snap

## Create Transaction

> Axios Example

```javascript
axios({
  'method': 'POST',
  'url': route('veltrans.snap.create_transaction'),
  'data': {
    // Params
  }
})
.then((res) => {
  let data = res.data
  let token = data.token
  snap.pay(token, {
    onSuccess: (result) => {
      //
    },
    onPending: (result) => {
      //
    },
    onError: (result) => {
      //
    },
    onClose: (result) => {
      //
    }
  })
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "token":"Snap Token",
    "redirect_uri":"Redirect URI"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will create transaction and return snap token.

### HTTP Request

`POST http://yourdomain/veltrans/snap/create_transaction`

### Route Name

`route('veltrans.snap.create_transaction')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
order_id | Order Id of your application | required
gross_amount | Total of Order price without comma | requried
item_details | All of your order items | optional
billing_address | Billing address of customer | optional
shipping_address | Shipping address of customer | optional
customer_details | Customer information detail | optional

# Core API

## Capture Transaction

> Axios Example

```javascript
axios({
  'method': 'POST',
  'url': route('veltrans.core.capture'),
  'data': {
    // Params
  }
})
.then((res) => {
  //
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "response" : "Response Message"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will capture transaction

### HTTP Request

`POST http://yourdomain/veltrans/core/capture`

### Route Name

`route('veltrans.core.capture')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
transaction_id | Midtrans transaction_id | required
gross_amount | Total amount without comma | required

## Approve Transaction

> Axios Example

```javascript
axios({
  'method': 'POST',
  'url': route('veltrans.core.approve',{order_id:order_id})
})
.then((res) => {
  //
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "response" : "Response Message"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will approve transaction

### HTTP Request

`POST http://yourdomain/veltrans/core/{order_id}/approve`

### Route Name

`route('veltrans.core.approve')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
order_id | Order Id of Transaction | required

## Deny Transaction

> Axios Example

```javascript
axios({
  'method': 'POST',
  'url': route('veltrans.core.deny',{order_id:order_id})
})
.then((res) => {
  //
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "response" : "Response Message"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will deny transaction

### HTTP Request

`POST http://yourdomain/veltrans/core/{order_id}/deny`

### Route Name

`route('veltrans.core.deny')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
order_id | Order Id of Transaction | required

## Cancel Transaction

> Axios Example

```javascript
axios({
  'method': 'POST',
  'url': route('veltrans.core.cancel',{order_id:order_id})
})
.then((res) => {
  //
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "response" : "Response Message"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will cancel transaction

### HTTP Request

`POST http://yourdomain/veltrans/core/{order_id}/cancel`

### Route Name

`route('veltrans.core.cancel')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
order_id | Order Id of Transaction | required

## Expire Transaction

> Axios Example

```javascript
axios({
  'method': 'POST',
  'url': route('veltrans.core.expire',{order_id:order_id})
})
.then((res) => {
  //
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "response" : "Response Message"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will expire transaction

### HTTP Request

`POST http://yourdomain/veltrans/core/{order_id}/expire`

### Route Name

`route('veltrans.core.expire')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
order_id | Order Id of Transaction | required

## Refund Transaction

> Axios Example

```javascript
axios({
  'method': 'POST',
  'url': route('veltrans.core.refund',{order_id:order_id})
})
.then((res) => {
  //
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "response" : "Response Message"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will refund transaction

### HTTP Request

`POST http://yourdomain/veltrans/core/{order_id}/refund`

### Route Name

`route('veltrans.core.refund')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
order_id | Order Id of Transaction | required

## Get Status Transaction

> Axios Example

```javascript
axios({
  'method': 'GET',
  'url': route('veltrans.core.status',{order_id:order_id})
})
.then((res) => {
  //
})
.catch((err) => {
  //
})
```

> Possible Valid Response

```json
[
  {
    "response" : "Response Message"
  }
]

```

> Possible Error Response

```json
[
  {
    "error":"Error Message"
  }
]
```

This endpoint will get transaction status

### HTTP Request

`GET http://yourdomain/veltrans/core/{order_id}/status`

### Route Name

`route('veltrans.core.status')`

### Query Parameters

Parameter | Description | Required / Optional
--------- | ----------- | -------------------
order_id | Order Id of Transaction | required

# License and Contributing

This package is offered under the MIT license. In case you're interested at contributing, make sure to read the contributing guidelines.

# Testing

Run tests using:

`vendor/bin/phpunit`
