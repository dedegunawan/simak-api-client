<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/8/19
 * Time: 11:07 AM
 */

namespace Dedegunawan\SimakApiClient;


class Khs extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $this->getCurl()->setRelativeUrl("/khs/list");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }

    public function getKhsAktif() {
        $this->getCurl()->setRelativeUrl("/khs/list_khs_aktif");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }
}