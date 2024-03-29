<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $data;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set( 'Asia/Jakarta' );
		$this->load->helper('captcha');
	  $this->load->library('session');

		if( !empty($this->db->username) && !empty($this->db->hostname) && !empty($this->db->database) ){ }else{
			die('Database is not configured');
		}

		if(is_logged()){
			redirect('Dashboard','refresh');
		}

		$this->data = [
			'assets' => assets_url(),
			'body_classes'	=> setting('login_theme') == '1' ? 'login-page login-background' : 'login-page-side login-background'
		];

	}

	public function index()
	{
		$this->data['pemberitahuan'] = $this->Pemberitahuan_model->getDataLimit('DESC',1);
		// $configuration = array(
		// 			 'img_url' => base_url() . 'uploads/image_for_captcha/',
		// 			 'img_path' => 'image_for_captcha/',
		// 			 'img_height' => 60,
		// 			 'expiration' => 90,
		// 			 'img_width' => '200',
		// 			 'font_path' => './system/fonts/impact.ttf'
		// 	 );
		// 	 $captcha = create_captcha($configuration);
		// 	 $datamasuk = array(
		// 	 'captcha_time' => $captcha['time'] = isset($captcha['time']) ? $captcha['time'] : '',
		// 	 'ip_address' => $this->input->ip_address(),
		// 	 'word' => $captcha['word'] = isset($captcha['word']) ? $captcha['word'] : ''
		// 	 );
		// 	 $this->session->unset_userdata('valuecaptchaCode');
		// 	 $this->session->set_userdata('valuecaptchaCode', $captcha['word']??= 'default value') ;
		// 	 // $this->data['captchaImg'] = $captcha['image'];
		// 	 $this->data['captchaImg'] = $captcha['image'] ??= 'default value';

		$random_num    = md5(random_bytes(64));
		$captcha_code  = substr($random_num, 0, 6);

		 // $this->data['captchaImg'] = $captcha_text_color;
		 $this->data['captcha_code'] = $captcha_code;
		 $this->session->set_userdata('valuecaptchaCode', $captcha_code);
		 $this->load->view('account/login', $this->data, FALSE);
	}
	public function generateCaptcha()
	    {
				$random_num    = md5(random_bytes(64));
				$captcha_code  = substr($random_num, 0, 6);

				// // Assign captcha in session
				// // $this->session->set_userdata('CAPTCHA_CODE', $captcha_code);
				// $_SESSION['CAPTCHA_CODE'] = $captcha_code;
				//
				// Create captcha image
				$layer = imagecreatetruecolor(168, 37);
				$captcha_bg = imagecolorallocate($layer, 247, 174, 71);
				imagefill($layer, 0, 0, $captcha_bg);
				$captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
				imagestring($layer, 5, 55, 10, $captcha_code, $captcha_text_color);
				header("Content-type: image/jpeg");
				imagejpeg($layer);
			}
	public function refresh()
	    {
	        $config = array(
	            'img_url' => base_url() . 'uploads/image_for_captcha/',
	            'img_path' => 'image_for_captcha/',
	            'img_height' => 45,
	            'word_length' => 5,
	            'img_width' => '45',
	            'font_size' => 10
	        );
	        $captcha = create_captcha($config);
	        $this->session->unset_userdata('valuecaptchaCode');
	        $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
	        echo $captcha['image'];
	    }



	public function check()
	{
		
        $this->load->library('form_validation');
		$this->load->library('session');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|xss_clean|callback_validate_username');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|xss_clean');


        // $is_recaptcha_enabled = (setting('google_recaptcha_enabled') == '1');
				//
        // if($is_recaptcha_enabled)
        // 	$this->form_validation->set_rules('g-recaptcha-response', 'Google Recaptcha', 'callback_validate_recaptcha');
				//
        // if ($this->form_validation->run() == FALSE)
        // {
        //     $this->index();
        //     return;
        // }

				// $captchaUser = filter_var(post('captcha'), FILTER_SANITIZE_STRING);

			// 	if(empty(post('captcha'))) {
			// 		$this->session->set_flashdata('message', 'Please enter the captcha.');
			// 		$this->session->set_flashdata('message_type', 'danger');
      // }
      // else if($this->session->userdata('CAPTCHA_CODE') == $captchaUser){
        $username = post('username');
        $password = post('password');
		$captcha = post('captcha');

        $attempt = $this->users_model->attempt( compact('username', 'password') );

		if($this->session->userdata('valuecaptchaCode') != $captcha ){
		$attempt = 'invalid';
		$this->data['message'] = 'Invalid Captcha';
		$this->data['message_type'] = 'danger';
		}

        if( $attempt=='valid' ){

        	// If Allowed, then retreive user row and login the user
			   $user = $this->db->where( 'username', $username )->or_where( 'email', $username )->get( $this->users_model->table )->row();
        	$this->users_model->login( $user, post('remember_me') );

        }elseif( $attempt=='invalid_password' ){

        	// Show Message if invalid password

            $this->data['message'] = 'Invalid Password';
            $this->data['message_type'] = 'danger';

            $this->index();
            return;
        }elseif( $attempt=='invalid' ){

        	// Show Message if invalid password

            $this->data['message'] = 'Invalid Captcha';
            $this->data['message_type'] = 'danger';

            $this->index();
            return;
        }elseif( $attempt=='not_allowed' ){

        	// Show Message if invalid password

            $this->data['message'] = 'You are not allowed to Login ! Contact Admin';
            $this->data['message_type'] = 'danger';

            $this->index();
            return;
        }else{

        	// if invalid value or false returned by $attempt

            $this->data['message'] = 'Something Went Wrong !';
            $this->data['message_type'] = 'danger';

            $this->index();
            return;

        }
			// } else {
			// 	$this->session->set_flashdata('message', $captchaUser);
			// 	$this->session->set_flashdata('message_type', 'danger');
			// 	// $this->form_validation->set_message('validate_captcha', 'Captcha is invalid.');
			//
			// 	// $captchaError = array(
			// 	// 	"status" => "alert-danger",
			// 	// 	"message" => "Captcha is invalid."
			// 	// );
			// }

        redirect('/','refresh');

	}

	public function validate_recaptcha($recaptchaResponse)
	{

		$userIp=$this->input->ip_address();
        $secret = setting('google_recaptcha_secretkey');

        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $status= json_decode($output, true);

        if ($status['success']) {
			return true;
		}else{
			$this->form_validation->set_message('validate_recaptcha', 'Google Recaptcha not valid !');
			return false;
		}
	}

	public function validate_username($username)
	{
		$table = $this->users_model->table;
		$this->db->where('username', $username);
		$this->db->or_where('email', $username);

		$exists = $this->db->get($table)->num_rows();

		if($exists > 0){
			return true;
		}else{
			$this->form_validation->set_message('validate_username', 'Invalid Username/Email');
			return false;
		}
	}

	public function forget()
	{
		$this->load->view('account/forget', $this->data, FALSE);
	}

	public function reset_password()
	{

		postAllowed();

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|xss_clean|callback_validate_username');

		if($this->form_validation->run() == FALSE){
			$this->forget();
			return;
		}

		$reset = $this->users_model->resetPassword( [ 'username' => post('username') ] );

		$this->data['message']	=	'Reset Link Sent to <a href="#">'.obfuscate_email($reset).'</a> ! Please check your email';
		$this->data['message_type']	=	'info';

		if($reset==='invalid'){
			$this->data['message']	=	'Invalid Email/Username';
			$this->data['message_type']	=	'danger';
		}

		$this->forget();

	}

	public function new_password()
	{
		$reset_token = !empty(get('token')) ? get('token') : false;

		$user = $this->users_model->getByWhere(['reset_token' => $reset_token]);

		if(!$reset_token || !$user || empty($user)){
			echo 'Invalid Request';
			redirect('Login/forget', 'refresh'); return;
		}

		$user = $user[0];

		$this->data['user']	=	$user;

		$this->load->view('account/reset_password', $this->data, FALSE);

	}

	public function set_new_password()
	{

		postAllowed();

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required|matches[password]');

		if($this->form_validation->run() == FALSE){
			$this->data['user']	=	$this->users_model->getByWhere(['reset_token' => post('token')])[0];
			$this->load->view('account/reset_password', $this->data, FALSE);
			return;
		}

		$reset_token = post('token');

		$user	=	$this->users_model->getByWhere(compact('reset_token'))[0];

		$this->users_model->update($user->id, [
			'password'	=>	hash( "sha256", post('password') ),
			'reset_token'	=>	'',
		]);

		$this->session->set_flashdata('message', 'New Password has been Updated, You can login now');
		$this->session->set_flashdata('message_type', 'success');
		redirect('Login', 'refresh');

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Admin/Login.php */
