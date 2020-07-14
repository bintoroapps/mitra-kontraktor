<?php namespace App\Controllers;

use App\Models\SeoModel;

class SEOController extends BaseController {
    public function index() {
        $db = db_connect();
        $model = new SeoModel($db);
        $data['seo'] = $model->getSeo();
        return view('admin/seo', $data);
    }

    public function ajax() {
        $db = db_connect();
        $model = new SeoModel($db);
        $act = $this->request->getVar('act');
        $page = $this->request->getVar('page');
        if($act === 'img_alt'):
            $result = $model->altImageCheck($page);
        elseif($act === 'keyphrase-in-subheading'):
            $result = $model->keyInSubheading($page);
        elseif($act === 'internal-link'):
            $result = $model->internalLink($page);
        elseif($act === 'outbond-link'):
            $result = $model->outbondLink($page);
        elseif($act === 'text-length'):
            $result = $model->textLength($page);
        elseif($act === 'keyphrase-density'):
            $result = $model->keyphraseDensity($page);
        elseif($act == 'img_alt_id'):
            $result = $model->altImageCheckWithId($page ,$this->request->getVar('id'));
        elseif($act === 'keyphrase-in-subheading-with-id'):
                $result = $model->keyInSubheadingWithId($page, $this->request->getVar('id'));
        elseif($act === 'internal-link-with-id'):
            $result = $model->internalLinkWithId($page, $this->request->getVar('id'));
        elseif($act === 'outbond-link-with-id'):
            $result = $model->outbondLinkWithId($page, $this->request->getVar('id'));
        endif;

        return $result;
    }
}