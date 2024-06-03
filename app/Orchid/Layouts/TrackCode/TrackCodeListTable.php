<?php

namespace App\Orchid\Layouts\TrackCode;

use Orchid\Screen\TD;
use App\Models\TrackCode;
use App\Models\StatusTrackCode;
use Orchid\Screen\Layouts\Table;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;

class TrackCodeListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'track_codes';

    protected $styleButton = '
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100%;';
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID'),
            TD::make('code', 'Трек-Код'),
            TD::make('status_track_code_id', 'Статус')->render(function (TrackCode $track_code) {
                $status = StatusTrackCode::find($track_code->status_track_code_id);
                return "<span class='badge text-center' style='background-color: {$status->background_color}; font-size: 12px; color: {$status->text_color}'>{$status->name}</span>";
            }),
            // TD::make('action', 'Действие')->render(function (TrackCode $track_code) {
            //     return Group::make([
            //         ModalToggle::make('')
            //             ->icon('bs.pencil')
            //             ->modal('editFilial')
            //             ->method('update')
            //             ->modalTitle('Редактирование филиал ' . $track_code->code)
            //             ->asyncParameters([
            //                 'track_code' => $track_code->id
            //             ])
            //             ->class('btn btn-warning text-center rounded-2')
            //             ->style($this->styleButton),
            //         Button::make('')
            //             ->icon('trash')
            //             ->method('delete')
            //             ->confirm('Вы уверены, что хотите удалить филиал?')
            //             ->parameters([
            //                 'track_code' => $track_code->id,
            //             ])
            //             ->class('btn btn-danger text-center rounded-2')
            //             ->style($this->styleButton),
            //     ]);
            // })->width('200px'),
        ];
    }
}
