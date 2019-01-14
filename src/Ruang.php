<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/8/19
 * Time: 11:07 AM
 */

namespace Dedegunawan\SimakApiClient;

class Ruang extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $this->getCurl()->setRelativeUrl("/ruang/list");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }
    public function ruangKuliah() {
        $this->getCurl()->setRelativeUrl("/ruang/list_ruang_kuliah");
        $datas = $this->getCurl()->parsedPost();

        return $datas;

    }
}