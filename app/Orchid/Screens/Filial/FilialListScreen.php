<?php

namespace App\Orchid\Screens\Filial;

use App\Models\Filial;
use App\Models\City;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class FilialListScreen extends Screen
{

    public $name = 'Филиалы';

    public $description = 'Список всех филиалов';

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'filials' => Filial::all()
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Создать филиал')->modal('createFilial')->method('create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('filials', [
                TD::make('address', 'Адрес'),
                TD::make('phone', 'Телефон'),
                TD::make('twogis_link', 'Ссылка 2gis'),
                TD::make('work_time', 'Время работы'),
                TD::make('exchange_rates', 'Цена за кг'),
            ]),
            Layout::modal('createFilial', [
                Layout::rows([
                    Input::make('filial.address')->title('Адрес'),
                    Input::make('filial.phone')->title('Телефон'),
                    Input::make('filial.twogis_link')->title('Ссылка 2gis'),
                    Input::make('filial.work_time')->title('Время работы'),
                    Input::make('filial.exchange_rates')->title('Цена за кг'),
                    Select::make('filial.city_id')
                        ->fromModel(City::class, 'name', 'id')
                        ->title('Город')
                        ->empty('Выберите город'),
                ]),
            ])->title('Создание филиала')->applyButton('Создать')
        ];
    }

    /**
     * Handle create filial action.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request): void
    {
        $data = $request->get('filial');

        // Сохранение нового филиала
        Filial::create([
            'address' => $data['address'],
            'phone' => $data['phone'],
            'twogis_link' => $data['twogis_link'],
            'work_time' => $data['work_time'],
            'exchange_rates' => $data['exchange_rates'],
            'city_id' => $data['city_id'],
        ]);
        Toast::info('Филиал успешно создан');
    }
}
