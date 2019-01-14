<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/8/19
 * Time: 11:13 AM
 */

namespace Dedegunawan\SimakApiClient;


class Base
{
    public function __construct()
    {
        $this->setCurl(new SimpleCurl());
    }

    protected $curl;

    /**
     * @return SimpleCurl
     */
    public function getCurl()
    {
        return $this->curl;
    }

    /**
     * @param mixed $curl
     */
    public function setCurl($curl)
    {
        $this->curl = $curl;
    }

}