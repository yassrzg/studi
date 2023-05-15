<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

Class Mail {

    private $api_key = 'd2b7f5a45c2f7fec5511b3f2b17674bb';
    private $api_key_secret = '232c8edede6ef2009bcd20b9d6e025ab';

    public function send ($to_email, $to_name, $subject, $content, $name_content) {

        $mj = new Client($this->api_key, $this->api_key_secret, true, ['version' => 'v3.1']);
        $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "leilassine@gmail.com",
                            'Name' => "Quai Antique"
                        ],
                        'To' => [
                            [
                                'Email' => $to_email,
                                'Name' => $to_name
                            ]
                        ],
                        'TemplateID' => 4805417,
                        'TemplateLanguage' => true,
                        'Subject' => $subject,
                        "Variables" => [
                            "content" => $content,
                            "name_content" => $name_content,
                            ]

                        ]
                    ]
                ];
                $response = $mj->post(Resources::$Email, ['body' => $body]);
                $response->success();
            }
        }