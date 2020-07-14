<?php namespace App\Controllers;

use App\Models\SiteMapModel;
helper('filesystem');

class SiteMapController extends BaseController {
    protected $helpers = ['url'];

    public function index() {
        $db = db_connect();
        $model = new SiteMapModel($db);
        $sitemap = $model->getSiteMap();
        $blog = $model->getBlog();
        $jasa = $model->getJasa();
        $portfolio = $model->getPortfolio();
        $a = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
		$a .= '<urlset'."\n";
		$a .= 'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"'."\n";
		$a .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml"'."\n";
        $a .= 'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"'."\n";
		$a .= 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">	"'."\n";
        foreach($sitemap as $s):
        $a .= '<url>'."\n";
		   $a .= '<loc>'. base_url($s->sitemap_url) .'</loc>'."\n";
		   $a .= '<lastmod>'.date('d-m-Y H:i:s').'</lastmod>'."\n";
		   $a .= '<changefreq>daily</changefreq>'."\n";
		   $a .= '<priority>'.$s->sitemap_priority.'</priority>'."\n";
        $a .= '</url>'."\n";
        endforeach;
        foreach($blog as $b):
        $a .= '<url>'."\n";
		   $a .= '<loc>'. base_url($b->blog_slug) .'</loc>'."\n";
		   $a .= '<lastmod>'.date('d-m-Y H:i:s').'</lastmod>'."\n";
		   $a .= '<changefreq>daily</changefreq>'."\n";
		   $a .= '<priority>0.5</priority>'."\n";
        $a .= '</url>'."\n";
        endforeach;
        foreach($jasa as $j):
        $a .= '<url>'."\n";
		   $a .= '<loc>'. base_url($j->jasa_slug) .'</loc>'."\n";
		   $a .= '<lastmod>'.date('d-m-Y H:i:s').'</lastmod>'."\n";
		   $a .= '<changefreq>daily</changefreq>'."\n";
		   $a .= '<priority>1.0</priority>'."\n";
        $a .= '</url>'."\n";
        endforeach;
        foreach($portfolio as $p):
        $a .= '<url>'."\n";
		   $a .= '<loc>'. base_url('projects/'.$p->portfolio_slug) .'</loc>'."\n";
		   $a .= '<lastmod>'.date('d-m-Y H:i:s').'</lastmod>'."\n";
		   $a .= '<changefreq>daily</changefreq>'."\n";
		   $a .= '<priority>0.8</priority>'."\n";
        $a .= '</url>'."\n";
        endforeach;
		$a .= '</urlset>';
        header('Content-Type: application/xml');
        // unlink(FCPATH . 'sitemap.xml');
        if ( ! write_file('./sitemap.xml', $a))
        {
                echo 'Unable to write the file';
        }
        else
        {
            return redirect()->to('/sitemap.xml');
                echo 'File written!';
        }
    }

}