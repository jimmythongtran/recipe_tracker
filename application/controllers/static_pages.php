<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Static_pages extends CI_Controller {

  public function home()
  {
    $this->template->set('active_page', 'home');
    $this->template->set('title', 'Home');
    $this->template->load('template', 'static_pages/home');
  }

  public function about()
  {
    $this->template->set('active_page', 'about');
    $this->template->set('title', 'About');
    $this->template->load('template', 'static_pages/about');
  }

  public function contact()
  {
    $this->template->set('active_page', 'contact');
    $this->template->set('title', 'Contact');
    $this->template->load('template', 'static_pages/contact');
  }
}
