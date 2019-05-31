<?php

namespace App\Http\Controllers;

use Exception;

class ExceptionController
{
    public function index()
    {
        try{
            dd($this->one());
//            var_dump($this->one());
        } catch (Exception $e) {
            echo '<pre/>';
//            dd($e);
//            var_dump($e);die;
            echo '文件：'.$e->getFile(), '<br/>';
            echo '行：'.$e->getLine(), '<br/>';
            echo '信息：'.$e->getMessage(), '<br/>';
            echo 'Trace：'.$e->getTraceAsString(), '<br/>';
        }

    }

    /**
     * @return mixed
     * @throws Exception
     */
    private function one()
    {
        if (rand(1, 10) > 5) {
            throw new Exception('one Exception', 101);
        } else {
            return $this->two();
        }
    }

    /**
     * @return mixed
     * @throws Exception
     */
    private function two()
    {
        if (rand(1, 10) > 5) {
            throw new Exception('two Exception', 102);
        } else {
            return $this->three();
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    private function three()
    {
        if (rand(1, 10) > 5) {
            throw new Exception('one Exception', 103);
        } else {
            return true;
        }
    }
}