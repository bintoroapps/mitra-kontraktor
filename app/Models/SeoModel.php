<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

use function PHPSTORM_META\type;

class SeoModel {
    protected $db;
    protected $base_url = 'https://arsitek.wangerofficial.com/';

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function getSeo() {
        $seo = $this->db->table('seo');
        return $seo->get()->getFirstRow();
    }

    public function keyphraseCheck($page) {
        $keyphrase = [];

        // home page
        $home = $this->db->table('home_page');
        $home_keyphrase = strtolower($home->get()->getFirstRow()->home_page_keyphrase);
        
        // push home kepyhrase to keyprahse array if page that checked is not home page
        if($page !== 'home'):
            $keyphrase[] = $home_keyphrase;
        endif;

        
        // about page
        $about = $this->db->table('about_page');
        $about_keyphrase = strtolower($about->get()->getFirstRow()->keyphrase);

        // push about keyphrase to keyphrase array if page that checked is not about page
        if($page !== 'about'):
            $keyphrase[] = $about_keyphrase;
        endif;

         // faq page
         $faq = $this->db->table('faq_page');
         $faq_keyphrase = strtolower($faq->get()->getFirstRow()->keyphrase);
 
         // push about keyphrase to keyphrase array if page that checked is not faq page
         if($page !== 'faq'):
             $keyphrase[] = $faq_keyphrase;
         endif;

         // other service detail page
         $other_service_detail = $this->db->table('service_detail_page');
         $other_service_detail_keyphrase = $other_service_detail->get()->getResult();
         
         if(!empty($other_service_detail_keyphrase)) {
             foreach($other_service_detail_keyphrase as $ot) {
                 if($ot->keyphrase) {
                     $keyphrase[] = $ot->keyphrase;
                 }
             }
         }

        // check if keyphrase is include inside the array, to check if there some duplicate keyphrase
        if($page === 'home'):
            $result = in_array($home_keyphrase, $keyphrase);
        elseif($page === 'about'):
            $result = in_array($about_keyphrase, $keyphrase);
        elseif($page === 'faq'):
            $result = in_array($faq_keyphrase, $keyphrase);
        endif;

        // send response as boolean
        return $result;
    }

    public function kepyhraseCheckWithId($page, $id) {
        $keyphrase = [];

         // service detail page
         $service_detail = $this->db->table('service_detail_page');
         $service_detail->where('service_detail_page_id', $id);
         $service_detail_keyphrase = strtolower($service_detail->get()->getFirstRow()->keyphrase);

         // other service detail page
         $other_service_detail = $this->db->table('service_detail_page');
         $other_service_detail->where('service_detail_page_id !=', $id);
         $other_service_detail_keyphrase = $other_service_detail->get()->getResult();
         
         if(!empty($other_service_detail_keyphrase)) {
             foreach($other_service_detail_keyphrase as $ot) {
                 if($ot->keyphrase) {
                     $keyphrase[] = $ot->keyphrase;
                 }
             }
         }

        // home page
        $home = $this->db->table('home_page');
        $home_keyphrase = strtolower($home->get()->getFirstRow()->home_page_keyphrase);
        $keyphrase[] = $home_keyphrase;

        
        // about page
        $about = $this->db->table('about_page');
        $about_keyphrase = strtolower($about->get()->getFirstRow()->keyphrase);
        $keyphrase[] = $about_keyphrase;

         // faq page
         $faq = $this->db->table('faq_page');
         $faq_keyphrase = strtolower($faq->get()->getFirstRow()->keyphrase);
         $keyphrase[] = $faq_keyphrase;

        $result = in_array($service_detail_keyphrase, $keyphrase);

        // send response as boolean
        return $result;
    }

    public function keyphraseCheckAjax($page, $keyphr) {
        $keyphrase = [];
        
        if($page !== 'home'):
             // home page
            $home = $this->db->table('home_page');
            $home_keyphrase = strtolower($home->get()->getFirstRow()->home_page_keyphrase);
            // push home kepyhrase to keyprahse array if page that checked is not home page
            $keyphrase[] = $home_keyphrase;
        endif;

        if($page !== 'about'):
            // about page
            $about = $this->db->table('about_page');
            $about_keyphrase = strtolower($about->get()->getFirstRow()->keyphrase);
            // push about keyphrase to keyphrase array if page that checked is not about page
            $keyphrase[] = $about_keyphrase;
        endif;

        if($page !== 'faq'):
            // faq page
            $faq = $this->db->table('faq_page');
            $faq_keyphrase = strtolower($faq->get()->getFirstRow()->keyphrase);
            // push about keyphrase to keyphrase array if page that checked is not faq page
            $keyphrase[] = $faq_keyphrase;
        endif;

        $result = in_array($keyphr, $keyphrase);

        // send response as boolean
        return $result;
    }

    public function altImageCheck($page) {
        $score = 0;
        $total = 0;
        if($page === 'home'):
            $home = $this->db->table('home_page');
            $h = $home->get()->getFirstRow();
            if($h->home_page_2_image_1_alt):
                $score++;
            endif;
            $total++;
            if($h->home_page_2_image_2_alt):
                $score++;
            endif;
            $total++;
            if($h->home_page_9_image_1_alt):
                $score++;
            endif;
            $total++;

            // check total jasa
            $jasa = $this->db->table('jasa');
            $total +=  $jasa->countAll();

            // check alt jasa that not null
            $jasa_alt = $this->db->table('jasa');
            $jasa_alt->where('jasa_img_alt !=', NULL);
            $score += $jasa_alt->countAllResults();

            // check total portfolio
            $portfolio = $this->db->table('portfolio');
            $total += $portfolio->countAll();

            // check alt portfolio that not null
            $portfolio_alt = $this->db->table('portfolio');
            $portfolio_alt->where('portfolio_main_image_alt !=', NULL);
            $score += $portfolio_alt->countAllResults();

            // check total team
            $team = $this->db->table('team');
            $team->where('team_display_position !=', NULL);
            $total += $team->countAllResults();

            // check alt team that not null
            $team_alt = $this->db->table('team');
            $team_alt->where('team_display_position !=', NULL);
            $team_alt->where('team_image_alt !=', NULL);
            $score += $team_alt->countAllResults();

            // check total testimonial
            $testimonial = $this->db->table('portfolio');
            $testimonial->where('portfolio_testimonial !=', NULL);
            $total += $testimonial->countAllResults();

            // check alt testimonial
            $testimonial_alt = $this->db->table('portfolio');
            $testimonial_alt->where('portfolio_testimonial !=', NULL);
            $testimonial_alt->where('portfolio_client_photo_alt !=', NULL);
            $score += $testimonial_alt->countAllResults();

            // check total blog
            $blog = $this->db->table('blog');
            $blog->where('blog_post !=', NULL);
            $blog->limit(3);
            $blog->orderBy('blog_post', 'DESC');
            $range = 0;
            foreach($blog->get()->getResult() as $b) {
                $total++;
                $range++;
                if($range == 3) {
                    break;
                }
            }

            // check total blog
            $blog_alt = $this->db->table('blog');
            $blog_alt->where('blog_post !=', NULL);
            $blog_alt->where('blog_image_alt !=', NULL);
            $blog_alt->limit(3);
            $blog_alt->orderBy('blog_post', 'DESC');
            $range = 0;
            foreach($blog_alt->get()->getResult() as $b) {
                $score++;
                $range++;
                if($range == 3) {
                    break;
                }
            }

            // check total client logo
            $logo = $this->db->table('portfolio');
            $logo->where('portfolio_client_logo !=', NULL);
            $total += $logo->countAllResults();

            // check alt client logo
            $logo_alt = $this->db->table('portfolio');
            $logo_alt->where('portfolio_client_logo !=', NULL);
            $logo_alt->where('portfolio_client_logo_alt !=', NULL);
            $total += $logo_alt->countAllResults();

            $final_score  = ($score/$total) * 100;

            if(($final_score > 30) and ($final_score < 70)):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'about'):
            $about = $this->db->table('about_page');
            $a = $about->get()->getFirstRow();
            if($a->about_page_2_img_1_alt):
                $score++;
            endif;
            $total++;

            if($a->about_page_2_img_2_alt):
                $score++;
            endif;
            $total++;

            // check total testimonial
            $testimonial = $this->db->table('portfolio');
            $testimonial->where('portfolio_testimonial !=', NULL);
            $total += $testimonial->countAllResults();

            // check alt testimonial
            $testimonial_alt = $this->db->table('portfolio');
            $testimonial_alt->where('portfolio_testimonial !=', NULL);
            $testimonial_alt->where('portfolio_client_photo_alt !=', NULL);
            $score += $testimonial_alt->countAllResults();

            // check total team
            $team = $this->db->table('team');
            $team->where('team_display_position !=', NULL);
            $total += $team->countAllResults();

            // check alt team that not null
            $team_alt = $this->db->table('team');
            $team_alt->where('team_display_position !=', NULL);
            $team_alt->where('team_image_alt !=', NULL);
            $score += $team_alt->countAllResults();

            $final_score  = ($score/$total) * 100;

            if(($final_score > 30) and ($final_score < 70)):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'faq'):
            $faq = $this->db->table('faq_page');
            $f = $faq->get()->getFirstRow();
            if($f->faq_page_2_img_1_alt):
                $score++;
            endif;
            $total++;

            $final_score  = ($score/$total) * 100;

            if(($final_score > 30) and ($final_score < 70)):
                return 'green';
            else:
                return 'red';
            endif;
        endif;
    }

    public function altImageCheckWithId($page, $id) { 
        $score = 0;
        $total = 0;

        $service_detail = $this->db->table('service_detail_page');
        $service_detail->where('service_detail_page_id', $id);
        $s = $service_detail->get()->getFirstRow();
        if($s->service_detail_page_13_img_1_alt):
            $score++;
        endif;
        $total++;

        $jasa = $this->db->table('jasa');
        $jasa_img = $jasa->get()->getResult();
        foreach($jasa_img as $j) {
            if($j->jasa_img_alt) {
                $score++;
            }
            $total++;
        }

        $portfolio = $this->db->table('portfolio');
        $portfolio_img = $portfolio->get()->getResult();
        foreach($portfolio_img as $p) {
            if($p->portfolio_main_image_alt) {
                $score++;
            }
            $total++;
        }

        $final_score  = ($score/$total) * 100;

        if(($final_score > 30) and ($final_score < 70)):
            return 'green';
        else:
            return 'red';
        endif;
    }

    public function keyInSubheading($page) {
        $key = 0;
        if($page === 'home'):
            $home = $this->db->table('home_page');
            $home_data = $home->get()->getFirstRow();

            if(strpos(strtolower($home_data->home_page_2_big_title), strtolower($home_data->home_page_keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($home_data->home_page_2_small_title), strtolower($home_data->home_page_keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($home_data->home_page_3_small_title), strtolower($home_data->home_page_keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($home_data->home_page_5_small_title), strtolower($home_data->home_page_keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($home_data->home_page_6_big_title), strtolower($home_data->home_page_keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($home_data->home_page_7_small_title), strtolower($home_data->home_page_keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($home_data->home_page_8_small_title), strtolower($home_data->home_page_keyphrase)) !== false):
                $key++;
            endif;

            $header = $this->db->table('home_page_header');
            foreach($header->get()->getResult() as $r) {
                if(strpos(strtolower($r->home_page_header_big_title), strtolower($home_data->home_page_keyphrase)) !== false):
                    $key++;
                endif;
            }

            if($key > 0) {
                return 'green';
            } else {
                return 'red';
            }
        elseif($page === 'about'):
            $about = $this->db->table('about_page');
            $about_data = $about->get()->getFirstRow();

            if(strpos(strtolower($about_data->about_page_2_big_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_2_small_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_3_pros_1_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_3_pros_2_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_3_pros_3_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_4_small_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_6_small_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_7_small_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_8_big_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($about_data->about_page_9_med_title), strtolower($about_data->keyphrase)) !== false):
                $key++;
            endif;

            if($key > 0) {
                return 'green';
            } else {
                return 'red';
            }
        elseif($page === 'faq'):
            $faq = $this->db->table('faq_page')->get()->getFirstRow();
            $keyphrase = $faq->keyphrase;

            if(strpos(strtolower($faq->faq_page_2_small_title), strtolower($keyphrase)) !== false):
                $key++;
            endif;
            if(strpos(strtolower($faq->faq_page_3_small_title), strtolower($keyphrase)) !== false):
                $key++;
            endif;

            if($key > 0) {
                return 'green';
            } else {
                return 'red';
            }
        endif;
    }

    public function keyInSubheadingWithId($page, $id) {
        $key = 0;
        $service_detail = $this->db->table('service_detail_page');
        $service_detail->where('service_detail_page_id', $id);
        $keyphrase = $service_detail->get()->getFirstRow()->keyphrase;

        if(strpos(strtolower($service_detail->service_detail_page_2_big_title), strtolower($keyphrase)) !== false):
            $key++;
        endif;
        if(strpos(strtolower($service_detail->service_detail_page_3_small_title), strtolower($keyphrase)) !== false):
            $key++;
        endif;
        if(strpos(strtolower($service_detail->service_detail_page_4_small_title), strtolower($keyphrase)) !== false):
            $key++;
        endif;
        if(strpos(strtolower($service_detail->service_detail_page_5_small_title), strtolower($keyphrase)) !== false):
            $key++;
        endif;
        if(strpos(strtolower($service_detail->service_detail_page_13_small_title), strtolower($keyphrase)) !== false):
            $key++;
        endif;

        if($key > 0) {
            return 'green';
        } else {
            return 'red';
        }
    }

    public function internalLink($page) {
        $total = 0;
        if($page === 'home'):
            $button = $this->db->table('home_page');
            $button_link = $button->get()->getFirstRow()->home_page_2_button_link;
            if(filter_var($button_link, FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var($button_link, FILTER_VALIDATE_URL), 'internal')):
                    $total++;
                endif;
            endif;

            $portfolio = $this->db->table('portfolio');
            $total += $portfolio->countAll();

            $jasa = $this->db->table('jasa');
            $total += $jasa->countAll();

            $blog = $this->db->table('blog')->where('blog_status_post')->countAll();
            $total += $blog;

            if($total > 0):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'about'):
            $button = $this->db->table('about_page');

            $button_link_1 = $button->get()->getFirstRow()->about_page_1_bread_link;
            if(filter_var($button_link_1, FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var($button_link_1, FILTER_VALIDATE_URL), 'internal')):
                    $total++;
                endif;
            endif;

            $button_link_2 = $button->get()->getFirstRow()->about_page_2_btn_link;
            if(filter_var($button_link_2, FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var($button_link_2, FILTER_VALIDATE_URL), 'internal')):
                    $total++;
                endif;
            endif;

            $team = $this->db->table('team');
            $team->where('team_display_position !=', NULL);
            $total += $team->countAllResults();

            if($total > 0):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'faq'):
            $faq = $this->db->table('faq_page');

            $link_1 = $faq->get()->getFirstRow()->faq_page_1_bread_link;
            if(filter_var($link_1, FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var($link_1, FILTER_VALIDATE_URL), 'internal')):
                    $total++;
                endif;
            endif;

            if($total > 0):
                return 'green';
            else:
                return 'red';
            endif;

        endif;
    }

    public function internalLinkWithId($page, $id) {
        $total = 0;

        $service_detail = $this->db->table('service_detail_page');
        $service_detail->where('service_detail_page_id', $id);

        $link_1 = $service_detail->get()->getFirstRow()->service_detail_page_1_bread_link;
        if(filter_var($link_1, FILTER_VALIDATE_URL)):
            if($this->_checkRootDomain(filter_var($link_1, FILTER_VALIDATE_URL), 'internal')):
                $total++;
            endif;
        endif;

        $link_2 = $service_detail->get()->getFirstRow()->service_detail_page_2_btn_2_link;
        if(filter_var($link_2, FILTER_VALIDATE_URL)):
            if($this->_checkRootDomain(filter_var($link_2, FILTER_VALIDATE_URL), 'internal')):
                $total++;
            endif;
        endif;

        $link_3 = $service_detail->get()->getFirstRow()->service_detail_page_2_btn_3_link;
        if(filter_var($link_3, FILTER_VALIDATE_URL)):
            if($this->_checkRootDomain(filter_var($link_3, FILTER_VALIDATE_URL), 'internal')):
                $total++;
            endif;
        endif;

        $portfolio = $this->db->table('portfolio');
        $port = $portfolio->get()->getResult();
        if(!empty($port)) {
            foreach($port as $p) {
                $total++;
            }
        }

        $jasa = $this->db->table('jasa');
        $jas = $jasa->get()->getResult();
        if(!empty($jas)) {
            foreach($jas as $j) {
                $total++;
            }
        }

        if($total > 0):
            return 'green';
        else:
            return 'red';
        endif;

    }

    public function outbondLink($page) {
        $total = 0;
        if($page === 'home'):
            $home = $this->db->table('home_page');
            $button_link = $home->get()->getFirstRow()->home_page_2_button_link;
            if(filter_var($button_link, FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var($button_link, FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;

            $desc_1 = $home->get()->getFirstRow()->home_page_2_desc;
            if($this->string_between_two_string($desc_1 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_1 . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_1 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_7 = $home->get()->getFirstRow()->home_page_7_desc;
            if($this->string_between_two_string($desc_7 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_1 . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_7 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $team = $this->db->table('team');
            $team->where('team_display_position !=', NULL);
            foreach($team->get()->getResult() as $t) {
                $t->team_facebook ? $total++ : $total += 0;
                $t->team_twitter ? $total++ : $total += 0;
                $t->team_google_plus ? $total++ : $total += 0;
                $t->team_instagram ? $total++ : $total += 0;
                $t->team_whatsapp ? $total++ : $total += 0;
            }

            if($total > 0):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'about'):
            $about = $this->db->table('about_page');

            $desc_1 = $about->get()->getFirstRow()->about_page_2_desc;
            if($this->string_between_two_string($desc_1 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_1 . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_1 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_2 = $about->get()->getFirstRow()->about_page_3_pros_1_desc;
            if($this->string_between_two_string($desc_2 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_2 . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_2 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_3 = $about->get()->getFirstRow()->about_page_3_pros_2_desc;
            if($this->string_between_two_string($desc_3 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_3 . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_3 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_4 = $about->get()->getFirstRow()->about_page_3_pros_3_desc;
            if($this->string_between_two_string($desc_4 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_4  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_4 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_5 = $about->get()->getFirstRow()->about_page_6_desc_1;
            if($this->string_between_two_string($desc_5 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_5  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_5 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_6 = $about->get()->getFirstRow()->about_page_6_desc_2;
            if($this->string_between_two_string($desc_6 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_6  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_6 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_7 = $about->get()->getFirstRow()->about_page_6_desc_3;
            if($this->string_between_two_string($desc_7 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_7  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_7 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_8 = $about->get()->getFirstRow()->about_page_6_desc_4;
            if($this->string_between_two_string($desc_8 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_8  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_8 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_9 = $about->get()->getFirstRow()->about_page_8_desc;
            if($this->string_between_two_string($desc_9 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_9  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_9 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $desc_10 = $about->get()->getFirstRow()->about_page_9_desc;
            if($this->string_between_two_string($desc_10 . ' ', 'http', ' ')):
                if(filter_var('http' . $this->string_between_two_string($desc_10  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                    if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($desc_10 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                        $total++;
                    endif;
                endif;
            endif;

            $team = $this->db->table('team');
            $team->where('team_display_position !=', NULL);
            foreach($team->get()->getResult() as $t) {
                $t->team_facebook ? $total++ : $total += 0;
                $t->team_twitter ? $total++ : $total += 0;
                $t->team_google_plus ? $total++ : $total += 0;
                $t->team_instagram ? $total++ : $total += 0;
                $t->team_whatsapp ? $total++ : $total += 0;
            }

            if($total > 0):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'faq'):
            $faq = $this->db->table('faq')->get()->getResult();

            foreach($faq as $f) {
                if($this->string_between_two_string($f->faq_answer . ' ', 'http', ' ')):
                    if(filter_var('http' . $this->string_between_two_string($f->faq_answer  . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                        if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($f->faq_answer . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                            $total++;
                        endif;
                    endif;
                endif;
            }

            if($total > 0):
                return 'green';
            else:
                return 'red';
            endif;

        endif;
    }

    public function outbondLinkWithId($page, $id) {
        $total = 0;

        $service_detail = $this->db->table('faq');
        $service_detail->where('service_detail_page_id', $id);
        $ser = $service_detail->get()->getFirstRow();
        
        if($this->string_between_two_string($ser->service_detail_page_2_btn_1_link . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_2_btn_1_link . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_2_btn_1_link . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;
        
        if($this->string_between_two_string($ser->service_detail_page_5_desc . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_5_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_5_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($this->string_between_two_string($ser->service_detail_page_6_desc . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_6_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_6_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($this->string_between_two_string($ser->service_detail_page_8_desc . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_8_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_8_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($this->string_between_two_string($ser->service_detail_page_10_pros_1_desc . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_10_pros_1_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_10_pros_1_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($this->string_between_two_string($ser->service_detail_page_10_pros_2_desc . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_10_pros_2_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_10_pros_2_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($this->string_between_two_string($ser->service_detail_page_10_pros_3_desc . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_10_pros_3_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_10_pros_3_desc . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($this->string_between_two_string($ser->service_detail_page_11_desc_1 . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_11_desc_1 . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_11_desc_1 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($this->string_between_two_string($ser->service_detail_page_11_desc_2 . ' ', 'http', ' ')):
            if(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_11_desc_2 . ' ', 'http', ' '), FILTER_VALIDATE_URL)):
                if($this->_checkRootDomain(filter_var('http' . $this->string_between_two_string($ser->service_detail_page_11_desc_2 . ' ', 'http', ' '), FILTER_VALIDATE_URL), 'outbond')):
                    $total++;
                endif;
            endif;
        endif;

        if($total > 0):
            return 'green';
        else:
            return 'red';
        endif;
    }

    public function textLength($page) {
        if($page === 'home'):
            $ch = curl_init($this->base_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            $result = curl_exec($ch);

            $trim_content = $this->string_between_two_string($result, '<body>', '</body>');
            $total = str_word_count(strip_tags(preg_replace('!\s+!', ' ', $trim_content)));

            if($total >= 900):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'about'):
            $ch = curl_init($this->base_url . 'about-us');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            $result = curl_exec($ch);

            $trim_content = $this->string_between_two_string($result, '<body>', '</body>');
            $total = str_word_count(strip_tags(preg_replace('!\s+!', ' ', $trim_content)));

            if($total >= 900):
                return 'green';
            else:
                return 'red';
            endif;
         elseif($page === 'faq'):
            $ch = curl_init($this->base_url . 'faq');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            $result = curl_exec($ch);

            $trim_content = $this->string_between_two_string($result, '<body>', '</body>');
            $total = str_word_count(strip_tags(preg_replace('!\s+!', ' ', $trim_content)));

            if($total >= 900):
                return 'green';
            else:
                return 'red';
            endif;
        endif;
    }

    public function keyphraseDensity($page) {
        if($page === 'home'):
            $keyphrase = $this->db->table('home_page');

            $ch = curl_init($this->base_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            $result = curl_exec($ch);

            $trim_content = $this->string_between_two_string($result, '<body>', '</body>');
            $total = str_word_count(strip_tags(preg_replace('!\s+!', ' ', $trim_content)));
            $keyphrase_count = substr_count(strip_tags(strtolower(preg_replace('!\s+!', ' ', $trim_content))), strtolower($keyphrase->get()->getFirstRow()->home_page_keyphrase));

            $persen = ($keyphrase_count/$total) * 100;

            if(($persen >= 0.5) && ($persen <= 3)):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'about'):
            $keyphrase = $this->db->table('about_page');

            $ch = curl_init($this->base_url . 'about-us');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            $result = curl_exec($ch);

            $trim_content = $this->string_between_two_string($result, '<body>', '</body>');
            $total = str_word_count(strip_tags(preg_replace('!\s+!', ' ', $trim_content)));
            $keyphrase_count = substr_count(strip_tags(strtolower(preg_replace('!\s+!', ' ', $trim_content))), strtolower($keyphrase->get()->getFirstRow()->keyphrase));

            $persen = ($keyphrase_count/$total) * 100;

            if(($persen >= 0.5) && ($persen <= 3)):
                return 'green';
            else:
                return 'red';
            endif;
        elseif($page === 'faq'):
            $keyphrase = $this->db->table('faq_page');

            $ch = curl_init($this->base_url . 'faq');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            $result = curl_exec($ch);

            $trim_content = $this->string_between_two_string($result, '<body>', '</body>');
            $total = str_word_count(strip_tags(preg_replace('!\s+!', ' ', $trim_content)));
            $keyphrase_count = substr_count(strip_tags(strtolower(preg_replace('!\s+!', ' ', $trim_content))), strtolower($keyphrase->get()->getFirstRow()->keyphrase));

            $persen = ($keyphrase_count/$total) * 100;

            if(($persen >= 0.5) && ($persen <= 3)):
                return 'green';
            else:
                return 'red';
            endif;
        endif;
    }

    private function string_between_two_string($str, $starting_word, $ending_word) 
    { 
        $subtring_start = strpos($str, $starting_word); 
        //Adding the strating index of the strating word to  
        //its length would give its ending index 
        $subtring_start += strlen($starting_word);   
        //Length of our required sub string 
        $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
        // Return the substring from the index substring_start of length size  
        return substr($str, $subtring_start, $size);   
    }

    private function _checkRootDomain($url, $type) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }

        $main_domain = implode('.', array_slice(explode('.', parse_url(base_url(), PHP_URL_HOST)), -2));
        $domain = implode('.', array_slice(explode('.', parse_url($url, PHP_URL_HOST)), -2));
        if ($domain == $main_domain) {
            return $type === 'internal' ? True : False;
        } else {
            return $type === 'internal' ? False : True;
        }
    }

}