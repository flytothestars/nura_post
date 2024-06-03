<?php

namespace App\Orchid\Screens\Filial;

use App\Models\City;
use App\Models\Filial;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
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
            FilialListTable::class,
            Layout::modal('createFilial', [
                Layout::rows([
                    Input::make('address')->title('Адрес'),
                    Input::make('phone')->title('Телефон'),
                    Input::make('twogis_link')->placeholder('https://go.2gis.com/hy1ut')->title('Ссылка 2gis'),
                    Input::make('exchange_rates')->title('Цена за кг'),
                    Select::make('city_id')
                        ->fromModel(City::class, 'name', 'id')
                        ->title('Город')
                        ->empty('Выберите город'),
                ]),
                Layout::rows([
                    Group::make([
                        Input::make('start_time')
                            ->type('time')
                            ->title('от')
                            ->value('10:00')
                            ->placeholder('HH:MM')
                            ->horizontal(),
                        Input::make('end_time')
                            ->type('time')
                            ->title('до')
                            ->value('19:00')
                            ->placeholder('HH:MM')
                            ->horizontal(),
                    ]),
                ])->title('Время работы'),
            ])->title('Создание филиала')->applyButton('Создать'),
            Layout::modal(
                'editFilial',
                [
                    Layout::rows([
                        Input::make('filial.id')->type('hidden'),
                        Input::make('filial.address')->title('Адрес')->requred(),
                        Input::make('filial.phone')->title('Телефон'),
                        Input::make('filial.twogis_link')->placeholder('https://go.2gis.com/hy1ut')->title('Ссылка 2gis')->requred(),
                        Input::make('filial.exchange_rates')->title('Цена за кг'),
                        Select::make('filial.city_id')
                            ->fromModel(City::class, 'name', 'id')
                            ->title('Город')
                            ->empty('Выберите город'),
                    ]),
                    Layout::rows([
                        Group::make([
                            Input::make('filial.start_time')
                                ->type('time')
                                ->title('от')
                                ->value('10:00')
                                ->placeholder('HH:MM')
                                ->horizontal(),
                            Input::make('filial.end_time')
                                ->type('time')
                                ->title('до')
                                ->value('19:00')
                                ->placeholder('HH:MM')
                                ->horizontal(),
                        ]),
                    ])->title('Время работы'),
                ]
            )->async('asyncGetFilial')
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
        Filial::create([
            'address' => $request['address'],
            'phone' => $request['phone'],
            'twogis_link' => $request['twogis_link'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'exchange_rates' => $request['exchange_rates'],
            'city_id' => $request['city_id'],
        ]);
        Toast::info('Филиал успешно создан');
    }

    public function update(Request $request)
    {
        Filial::find($request->input('filial.id'))->update($request->filial);
        Toast::info('Филиал успешно обновлено');
    }

    public function delete(Filial $filial)
    {
        $filial->delete();
        Toast::info('Филиал успешно удалено');
    }
    public function asyncGetFilial(Filial $filial)
    {
        return [
            'filial' => $filial
        ];
    }
}
