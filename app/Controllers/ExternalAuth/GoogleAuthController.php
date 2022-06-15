<?php

namespace Aigletter\App\Controllers\ExternalAuth;

use GuzzleHttp\Client;

class GoogleAuthController
{
    public function getLink()
    {
        $clientId = '81603979826-fkgpf0po9r9nmid0u8fen2db7uejo4re.apps.googleusercontent.com';
        $redirectUri = 'http://localhost:8080/redirect/google';

        /*
         * https://accounts.google.com/o/oauth2/auth
         * client_id
         * redirect_uri
         * response_type = code
         * scope = https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile
         */

        $getParams = [
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
        ];

        $baseUrl = 'https://accounts.google.com/o/oauth2/auth?';
        $url = $baseUrl . urldecode(http_build_query($getParams));
        $this->redirect($url);
    }

    public function redirect(string $url)
    {
        header("Location: $url");
    }

    public function getUserData(string $code)
    {
        $clientId = '81603979826-fkgpf0po9r9nmid0u8fen2db7uejo4re.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = 'http://localhost:8080/redirect/google';

        $httpClient = new Client();

        /*
         *  https://accounts.google.com/o/oauth2/token
         * client_id
         * client_secret
         * redirect_uri
         * code
         * grant_type
         */

        $url = 'https://accounts.google.com/o/oauth2/token';
        $response = $httpClient->post($url, [
            'json' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'redirect_uri' => $redirectUri,
                'code' => $code,
                'grant_type' => 'authorization_code'
            ]
        ]);

        $json = json_decode($response->getBody()->getContents(), true);

        $getParams = [
            'access_token' => $json['access_token'],
            'id_token' => $json['id_token']
        ];

        /*
         * https://www.googleapis.com/oauth2/v1/userinfo
         */

        $baseUrl = 'https://www.googleapis.com/oauth2/v1/userinfo';
//        $url = $baseUrl . urldecode(http_build_query($getParams));

        $response = $httpClient->get($baseUrl, [
            'query' => $getParams
        ]);

        $userData = json_decode($response->getBody()->getContents(), true);

        echo 'Success';
    }



    /*
     * 1) Регистрация
     * 2) Авторизация
     */

}