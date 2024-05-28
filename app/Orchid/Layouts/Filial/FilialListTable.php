<?php

namespace App\Orchid\Layouts\Filial;

use Orchid\Screen\TD;
use App\Models\Filial;
use Orchid\Screen\Layouts\Table;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;

class FilialListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'filials';

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
            TD::make('address', 'Адрес'),
            TD::make('phone', 'Телефон'),
            TD::make('twogis_link', 'Ссылка 2gis'),
            TD::make('work_time', 'Время работы')->render(function ($field) {
                return "{$field->start_time} - {$field->end_time}";
            }),
            TD::make('exchange_rates', 'Цена за кг'),
            TD::make('action', 'Действие')->render(function (Filial $filial) {
                return Group::make([
                    ModalToggle::make('')
                        ->icon('bs.pencil')
                        ->modal('editFilial')
                        ->method('update')
                        ->modalTitle('Редактирование филиал ' . $filial->address)
                        ->asyncParameters([
                            'filial' => $filial->id
                        ])
                        ->class('btn btn-warning text-center rounded-2')
                        ->style($this->styleButton),
                    Button::make('')
                        ->icon('trash')
                        ->method('delete')
                        ->confirm('Вы уверены, что хотите удалить филиал?')
                        ->parameters([
                            'filial' => $filial->id,
                        ])
                        ->class('btn btn-danger text-center rounded-2')
                        ->style($this->styleButton),
                ]);
            }),
        ];
    }
}
