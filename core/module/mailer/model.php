<?php

class Mailer {
	private $param = array(
		'email' => '',
		'name' => '',
		'subject' => '',
		'message' => '',
		'from' => array(),
		'files' => array()
		);

	public function __construct($vars = array()) {
		if (is_array($vars)) {
			foreach ($vars as $j => $i) $this->param[$j] = $i;
		} else {
			$this->param['email'] = $vars;
		}
	}

	public function addFile($path, $name) {
		$this->param['files'][] = array('path' => $path, 'name' => $name);
	}

	public function sendTemplate($tpl_name, $tpl_vars = array()) {
		$tpl_file = preg_replace('/([\\/]+)/', '', $tpl_name);

		$tpl = new \Kernel\Template();
		$tpl->setVars($tpl_vars);

		$this->param['message'] = $tpl->parse('module/mailer/tpl/'.$tpl_file.'.php');

		$this->send();
	}

	public function send() {
		require_once('phpmailer/class.phpmailer.php');

		$mail = new PHPMailer();

		/*
		$mail->IsSMTP();
		$mail->SMTPDebug  = 0;
		$mail->Debugoutput = 'html';

		$mail->Host       = $config['mail']['host'];
		$mail->Port       = $config['mail']['port'];
		$mail->SMTPAuth   = true;
		$mail->Username   = $config['mail']['user'];
		$mail->Password   = $config['mail']['pass'];
		*/

		$mail->SetFrom('noreply@' . app()->config->param('domain'), app()->config->param('domain'));

		if (is_array($this->param['from'])) {
			$mail->AddReplyTo($this->param['from']['email'], $this->param['from']['name']);
		}
		elseif ($this->param['from']) {
			$mail->AddReplyTo($this->param['from'], $this->param['from']);
		}
		else {
			$mail->AddReplyTo('noreply@' . app()->config->param('domain'), app()->config->param('domain'));
		}

		$email = explode(',', $this->param['email']);
		foreach ($email as $e) {
			if (strlen(trim($e))) {
				$mail->AddAddress( $e );
			}
		}

		$mail->Subject = $this->param['subject'];
		$mail->MsgHTML($this->param['message']);

		foreach ($this->param['files'] as $j => $f) {
			$mail->AddAttachment($f['path'], $f['name']);
		}

		if ($mail->Send()) {
			return true;
			echo "Message sent!";
		} else {
			return false;
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
	}



}