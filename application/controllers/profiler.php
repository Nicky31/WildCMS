<?php

class Profiler extends CI_Controller
{
	public function index()
	{
		// utilisation profiler
		$this->output->enable_profiler(true);
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */
