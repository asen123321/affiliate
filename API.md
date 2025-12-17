
ProfitShare
To authenticate to our API, you have to send the following headers:
Date - current date, format D, d M Y H:i:s T
X-PS-Client - Profitshare API USER
X-PS-Accept - json
X-PS-Authhmac sha1 result of signature string using PROFITSHARE_API_KEY as key. The signature string is:
"$request_type$route" . $query_string .'/'. PROFITSHARE_API_USER . $date

PHP Example:



        $date = gmdate('D, d M Y H:i:s T', time());
        $signature_string = "$request_type$route" . $query_string .'/'. PS_API_USER . $date;
        $auth = hash_hmac('sha1', $signature_string, PS_API_KEY);
        $extra_headers = array(
            "Date: {$date}",
            "X-PS-Client: " . PS_API_USER,
            "X-PS-Accept: json",
            "X-PS-Auth: {$auth}"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $extra_headers);


Javascript Example:



        const crypto = require('crypto');
        const https = require('https');
        const qs = require('qs')
        const api_user = "testing";
        const api_key = 'testing';
        const date = (new Date()).toUTCString();
        const signature_string = 'POSTproducts/' + api_user + date;
        const hmac = crypto.createHmac("sha1", api_key);
        const signed = hmac.update(signature_string).digest('hex');

        const data = {};

        const options = {
            hostname: 'api.profitshare.bg',
            port: 443,
            path: '/products',
            method: 'POST',
            form: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Date': date,
                'X-PS-Client': api_user,
                'X-PS-Accept': 'json',
                'X-PS-Auth': signed,
            },
        };

        const req = https.request(options, res => {
            console.log(`statusCode: ${res.statusCode}`);

            res.on('data', d => {
                process.stdout.write(d);
            });
        });

        req.on('error', error => {
            console.error(error);
        });

        req.write(qs.stringify(data));
        req.end();


Possible authentication errors
AuthHeaderMissing - this means that the X-PS-Auth header was not detected in your request
AuthTimeDifference - this means that the time difference between the request time and ourserver time is greater than 20 seconds. Please read the important note below
ClientHeaderMissing - this means that the X-PS-Client header was not detected in your request
DateHeaderMissing - this means that the X-PS-Date header was not detected in your request
InvalidClient - the supplied API USER is not registered with our system
InvalidSignature - the supplied signature in X-PS-Auth header is wrong. Possible reasons are: the signature_string was not properly computed, the HMAC algorithm was not properly calculated, the API KEY is wrong or not valid
Important
Because the signature string relies on a timestamp it is very important to have your server/system time synchronized with a NTP server. The web service allows only a 20 seconds difference between request and server time
API Reference
The following terminology will be used along the documentation:
Sample Request - indicates a sample HTTP request sent to web service
Sample Response - indicates a sample HTTP response returned by the web service
Exception - the possible errors that the specific method can return
API_URL - the base URL for the API
Responses are shown here in XML format but the web service can also return data in the JSON format.
Important
the header values in request/response samples do not contain valid data, this means that you cannot rely on X-PS-Auth header to contain a correct/valid signature
the response body is sometimes truncated when it contains repetitive structures
Profitshare API throttles all routes. Based on the importance of the route for affiliates, the throttle could be up to 100 requestes per minute. If one request will exceed the allowed rate, then the following error will be thrown:
Error 429:
Code	Type	Message
TOO_MANY_REQUESTS		You have exceeded the allowed rate limit for this API route (Current limit: 100 calls per 60 seconds). Try again in 60 seconds.
Advertisers
Advertisers | Advertisers listing
Details of active advertisers.

Current limit: 60 calls per 60 seconds


get
[API_URL]/affiliate-advertisers/
Example link:
curl -x GET /affiliate-advertisers/
Header
Field	Type	Description
Host	string
Url Api

Date	date
Date

X-PS-Client	string
Client

X-PS-Accept	json
Json Content

X-PS-Auth	string
Auth Token

Header Sample Request:

'Host:api.profitshare.bg'
'Date:Thu, 17 Jul 2012 14:52:54 GMT'
'X-PS-Client:test-account'
'X-PS-Accept:json'
'X-PS-Auth:90a6d325e982f764f86a7e248edf6a660d4ee833'
Filter_name params
Field	Type	Description
advertiser	string
Filter advertisers listing by advertiser id

Sample Response:
HTTP/1.1 200 OK
{
"Date": Thu, 17 Jul 2012 14:52:55 GMT,
"Server": profitshare.bg,
"Content-Length": 795,
"Connection": close,
"Content-Type": text/json,
"Response body":
{
"result":[
{
"id": "100",
"name": "Advertiser 1",
"logo": "//profitshare.bg/files_shared/advertiser-logos/logo_1.png",
"category": "Fashion",
"url": "http://www.xxxx.bg",
"affiliate_statuses": [
"active": "yes",
"approved": "yes"
]
},
{
"id": "104",
"name": "Advertiser 2",
"logo": "//profitshare.bg/files_shared/advertiser-logos/logo_2.png",
"category": "Fashion",
"url": "http://www.yyyyy.bg",
"affiliate_statuses": [
"active": "yes",
"approved": "yes"
]
},
…
]
}
}
Error 400
Name	Type	Description
errors	Object
Please finalize your contract in order to generate links

Campaigns
Campaigns | Campaigns listing
The results are paginated, each page having 20 results. In order to get page N, provide parameter page=N \n Important: Please be aware that our system also support flash files with .swf extension. In case youwish to integrate in html, please use the proper tags.

Current limit: 60 calls per 60 seconds


GET
[API_URL]/affiliate-campaigns/
Example link:
curl -x GET /affiliate-campaigns/
Header
Field	Type	Description
Host	string
Url Api

Date	date
Date

X-PS-Client	string
Client

X-PS-Accept	json
Json Content

X-PS-Auth	string
Auth Token

Header Sample Request:

'Host:api.profitshare.bg'
'Date:Thu, 17 Jul 2012 14:52:54 GMT'
'X-PS-Client:test-account'
'X-PS-Accept:json'
'X-PS-Auth:90a6d325e982f764f86a7e248edf6a660d4ee833'
Sample Response:
HTTP/1.1 200 OK
{
"Date": Thu, 17 Jul 2012 14:52:55 GMT,
"Server": profitshare.bg,
"Content-Length": 795,
"Connection": close,
"Content-Type": text/json,
"Response body":
{
"result":{
"paginator":{
"itemsPerPage":20,
"currentPage":2,
"totalPages":2
},
"campaigns":[
{
"id":118,
"name":"Carti la eMAG",
"commissionType":"CPS",
"startDate":"2013-05-13 00:00:00",
"endDate":"2013-12-31 00:00:00",
"url":"http://www.emag.ro/carti/l/",
"banners":{
"468x60":{
"width":468,
"height":60,
"src":"//profitshare.bg/images/advertiser_widgets/a.jpg"
},
"125x125":{
"width":125,
"height":125,
"src":"//profitshare.bg/images/advertiser_widgets/s.swf"
}
},
…
}
]
}
}
}
Commissions
Commissions | Commission details
Filter one commission by order number.

Current limit: 60 calls per 60 seconds


get
[API_URL]/affiliate-commissions-details/
Example link:
curl -x GET "[API_URL]/affiliate-commissions-details/?order_number=1234553"
Header Sample Request:

'Host:api.profitshare.bg'
'X-PS-Client:test-account'
'X-PS-Accept:json'
'X-PS-Auth:90a6d325e982f764f86a7e248edf6a660d4ee833'
Body filters params
Field	Type	Description
filters[filter_name]	string
filter_value

Filter_name params
Field	Type	Description
order_number	string
order number of the commission

Result fields
Field	Type	Description
order_date_time	string
order date and time

status	string
general status of order

last_update	string
last update date and time

hash	string
optional parameter used in affiliate links. (For example: http://profitshare.ro/l/123456/qwexyz)

referer_page	string
click referrer page

click_date	string
click date and time

recurring_time	number
total seconds between click date and order date

id_advertiser	number
unique advertiser id. Use method Advertisers listing to retrieve more details about advertisers

products	array
products

Success-Response:
HTTP/1.1 200 OK
{
"Date": Thu, 17 Jul 2023 14:52:55 GMT,
"Server": profitshare.bg,
"Content-Length": 795,
"Connection": close,
"Content-Type": text/json,
"Response body":
{
"result":[
{
"order_date_time": "2024-01-01 05:00:00",
"status": "approved",
"last_update": "2024-01-15 00:00:00",
"hash": "12313sadfasc234",
"referer_page": "https://google.bg/",
"click_date": "2024-01-01 00:00:00",
"id_advertiser": "123",
"products": [
{
"name" => "Product name",
"code" => "123",
"part_no" => "ZXC123",
"amount" => "139.99",
"commission" => "13.99",
"status" => "approved",
},
{
"name" => "Product name 2",
"code" => "345",
"part_no" => "ZXC345",
"amount" => "159.99",
"commission" => "15.99",
"status" => "canceled",
},
],
},
]
}
}
Commissions | Commission listing
The results can be filtered by providing additional parameters and ordered as well. The filters will be sent via the filters parameter and the order will be sent via the order parameter. Each order has different items (products) that could be commisioned using diffent commision percents. Use the following fields to retrieve details about each item(separated by „|”).

Current limit: 100 calls per 60 seconds


get
[API_URL]/affiliate-commissions/
Example link:
curl -x GET /affiliate-commissions/? filters[status]=pending&filters[date_from]=2013-01-15&filters[date_to]=2013-01-16
Header
Field	Type	Description
Host	string
Url Api

Date	date
Date

X-PS-Client	string
Client

X-PS-Accept	json
Json Content

X-PS-Auth	string
Auth Token

Header Sample Request:
'Host:api.profitshare.bg'
'Date:Thu, 17 Jul 2012 14:52:54 GMT'
'X-PS-Accept:json'
'X-PS-Auth:90a6d325e982f764f86a7e248edf6a660d4ee833'
Filter_name params
Field	Type	Description
status	string
the status for the commission

date_from	date
for date_added >= date_from

date_to	date
for date_added <= date_to

click_hash	string
hash used as an optional parameter on affiliate links

Order params
Field	Type	Description
date	date
date

page	number
pages number

Order commission
Field	Type	Description
commission	number
commission value

Query Parameter(s)
Field	Type	Description
filters[filter_name]  	string
filter name

Result fields
Field	Type	Description
order_id	Number
unique order identifier (profitshare)

order_ref	Number
unique order identifier (advertiser)

order_status	string
general status of the order. May have one of the following values:pending,approved,canceled

advertiser_id	Number
unique advertiser id. Use method Advertisers listing to retrieve more details about advertisers

hash	string
optional parameter used in affiliate links. (For example: http://profitshare.bg/l/123456/qwexyz)

order_date	date
order date and time

order_updated	date
last update date and time

items_status	string
status of each order item separated by „|”. May have one of the following values:pending, approved, canceled

items_commision	number
value of each order item commision, in RON without VAT

items_commision_value	string
value of each order item commision percent

network_reference	string
network tracking reference

Success-Response:
HTTP/1.1 200 OK
{
Date: Tue, 17 Jul 2012 14:55:35 GMT Server: Profitshare
Content-Length: 795
Connection: close
Content-Type: text/json
{
"result": {
"current_page": 1,
"total_pages": 2,
"records_per_page": 25,
"commissions": [
{
"order_id": 3000099327,
"order_ref": "8657110",
"order_status": "pending",
"advertiser_id": 35,
"hash": "your_refference",
"order_date": "2013-11-01 14:20:37",
"order_updated": "0000-00-00 00:00:00",
"items_status": "pending|pending",
"items_commision": "4.5965|56.3707",
"items_commision_value": "3.00|3.00",
"network_reference": "Cj0KCQjw2cWgBhDYARIsALggUNqtfnj5q8aAumnEALw_aS"
},
{
"order_id": 3000099323,
"order_ref": "45699",
"order_status": "pending",
"advertiser_id": 35,
"hash": "your_refference",
"order_date": "2013-11-01 13:53:00",
"order_updated": "0000-00-00 00:00:00",
"items_status": "pending",
"items_commision": "5.4031",
"items_commision_value": "1.00",
"network_reference": "Cj0KCQjw2cWgBhDYARIsALggUNqtfnj5q8aAumnEALw_aS"
},
…
]
}
}
}
Links
Links | Links add
Important:You can use an optional parameter for each affiliate link in order to get reporting based on this parameter.

Current limit: 100 calls per 60 seconds


post
[API_URL]/affiliate-links/
Example link:
curl -x POST /affiliate-links
Header
Field	Type	Description
Host	string
Url Api

Date	date
Date

X-PS-Client	string
Client

X-PS-Accept	json
Json Content

X-PS-Auth	string
Auth Token

Header Sample Request:

'Host:api.profitshare.bg'
'Date:Thu, 17 Jul 2012 14:52:54 GMT'
'X-PS-Client:test-account'
'X-PS-Accept:json'
'X-PS-Auth:90a6d325e982f764f86a7e248edf6a660d4ee833'
Query Parameter(s)
Field	Type	Description
links[N]  	string[int][string]
[name] name should be url encoded, N number of results

link[N]  	string[int][string]
[url] url should be url encoded, N number of results

Sample Response:
HTTP/1.1 200 OK
{
"Date": Thu, 17 Jul 2012 14:52:55 GMT,
"Server": profitshare.bg,
"Content-Length": 795,
"Connection": close,
"Content-Type": text/json,
"Response body":
{
"result":[
{
"name": "test 1",
"url": "http://www.advertiser1.ro/landingpage1",
"ps_url": "http://profitshare.bg/l/352101",
},
{
"name": "test 2",
"url": "http://www.advertiser2.ro/offers",
"ps_url": "http://profitshare.bg/l/352102"
},
…
]
}
}
Products
Products | Products listing
This method is used to retrieve details about products. The results can be filtered by providing additional parameters. The filters will be sent via the filters.

Current limit: 60 calls per 60 seconds


get
[API_URL]/affiliate-products/
Example link:
curl -x GET "[API_URL]/affiliate-products/? filters[advertiser]=45,41"
Header Sample Request:

'Host:api.profitshare.bg
'X-PS-Client:test-account'
'X-PS-Accept:json'
'X-PS-Auth:90a6d325e982f764f86a7e248edf6a660d4ee833'
Body filters params
Field	Type	Description
filters[filter_name]	string
filter_value

Filter_name params
Field	Type	Description
advertisers	string
the status for the commission (filter value example: 45,56)

part_no	string
Filter products by model or part number (SKU)

Body param
Field	Type	Description
page	number
The results are paginated, each page having 20 results. In order to get page N, provide number for N

Result fields
Field	Type	Description
link	string
link of product

name	string
name of product

price_vat	number
price with vat of product

price	number
price without vat of product

advertiser_name	string
advertiser name

category_name	string
category of product

advertiser_id	number
unique advertiser id. Use method Advertisers listing to retrieve more details about advertisers

Success-Response:
HTTP/1.1 200 OK
{
Date: Tue, 17 Jul 2012 14:55:35 GMT Server: Profitshare
Content-Length: 795
Connection: close
Content-Type: text/json
{
"result": {
"current_page": 1,
"total_pages": 1,
"records_per_page": 20,
"products": [
{
"link":"http://www.test.ro/test/test",
"name":"Laptop Lenovo",
"image":"http://static.profitshare.bg/sfsd/sdfsdf.jpg",
"price_vat":1299,
"price":1047.58,
"advertiser_id":41,
"advertiser_name":"test.ro",
"category_name":"Laptopuri"
},
{
"link":"http://www.test.ro/test/test ",
"name":"Laptop Lenovo",
"image":"http://static.profitshare.bg/sfsd/sdfsdf.jpg",
"price_vat":1299,
"price":1047.58,
"advertiser_id":41,
"advertiser_name":"test.ro",
"category_name":"Laptopuri"
},
…
]
}
}
}
Webhooks
Webhooks | Order Add
If you have set webhooks url in your affiliate accout, then for each event below you wil receive a request from us. Each request will be accompanied by the User Agent ProfitshareWebhooks/v1.0 and if you have set a token, the Authorization header will be sent with value Bararer {token}

When a new order is registered, a GET request will be made with the following parameters


get
[Webhook_URL]
Get param
Field	Type	Description
order_reference	string
Order number from your account

advertiser_id	string
Order advertiser identifier

status	string
Current Order status - it will be pending

order_date_time	string
Order date and time

commissions	float
Total commissions value

amount	float
Total amount value

referrer_page	string
Click referrer page - if it does not exist then null will be sent

type	string
order_add

hash	string
Order hash value - it will be sent only if exist

Webhooks | Order Update
If you have set webhooks url in your affiliate accout, then for each event below you wil receive a request from us. Each request will be accompanied by the User Agent ProfitshareWebhooks/v1.0 and if you have set a token, the Authorization header will be sent with value Bararer {token}

When a new order is changed, a GET request will be made with the following parameters


get
[Webhook_URL]
Get param
Field	Type	Description
order_reference	string
Order number from your account

advertiser_id	string
Order advertiser identifier

status	string
Current Order status - it will be pending

order_date_time	string
Order date and time

commissions	float
Total commissions value

amount	float
Total amount value

referrer_page	string
Click referrer page - if it does not exist then null will be sent

type	string
order_add

hash	string
Order hash value - it will be sent only if exist

Sample requests
Getting the active advertisers list


                $api_user = 'api_user';
                $api_key = 'api_key';
                $url = 'http://api.profitshare.bg/affiliate-advertisers/?';
                $query_string = '';
                $spider = curl_init();
                curl_setopt($spider, CURLOPT_HEADER, false);
                curl_setopt($spider, CURLOPT_URL, $url. $query_string);
                curl_setopt($spider, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($spider, CURLOPT_TIMEOUT, 30);
                curl_setopt($spider, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($spider, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($spider, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows
                NT 5.1)');
                $profitshare_login = array(
                'api_user' => $api_user,
                'api_key' => $api_key,
                );
                $date = gmdate('D, d M Y H:i:s T', time());
                $signature_string = 'GETaffiliate-advertisers/?' . $query_string .
                '/'.$profitshare_login['api_user'] . $date;
                $auth = hash_hmac('sha1', $signature_string, $profitshare_login['api_key']);
                $extra_headers = array(
                "Date: {$date}",
                "X-PS-Client: {$profitshare_login['api_user']}",
                "X-PS-Accept: json",
                "X-PS-Auth: {$auth}"
                );
                curl_setopt($spider, CURLOPT_HTTPHEADER, $extra_headers);
                $output = curl_exec($spider);
                curl_close($spider);
                echo $output;



Advertiser products


                $api_user = 'xxx';
                $api_key = 'xxx';
                $url = 'http://api.profitshare.bg/affiliate-products/?';
                $query_string = 'page=1&filters[advertiser]=57323';
                $spider = curl_init();
                curl_setopt($spider, CURLOPT_HEADER, false);
                curl_setopt($spider, CURLOPT_URL, $url. $query_string);
                curl_setopt($spider, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($spider, CURLOPT_TIMEOUT, 30);
                curl_setopt($spider, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($spider, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($spider, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows
                NT 5.1)');
                $profitshare_login = array(
                'api_user' => $api_user,
                'api_key' => $api_key,
                );
                $date = gmdate('D, d M Y H:i:s T', time());
                $signature_string = 'GETaffiliate-products/?' . $query_string .
                '/'.$profitshare_login['api_user'] . $date;
                $auth = hash_hmac('sha1', $signature_string, $profitshare_login['api_key']);
                $extra_headers = array(
                "Date: {$date}",
                "X-PS-Client: {$profitshare_login['api_user']}",
                "X-PS-Accept: json",
                "X-PS-Auth: {$auth}"
                );
                curl_setopt($spider, CURLOPT_HTTPHEADER, $extra_headers);
                $output = curl_exec($spider);
                curl_close($spider);
                echo $output;



Link generator


                $api_user = 'API_USER';
                $api_key = 'API_KEY';
                $url = 'http://api.profitshare.bg/affiliate-links/?';
                $query_string = '';
                $spider = curl_init();
                curl_setopt($spider, CURLOPT_HEADER, false);
                curl_setopt($spider, CURLOPT_URL, $url. $query_string);
                curl_setopt($spider, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($spider, CURLOPT_TIMEOUT, 30);
                curl_setopt($spider, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($spider, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($spider, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows
                NT 5.1)');
                $data = array();
                $data[] = array(
                    'name' => 'API-emag',
                    'url' => 'http://www.emag.ro'
                );
                curl_setopt($spider, CURLOPT_POST, true);
                curl_setopt($spider, CURLOPT_POSTFIELDS, http_build_query($data));
                $profitshare_login = array(
                    'api_user' => $api_user,
                    'api_key' => $api_key,
                );
                $date = gmdate('D, d M Y H:i:s T', time());
                $signature_string = 'POSTaffiliate-links/?' . $query_string .
                '/'.$profitshare_login['api_user'] . $date;
                $auth = hash_hmac('sha1', $signature_string, $profitshare_login['api_key']);
                $extra_headers = array(
                    "Date: {$date}",
                    "X-PS-Client: {$profitshare_login['api_user']}",
                    "X-PS-Accept: json",
                    "X-PS-Auth: {$auth}"
                );
                curl_setopt($spider, CURLOPT_HTTPHEADER, $extra_headers);
                $output = curl_exec($spider);
                curl_close($spider);
                print_r($output);
            
