<?php

namespace App\Orchid\Screens\Partner;

use Orchid\Screen\Screen;
use App\Models\Partner;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PartnerListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'partners' => Partner::all()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список заявки на партнерства';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('partners', [
                TD::make('name', 'ФИО'),
                TD::make('phone', 'Телефон'),
            ])
        ];
    }
}
