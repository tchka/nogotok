<?php

/**

Accesst Token:
https://api.instagram.com/oauth/authorize/?client_id=CLIENT-ID&redirect_uri=URL&response_type=token&scope=basic+public_content

**/

namespace Instagram;

use Instagram as Model;
use Kernel\Template;
use Kernel\Image;

class Index {

	public static function Instashop() {
		$proc = new self();
		$proc->checkFeed();

		$tpl = new Template();
		$tpl->setVar('data', Model::make()->findAll(array('order' => '`id` desc', 'limit' => '0, 4')));

		return $tpl->parse('module/instagram/tpl/instashop.php');
	}

	public function checkFeed() {
		$last_update = app()->db->getVar('select `value` from `prefix_cache` where `id` like "instagram_last_update"');

		if (!$last_update or intval($last_update) + app()->config->param('instagram/timeout') < time()) {
			$this->updateFeed();
		}
	}

	private function updateFeed() {
		$json = file_get_contents( app()->config->param('instagram/api') );

		$result = json_decode( $json );

		if ($result->data and is_array($result->data) and count($result->data)) {
			$data = array_reverse($result->data);

			$insert = array();

			foreach ($data as $el) {
				$image = $el->images->standard_resolution->url;
				$thumb = md5($image);

				if ($image_source = file_get_contents($image)) {
					$image_info = pathinfo($image);

					list($ext, $tmp) = explode('?', $image_info['extension']);

					$image_filename = ROOT . Model::IMAGES_DIR . '/' . $thumb . '_source.' . $ext;

					file_put_contents($image_filename, $image_source);

					list($w, $h) = getimagesize($image_filename);

					$x = max($w, $h);
//                    $x = 180;

					$img = new Image();
					$img->CropCenterAndResize(
						$image_filename,
						ROOT . Model::IMAGES_DIR . '/' . $thumb . '.' . $ext,
						$x, $x
					);

					$insert[] = '("' . $el->id . '", "' . htmlspecialchars($el->link) . '", "' . htmlspecialchars($image) . '", "' . $thumb . '.' . $ext . '", "' . addslashes($el->caption->text) . '")';
				}

			}

			app()->db->query('insert ignore into `prefix_instagram` (`instagram`, `url`, `image`, `thumb`, `text`) values ' . implode(', ', $insert));
		}

		app()->db->query('insert into `prefix_cache` (`id`, `value`) values ("instagram_last_update", "' . time() . '") on duplicate key update `value` = "' . time() . '"');
	}

}