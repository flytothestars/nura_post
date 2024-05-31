<?php

namespace App\Orchid\Screens\Setting;

use App\Orchid\Layouts\Examples\ExampleElements;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\DateRange;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Map;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Range;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\UTM;
use Orchid\Screen\TD;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\Settings\SettingsElements;

class SettingsFieldsAdvancedScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'name'  => 'Hello! We collected all the fields in one place',
            'place' => [
                'lat' => 37.181244855427394,
                'lng' => -3.6021993309259415,
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Настройка страницы';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return '';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @throws \Throwable
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [

            SettingsElements::class,
            Layout::rows([
                Group::make([
                    Upload::make('files')
                        ->title('Логотип')
                        ->maxFiles(1)
                        ->vertical(),
                    Upload::make('files')
                        ->title('Баннер')
                        ->maxFiles(1)
                        ->vertical(),
                ]),
            ]),
            Layout::columns([
                Layout::rows([
                    
                    TD::make('id', 'ID'),
                    TD::make('code', 'Трек-Код'),
                ])->title('Список статусов'),
                Layout::rows([
                ])->title('Список городов'),
            ]),
        ];
    }
}
