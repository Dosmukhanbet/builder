<?php
namespace App\Services;

use App\Services;



class SMS {

            public function send($recipient, $body)
            {

$api = new MobizonApi(getenv('MOBIZON_KEY'));

echo 'Send message...' . PHP_EOL;
$alphaname = 'sellwithus';

                if ($api->call('message',
                'sendSMSMessage',
                array(
                'recipient' => $recipient,
                'text'      => $body,
                'from'      => $alphaname, //Optional, if you don't have registered alphaname, just skip this param and your message will be sent with our free common alphaname.
                ))
                ) {
                $messageId = $api->getData('messageId');
                echo 'Message created with ID:' . $messageId . PHP_EOL;

                if ($messageId) {
                echo 'Get message info...' . PHP_EOL;
                $messageStatuses = $api->call(
                'message',
                'getSMSStatus',
                array(
                'ids' => array($messageId, '13394', '11345', '4393')
                ),
                array(),
                true
                );

                if ($api->hasData()) {
                foreach ($api->getData() as $messageInfo) {
                echo 'Message # ' . $messageInfo->id . " status:\t" . $messageInfo->status . PHP_EOL;
                }
                }
                }
                } else {
                    echo 'An error occurred while sending message: [' . $api->getCode() . '] ' . $api->getMessage() . 'See details below:' . PHP_EOL;
                    var_dump(array($api->getCode(), $api->getData(), $api->getMessage()));
                }






}}
