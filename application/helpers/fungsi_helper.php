<?php 

function check_already_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('user_logged');
	if ($user_session) {
		redirect(site_url('overview'));
	}
}