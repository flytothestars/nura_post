<?php

namespace App\Orchid\Screens\Filial;

use App\Models\Filial;
use App\Models\City;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;
use App\Orchid\Layouts\Filial\FilialListTable;

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
            'filial' => Filial::find(1),
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
            ModalToggle::make('Создать филиал')->modal('createFilial')->method('create'),
            ModalToggle::make('Редактирование филиал')->modal('editFilial')->method('edit')
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
            FilialListTable::class,
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
            ])->title('Создание филиала')->applyButton('Создать'),
            Layout::modal('editFilial', Layout::rows([
                Input::make('filial.address')
            ]))->async('asyncGetFilial')
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

    public function asyncGetFilial(Filial $filial)
    {
        return [
            'filial' => $filial
        ];
    }
}
