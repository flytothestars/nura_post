<?php

namespace App\Orchid\Screens\TrackCode;

use Orchid\Screen\Screen;
use App\Models\TrackCode;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use App\Imports\TrackCodeImport;
use App\Models\StatusTrackCode;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\ModalToggle;
use App\Orchid\Layouts\TrackCode\TrackCodeListTable;
use Orchid\Screen\Fields\Group;


class TrackCodeListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'track_codes' => TrackCode::filters()->defaultSort('id', 'desc')->paginate(20),
            'metrics' => [
                'sales'    => TrackCode::count(),
                'status_1'    => TrackCode::where('status_track_code_id', 1)->count(),
                'status_2'    => TrackCode::where('status_track_code_id', 2)->count(),
                'status_3'    => TrackCode::where('status_track_code_id', 3)->count(),
                'status_4'    => TrackCode::where('status_track_code_id', 4)->count(),
                'status_5'    => TrackCode::where('status_track_code_id', 5)->count(),
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список Трек-кодов';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Загрузить')->modal('createTrackCode')->method('create')
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
            Layout::accordion([
                'Количество' => Layout::metrics([
                    'Количество трек-кодов'    => 'metrics.sales',
                ]),
                'Анализ по статус' => Layout::metrics([
                    'Дата регистрация клиентом' => 'metrics.status_1',
                    'Поступило на склад Китае' => 'metrics.status_2',
                    'Пути' => 'metrics.status_3',
                    'Поступило на склад филиал' => 'metrics.status_4',
                    'Получено' => 'metrics.status_5',
                ]),
            ]),

            TrackCodeListTable::class,
            Layout::modal('createTrackCode', [
                Layout::tabs([
                    'Загрузить файл' =>
                    Layout::rows([
                        Input::make('raw_file')
                            ->type('file')
                            ->title('File input example')
                            ->horizontal(),
                        Select::make('first_status_track_code_id')
                            ->fromModel(StatusTrackCode::class, 'name', 'id')
                            ->title('Статус')
                            ->empty('Выберите статус'),
                    ]),
                    'Загрузить код' =>
                    Layout::rows([
                        Input::make('array_code')
                            ->type('text')
                            ->title('File input example')
                            ->horizontal(),
                        Select::make('second_status_track_code_id')
                            ->fromModel(StatusTrackCode::class, 'name', 'id')
                            ->title('Статус')
                            ->empty('Выберите статус'),
                    ]),
                ]),
            ])
        ];
    }

    public function create(Request $request)
    {
        $status = $request['first_status_track_code_id'] ? $request['first_status_track_code_id'] : $request['second_status_track_code_id'];
        $file = $request->file('raw_file');
        try {
            Excel::import(new TrackCodeImport($status), $file); // TrackCodeImport - класс импорта Excel
            Toast::info('Данные успешно импортированы');
            return back()->with('success', 'Данные успешно импортированы.');
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка импорта данных: ' . $e->getMessage());
        }
    }

    public function delete(TrackCode $track_code)
    {
        $track_code->delete();
        Toast::info('Филиал успешно удалено');
    }
}
