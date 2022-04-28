<?php

class SendSms
{
    private $_endpoint;
    public $key;
    public $message;
    public $numbers;
    public $sender;

    public function __construct()
    {
        $this->_endpoint = 'https://apps.mnotify.net/smsapi';
    }

    public function sendMessage()
    {
        $endPoint = 'https://api.mnotify.com/api/sms/quick';
        $apiKey = 'TW8jtrv7E9JdNeB4H0566Ijd3McRkjiegqxJS2RwcAKZO';
        $url = $endPoint . '?key=' . $apiKey;

        $data = [
            'recipient'     => [$this->numbers],
            'sender'        => $this->sender,
            'message'       => $this->message,
            'is_schedule'   => 'false',
            'schedule_date' => ''
        ];

        $ch = curl_init();
        $headers = array();
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        return $result = json_decode($result, TRUE);
        curl_close($ch);
    }

    public function sendMessageV1()
    {
        $url = $this->_endpoint . "?key=" . $this->key . "&to=" . $this->numbers . "&msg=" . $this->message . "&sender_id=" . $this->sender;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $result = curl_exec($ch);
        return $this->interpret($result);
        curl_close($ch);
    }

    private function interpret($code)
    {
        $status = '';
        switch ($code) {
            case '1000':
                $status = 'Messages has been sent successfully';
                // count_sms_sent();
                return $status;
                break;
            case '1002':
                $status = 'SMS sending failed. Might be due to server error or other reason';
                return $status;
                break;
            case '1003':
                $status = 'Insufficient SMS credit balance';
                return $status;
                break;
            case '1004':
                $status = 'Invalid API Key';
                return $status;
                break;
            case '1005':
                $status = 'Invalid recipient\'s phone number';
                return $status;
                break;
            case '1006':
                $status = 'Invalid sender id. Sender id must not be more than 11 characters. Characters include white space';
                return $status;
                break;
            case '1007':
                $status = 'Message scheduled for later delivery';
                return $status;
                break;
            case '1008':
                $status = 'Empty Message';
                return $status;
                break;
            default:
                return $status;
                break;
        }
    }
}
