<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

class BaseController extends Controller
{
    protected array $data = [];

    public function __invoke() :View
    {
        $this->data['tariffs'] = [
            [
                'name' => 'Тариф 1',
                'text' => '100 минут<br>10 Гб<br>100 смс',
                'price' => '99,00'
            ],
            [
                'name' => 'Тариф 2',
                'text' => '250 минут<br>25 Гб<br>250 смс',
                'price' => '399,00'
            ],
            [
                'name' => 'Тариф 3',
                'text' => '0 минут<br>40 Гб<br>500 смс',
                'price' => '450,00'
            ],
            [
                'name' => 'Тариф 4',
                'text' => '0 минут<br>0 Гб<br>0 смс',
                'price' => '0'
            ],
        ];
        return $this->showView('home');
    }

    protected function showView($view) :View
    {
        return view($view, array_merge(
            $this->data,
            [
                'mainMenu' => [
                    ['key' => 'about_us', 'name' => 'О компании'],
                    ['key' => 'tariffs', 'name' => 'Тарифы'],
                    ['key' => 'contacts', 'name' => 'Контакты']
                ],
            ]
        ));
    }
}
