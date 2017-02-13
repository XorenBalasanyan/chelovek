<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $api = array('chlvk' => '26471151'); // id счетчика метрики
		foreach ($api as $siteid => $m_id)
		{
			// как сгенерировать токен посмотри в мануалах яндекса. Там его один раз генерируешь и потом юзаешь здесь.

			/* Яндекс метрика
			ID: 885015ed37f1499c947a6a5378d872ae
			Пароль: a3cdb7b185c04728ab39a1e972d0f822
			Callback URL: https://oauth.yandex.ru/verification_code
			Oauth_token: d37c71ef1a71459cbd6e8100c7f2e0c8
			Яндекс метрика */

			$medata = file_get_contents('http://api-metrika.yandex.ru/stat/traffic/summary.json?id='.$m_id.'&oauth_token=d37c71ef1a71459cbd6e8100c7f2e0c8');

			$medata = json_decode($medata, TRUE);
			foreach (array_reverse($medata['data']) as $day)
			{
				$tmpdate = strtotime($day['date']);
				$s[$siteid]['labels'][] = date('d.m', $tmpdate);
				$s[$siteid]['visits'][] = $day['visits'];
				$s[$siteid]['new_visitors'][] = $day['new_visitors'];
				$s[$siteid]['visitors'][] = $day['visitors'];
			}
		}

        return $this->render('index', ['s' => $s]);
    }
}
