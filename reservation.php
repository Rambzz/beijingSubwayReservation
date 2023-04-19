<?php
/**
 *  author: Rambzz
 *  date: 2023/4/19 10:13
 */

class Init {
    protected $host = 'https://webui.mybti.cn/Appointment/CreateAppointment';
    protected $token = 'MDU3MGQxNzYtYjE2MS00ZGI2LWE3YTAtZjdlMDI2NDMzOTVlLDE2ODIxMTIzNjk5MzkscFZXdlhVbUs1RW5BbFpSUFdCbWhZSHk1WVd3PQ==';

    public function  sendRequest(){
        $data = [
            'line_name'          => '昌平线',
            'stationName'        => '沙河站',
            'enterDate'          => '20230419',
            'timeSlot'           => '0810-0820',
            'snapshotWeekOffset' => 0
        ];
        $res = $this->curlPost($this->host, $data, $this->token);
        var_dump($res);
    }

    protected function curlPost(string $url, array $data = array(), string $token)
    {
        $data = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization : Bearer '.$token
        ));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.59 Safari/537.36");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        var_dump($output);exit;
        curl_close($ch);
        return $output;
    }
}

$init = new Init();
$init->sendRequest();