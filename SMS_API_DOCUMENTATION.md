Base URL
Submit all requests to the base URL. All the requests are submitted thorough POST and some requests are GET method. Although you can use HTTP protocol, we strongly recommend you to submit all requests to MiMSMS SMS API over HTTPS so the traffic is encrypted and the privacy is ensured.

Base URL: https://api.mimsms.com

Parameters
Parameter	Type	Requirements	Description
UserName	String	Mandatory	Your Username.
Apikey	String	Mandatory	Your API Key.
MobileNumber	String	Mandatory	Destination mobile number.
CampaignId	String	Optional (Mandatory for Promotional)	Approved campaign ID of your promotional Bulk Messages.
SenderName	String	Mandatory	Your registered sender id.
TransactionType	String	Mandatory	T: for transactional SMS P: for promotional SMS D: for dynamic SMS
Message	String	Mandatory	Your messages body.
trxnId	String[]		Each message successfully submitted to MiMSMS platform is uniquely identified with the trxnId. Furthermore, the Transaction ID can be used for checking delivery status or sent messages logs
Content-Type
MiMSMS SMS API supports JSON Content-Types and Accept criteria that should be specified in the header. If the Content-Type is not specified you will receive a general error. Depending which Accept type is chosen in the deader for the request, the same one will be applied in the response.

Content-Type: application/json

Authorization
We support basic authorization using a username and API Key.

Example:
Username: you@example.com

API Key: XXXXXXXXXXXXXXXX

SEND SMS
In a few simple steps, we will explain how to send an SMS using MiMSMS HTTP API.

Firstly, you’ll need a valid MiMSMS account. When you sign up for the account, your email address will set as your username

and the API Key can be generated from your Developer Option of MiM SMS Portal.

Authorization Section:
The message will be sent only to a valid phone number (numbers), written in international format e.g.8801844909020. We strongly recommend using the international format without + (plus sign), followed by a country code, network code and the subscriber number. Phone numbers that are not recommend formatted may not work properly.

Now, you are ready to send your first SMS message using:

POST https://api.mimsms.com/api/SmsSending/SMS

The request body contains the message you wish to send with from, to and text parameters. Full JSON request is shown below:

{
"UserName": " you@example.com ",
"Apikey": " XXXXXXXXXXXXXXXXXXXXXX",
"MobileNumber": "88018xxxxxxxx",
"CampaignId": "null",
"SenderName": "MiM Digital",
"TransactionType": "T",
"Message": " My first API SMS from MiM Digital"
}

Send SMS (JSON Format)
After the “Send SMS” HTTP request was submitted to the MiMSMS SMS API, you will get a response containing some useful information. If everything went well, it should provide a 200 OK response with message details in the response body.

Here is an example of a request for sending a single SMS:

POST /api/SmsSending/SMS
Host: api.mimsms.com
Content-Type: application/json
Accept: application/json

{
"UserName": " you@example.com ",
"Apikey": " XXXXXXXXXXXXXXXXXXXXXX",
"MobileNumber": "88018xxxxxxxx",
"CampaignId": "null",
"SenderName": "MiM SMS",
"TransactionType": "T",
"Message": " My first API SMS from MiM Digital"
}
And the appropriate response is shown below:

{
"statusCode": "200",
"status": "Success",
"trxnId": "1OSY3FSZ7H4IHOU",
"responseResult": "SMS Send Successfuly"
}

Multiple numbers can be separated by a comma only for promotional SMS.
Sending promotional messages must require prior approval from the regulatory.
Each message successfully submitted to the MiMSMS platform is uniquely identified with the trxnId. Furthermore, the Transaction ID can be used for checking delivery status or sent message logs.
status is the object that further describes the state of sent message. For a full list of available statuses, please check.

Send One to Many SMS (JSON Format)
After the “Send SMS” HTTP request was submitted to the MiMSMS SMS API, you will get a response containing some useful information. If everything went well, it should provide a 200 OK response with message details in the response body.

Here is an example of a request for sending a single SMS:

POST /api/SmsSending/OneToMany
Host: api.mimsms.com
Content-Type: application/json
Accept: application/json

{
"UserName": "you@example.com ",
"Apikey": "XXXXXXXXXXXXXXXXXXXXXX",
"MobileNumber": "88018xxxxxxxx,88017xxxxxxxx,88019xxxxxxxx",
"CampaignId": "null",
"SenderName": "MiM SMS",
"TransactionType": "T",
"Message": "My first API SMS from MiM Digital"
}

And the appropriate response is shown below:

{
"statusCode": "200",
"status": "Success",
"trxnId": "133585142743231481",
"responseResult": "SMS Send Successfuly"
}
Multiple numbers can be separated by a comma.
Each message successfully submitted to MiMSMS platform is uniquely identified with the trxnId. Furthermore, the Transaction ID can be used for checking delivery status or sent message logs.
status is the object that further describes the state of sent For a full list of available statuses, please check.

Send Dynamic SMS (JSON Format)
Send specific messages to multiple destinations by calling one API method only once. Your request should be like this:

POST / api/SmsSending/DSMS
Host: api.mimsms.com
Content-Type: application/json

{
"UserName": "masum@mimsms.com",
"Apikey": "XXXXXXXXXXXXXXXXXXXXXX",
"SenderName": "ABCD",
"TransactionType": "D",
"SmsData": [
    {
         "MobNumber": "8801844909020",
         "Message": "Hello Dear Mohammad"
    },
    {
         "MobNumber": "8801844909021",
         "Message": "Hello Dear Abdur Rahman"
    }
  ]
}

This way you’ll send specific SMS messages to multiple destinations in a single request. The response you get will contain information about all the messages sent out:

HTTP/1.1 200 OK
Content-Type: application/json

{
"statusCode": "200",
"status": "Success",
"trxnId": "ZICU7TMXV9B6ZG8_C28",
"responseResult": "SMS Send Successfuly"
}

Send SMS (Using HTTP Plain, Query)
similar to the previous method, this method allows sending SMS messages passing parameters directly as query string variables.

Here is an example of a HTTP Plain (POST) request for sending a single SMS: The URL used to send messages using HTTP GET or POST is:

Access point: https://api.mimsms.com/api/SmsSending/Send?

Examples:

https://api.mimsms.com/api/SmsSending/Send?UserName=you@example.com&Apikey=XXXXXXXXXX&MobileNumber=88018XXXXXXXX&SenderName=ABCD&TransactionType=T&Message=TestMessages

The appropriate response is shown below:

{
"statusCode": "200",
"status": "Success",
"responseResult": "SMS Send Successfuly",
"trxnId": "J4Y3RQ6Z5QIL7H2"
}

Send One to Many SMS (GET)
similar to the previous method, this method allows sending SMS messages passing parameters directly as query string variables.

Here is an example of a HTTP Plain (POST) request for sending a single SMS:

The URL used to send messages using HTTP GET is:

Access point: https://api.mimsms.com/api/SmsSending/SendOneToMany?

Examples:

https://api.mimsms.com/api/SmsSending/SendOneToMany?UserName=abc@example.com&Apikey=KJFJUKKJKAT9X9CL&MobileNumber=8801844xxxxxx,8801713xxxxxx&CampaignId=null&SenderName=INFOSMS&TransactionType=T&Message=One to many API check from GET

The appropriate response is shown below

{
"statusCode": "200",
"status": "Success",
"responseResult": "SMS Send successfully",
"trxnId": "J4Y3RQ6Z5QIL7H2"
}

BALANCE CHECK
You can check your balance from API:

Base URL: https://api.mimsms.com/api/SmsSending/balanceCheck

JSON Request (POST)

{
"UserName": "you@example.com",
"Apikey": "XXXXXXXXXXXXX"
}

And the appropriate response is shown below:

{
"statusCode": "200",
"status": "Ok",
"trxnId": "",
"responseResult": "999.54"
}

QUERY Request (GET)

https://api.mimsms.com/api/SmsSending/balanceCheck?userName=example@you.com&Apikey=XXXXXXXXXXXX

And the appropriate response is shown below:

{
"statusCode": "200",
"status": "Ok",
"responseResult": "999.08"
}

ERROR STATUS CODE MAP
Code	Statue	Description	Action
200	SUCCESS	SMS Send Successfully	NULL
401	UNAUTHORIZED	IP Black List	Contact account manager
401	UNAUTHORIZED	Invalid UserName & Password	NULL
208	FAILED	Invalid Sender ID	NULL
205	FAILED	Invalid Message Content	NULL
206	FAILED	Invalid Mobile Number	NULL
209	FAILED	SMS Length cross the Max level	NULL
221	FAILED	SMS Sending Failed	NULL
500	FAILED	Internal Server Error	NULL
213	FAILED	Parameter Mismatch	NULL
216	FAILED	Insufficient Balance	Recharge Your Account.
210	FAILED	Invalid CampaignId	NULL
207	FAILED	Invalid Transaction Type	NULL
Error object example
{
"statusCode": "208",
"status": "Failed",
"trxnId": "KC5EBJ9XG0HKJY5_C",
"responseResult": "Invalid Sender ID"
}

OPERATOR ERROR STATUS (DLR)
Error Code Name	Error Description	Operator Retry Policy
Delivered	Delivered in Handset	0
Absent subscriber for SM	Subscriber handset is not logged onto the network due to it being turned off or out of coverage, likely to have been unavailable for 12 hours or more	3
Undelivered	Rejection due to subscriber handset not having the memory capacity to receive the message, likely to have been in state for 12 hours or more	0
Subscriber Busy	MSC is busy handling an existing transaction with the handset, the subscriber could be currently receiving an SMS at exactly the same time	3
Unidentified subscriber	MT number is unknown in the MT network’s MSC	0
Barred subscriber	A Barred Number is a number that cannot receive SMS. That could be related to unpaid bills, black listed by the carrier, requested by the user	0
Illegal subscriber	Sender ID Block by operators for Illegal SMS Traffic	0
SMS Failed	Sender ID Block by operators for Illegal SMS Traffic	0
System failure	Rejection due to SS7 protocol or network failure	3
SMS Failed	Network failure in SMSC Link	3
SMSC Timeout-abort	SMSC timeout	3