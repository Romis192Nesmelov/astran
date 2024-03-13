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
                'name' => 'Смс',
                'pack' => 'Basic pack',
                'text' => '5GB Disk Space<br>15 Email Addresses<br>50 Subdomains<br>Advanced option',
                'price' => '270'
            ],
            [
                'name' => 'Минуты',
                'pack' => 'Basic pack',
                'text' => '5GB Disk Space<br>15 Email Addresses<br>50 Subdomains<br>Advanced option',
                'price' => '499'
            ],
            [
                'name' => 'Гб',
                'pack' => 'Basic pack',
                'text' => '5GB Disk Space<br>15 Email Addresses<br>50 Subdomains<br>Advanced option',
                'price' => '1000'
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
