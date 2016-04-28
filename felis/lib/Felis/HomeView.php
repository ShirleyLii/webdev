<?php

/**
 * Created by PhpStorm.
 * User: shirley
 * Date: 3/15/16
 * Time: 7:41 PM
 */

namespace Felis;
require __DIR__ . "/../../vendor/autoload.php";

class HomeView extends View
{
    private $ary = array();

    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct()
    {
        $this->setTitle("Felis Investigations");
        $this->addLink("login.php", "Log in");
    }


    /**
     * Add content to the header
     * @return string Any additional comment to put in the header
     */
    protected function headerAdditional()
    {
        return <<<HTML
<p>Welcome to Felis Investigations!</p>
<p>Domestic, divorce, and carousing investigations conducted without publicity. People and cats shadowed
	and investigated by expert inspectors. Katnapped kittons located. Missing cats and witnesses located.
	Accidents, furniture damage, losses by theft, blackmail, and murder investigations.</p>
<p><a href="">Learn more</a></p>
HTML;
    }



    public function addTestimonial($discription, $name){
        $this->ary[] = array("discription"=> $discription, "name"=> $name);
    }


    public function testimonials() {
        $middle = (count($this->ary))/2;
        $index = 0;
        $html = <<<HTML
<section class="testimonials">
    <h2>TESTIMONIALS</h2>
    <div class="left">
HTML;
        foreach($this->ary as $item){
            if ($index == $middle){
                $html .= '</div><div class="right">';
            }
            $html .= '<blockquote><p>' . $item['discription'] . '</p><p><cite>' . $item['name'].'</cite></p></blockquote>';
            $index = $index+1;
        }
        $html .= '</div></section>';
                return $html;
    }


}