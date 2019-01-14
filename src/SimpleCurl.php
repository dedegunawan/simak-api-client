<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/8/19
 * Time: 11:00 AM
 */

namespace Dedegunawan\SimakApiClient;


class SimpleCurl
{
    protected static $baseUrl;
    protected $url;
    protected $timeout;
    protected $request_type;
    protected $headers;
    protected static $static_headers;
    protected $datas;
    protected static $static_datas;

    public function __construct()
    {
        $this->setDatas(array());
        $this->setHeaders(array());
        if (self::getStaticHeaders() == null) {
            self::setStaticHeaders(array());
        }
        if (self::getStaticDatas() == null) {
            self::setStaticDatas(array());
        }
    }


    public function post() {
        $this->setRequestType("POST");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getUrl(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $this->getTimeout(),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->getRequestType(),
            CURLOPT_POSTFIELDS => http_build_query(array_merge(self::getStaticDatas(), $this->getDatas())),
            CURLOPT_HTTPHEADER => array_merge(array(
                "Content-Type: application/x-www-form-urlencoded",
            ), self::getStaticHeaders(), $this->getHeaders()),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            throw new \Exception($err);
        }
        return $response;
    }

    public function parsedPost() {
        $response = $this->post();
        return $this->parseTrueJson($response);
    }

    public function parseTrueJson($json) {
        $data = json_decode($json, 1);
        if (!is_array($data) || @!$data['status']) throw new \Exception(@$data['message']);
        return @$data['data'];

    }

    public function setRelativeUrl($url) {
        $this->setUrl($url);
        $this->setUrl(sprintf("%s%s", self::getBaseUrl(), $this->getUrl()));
    }


    /**
     * @return mixed
     */
    public static function getBaseUrl()
    {
        return self::$baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public static function setBaseUrl($baseUrl)
    {
        self::$baseUrl = $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param mixed $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @return mixed
     */
    public function getRequestType()
    {
        return $this->request_type;
    }

    /**
     * @param mixed $request_type
     */
    public function setRequestType($request_type)
    {
        $this->request_type = $request_type;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getDatas()
    {
        return $this->datas;
    }

    /**
     * @param mixed $datas
     */
    public function setDatas($datas)
    {
        $this->datas = $datas;
    }

    /**
     * @return mixed
     */
    public static function getStaticHeaders()
    {
        return self::$static_headers;
    }

    /**
     * @param mixed $static_headers
     */
    public static function setStaticHeaders($static_headers)
    {
        self::$static_headers = $static_headers;
    }

    /**
     * @return mixed
     */
    public static function getStaticDatas()
    {
        return self::$static_datas;
    }

    /**
     * @param mixed $static_datas
     */
    public static function setStaticDatas($static_datas)
    {
        self::$static_datas = $static_datas;
    }

}