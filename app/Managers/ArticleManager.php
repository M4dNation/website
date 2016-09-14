<?php

namespace App\Managers;

use Carbon\Carbon;
use Auth;

class ArticleManager 
{
    const TAGS = "<b><strong><em><i><ins><u><s><del><strike><h2><h3><h4><h5><ul><ol><li><span><a><iframe><font><div><sup><sub><p><br>";

    public function __construct()
    {

    }

     /**
    * format
    * This function is used to 
    * @return 
    */
    public function format($data, $lang)
    {
        $formatData = array();
        $formatData['user_id'] = Auth::user()->id;
        $formatData['lang'] = $lang;
        $formatData['number_label'] = $data['number_label'];
        $formatData['title'] = $data['title-'.$lang];
        $formatData['content'] = strip_tags($data['content-'.$lang], self::TAGS);
        $formatData['content'] = str_replace('<a ', '<a target="_blank"', $formatData['content']);

        return $formatData;
    }

     /**
    * formatDate
    * This function is used to 
    * @return 
    */
    public static function formatDate($article, $lang)
    {
        if ($lang == 'en')
        {
            
            $formatedDate = new Carbon($article->updated_at);
            setlocale(LC_TIME, '');
            return $formatedDate->formatLocalized('%B %d, %Y');
        }   
        if ($lang == 'fr')
        { 
            $formatedDate = new Carbon($article->updated_at);
            setlocale(LC_TIME, 'fr_FR.utf8');
            return $formatedDate->formatLocalized('%d %B %Y');
        }
    }
}