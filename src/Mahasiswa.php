<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/8/19
 * Time: 11:07 AM
 */

namespace Dedegunawan\SimakApiClient;


class Mahasiswa extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $this->getCurl()->setRelativeUrl("/mahasiswa/list");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }
    public function getMahasiswaAktif() {
        $this->getCurl()->setRelativeUrl("/mahasiswa/list_mahasiswa_aktif");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }
}