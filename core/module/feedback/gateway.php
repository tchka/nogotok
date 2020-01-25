<?php
namespace Feedback;

use Kernel\Template;

class Gateway extends \Kernel\Gateway {

	public function orderform() {

		if (strlen($_POST['params']['name']) == 0) {
			return $this->addError('Как вас зовут?');
		}

		/*if (strlen($_POST['params']['email']) == 0) {
			return $this->addError('Укажите ваш e-mail для связи.');
		}*/

		if (strlen($_POST['params']['phone']) == 0) {
			return $this->addError('Укажите ваш номер телефона для связи.');
		}

		$message = '<b>Благодарим за заявку.</b><br>';
		$message.= 'В ближайшее время наш менеджер свяжется с Вами.<br><br>';

		$message.= '<b>Ваша заявка</b><br />';
		$message.= '<b>Имя:</b> '.$_POST['params']['name'].'<br />';
		$message.= '<b>E-mail:</b> '.$_POST['params']['email'].'<br />';
		$message.= '<b>Телефон:</b> '.$_POST['params']['phone'].'<br />';
		// $message.= '<b>Бюджет:</b> '.$_POST['params']['price'].'<br />';
		$message.= '<b>Проект или идея:</b> '.$_POST['params']['text'].'<br />';

		$mailer = new \Mailer(array(
			'email' => app()->config->get('admin email'),
			'name' => 'Администратор',
			'subject' => 'Заявка с сайта '.app()->config->param('domain'),
			'message' => $message,
			));
		$mailer->send();

		if ($_POST['params']['email']) {
			$mailer = new \Mailer(array(
				'email' => $_POST['params']['email'],
				'name' => $_POST['params']['name'],
				'subject' => 'Заявка с сайта '.app()->config->param('domain'),
				'message' => $message,
				));
			$mailer->send();
		}

		$this->setVar('content', 'Заявка отправлена');
	}

	public function loadOrderForm() {
		$tpl = new Template;
		$this->setVar('content', $tpl->parse('../template/include/zakaz.php'));
	}

}
