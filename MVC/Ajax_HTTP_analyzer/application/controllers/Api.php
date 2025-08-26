<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api  extends CI_Controller {
	/**
	 * index for part1 analyzer
	 */
	public function index_part1(){
		$this->load->view('index-part1');
	}
	/**
	 * index for part2 analyzer
	 */
	public function index_part2(){
		$this->load->view('index-part2');
	}
	/**
	 * index for part3 analyzer
	 */
	public function index_part3(){
		$this->load->view('index-part3');
	}

	/**
	 * index for part2/3 analyzer json
	 */
	public function http_analyzer($html=null){
		if ($html == 'html'){
			require('application/libraries/simple_form_dom.php');
			$html = file_get_html($this->input->post('url'));
			$HTML_tags = array();
			$all_html = '';
			foreach($html->find('*') as $element) {
					if (array_key_exists($element->tag, $HTML_tags)) {
						$HTML_tags[$element->tag] ++;
					}else{
						$HTML_tags[$element->tag] = 1;
					}
					$all_html = $all_html . $element;
			}
			$tags['tags'] = $HTML_tags;
			$tags['all_html'] =  $all_html;
			$this->load->view("partials/search_result", $tags);
			// $this->load->view("index", $tags);
		}else{
			require('application/libraries/simple_form_dom.php');
			$html = file_get_html($this->input->post('url'));
			$HTML_tags = array();
			$all_html = '';
			foreach($html->find('*') as $element) {
				if (array_key_exists($element->tag, $HTML_tags)) {
					$HTML_tags[$element->tag] ++;
				}else{
					$HTML_tags[$element->tag] = 1;
				}
				$all_html = $all_html . $element;
			}
			$tags['tags'] = $HTML_tags;
			$tags['all_html'] =  $all_html;
			echo(json_encode($tags));
		}
	}
	public function try_html_part1(){
		$this->load->view('try_part1/welcome_message');
	}

}		


