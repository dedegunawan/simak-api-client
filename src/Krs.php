<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/8/19
 * Time: 11:07 AM
 */

namespace Dedegunawan\SimakApiClient;


class Krs extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $this->getCurl()->setRelativeUrl("/krs/list");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }

    public function getKrsAktif() {
        $this->getCurl()->setRelativeUrl("/krs/list_krs_aktif");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }
}