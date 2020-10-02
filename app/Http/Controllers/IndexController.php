<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\IndexModel;

class IndexController extends Controller
{
    public $indexModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->indexModel = new IndexModel();
    }

    /**
     * Stores the message
     *
     * @return array
     */
    public function storeMessage()
    {
        $params = array();
        $data   = array();

        if (empty($_POST['data'])) {
            return array('code' => 402, 'message' => 'Please enter information');
        }

        foreach ($_POST['data'] as $data) {
            if (empty($data['value'])) {
                return array('code' => 402, 'message' => $data['name'].' is required');
            }

            $params[$data['name']] = $data['value'];
        }

        try {
            $data = $this->indexModel->saveMessage($params);
        } catch (Exception $e) {
            print ($e->getMessage());
        }

        if ($data) {
            $data = array('code' => 200, 'message' => 'Successfully added entry');
        }

        return $data;
    }
}
