<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/8/19
 * Time: 11:07 AM
 */

namespace Dedegunawan\SimakApiClient;


class Jenjang extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $this->getCurl()->setRelativeUrl("/jenjang/list");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }
}