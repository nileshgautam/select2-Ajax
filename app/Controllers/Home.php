<?php

namespace App\Controllers;

use App\Models\Menu;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');

        echo '<H1>F</H1>';
    }

    public function getMenus()
    {
        $menus = new Menu();
        $data = $menus->getMenusList($this->request->getPost('searchTerm'));
        $dataArr = [];
        if ($data) {
            foreach ($data as $item) {
                $dataArr[] = ['id' => $item['id'], 'text' => $item['title']];
            }
        }
        echo json_encode($dataArr);
    }
}
