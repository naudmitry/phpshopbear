<?php
	class SiteController {
		public function actionIndex() {
			$latestProducts = array();
			$latestProducts = Product::getLatestProducts(6);

			$news = array();
			$news = News::getNewsList();

			require_once(ROOT.'/views/site/index.php');

			return true;
		}
	}
?>