<?php

namespace App\Managers;

use Auth;

class ArticleManager 
{
    const TAGS = "<b><i><u><strike><h2><h3><h4><h5><ul><ol><li><span><a><iframe><font><div><sup><sub><p>";

    public function __construct()
    {

    }

     /**
    * format
    * This function is used to 
    * @return 
    */
    public function format($data)
    {
        $data['user_id'] = Auth::user()->id;
        $data['content'] = strip_tags($data['content'], self::TAGS);
        $data['content'] = str_replace('<a ', '<a target="_blank"', $data['content']);

        return $data;
    }

}