<?php
namespace App\Filament\Resources\Users\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use App\Filament\Resources\Users\UserResource;

class ListUsers extends ListRecords
{
    /**
     * @var string
     */
    protected static string $resource = UserResource::class;

    /**
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    /**
     * @return array
     */
    public function getTabs(): array
    {
        return [
            'all'   => Tab::make('All'),
            'admin' => Tab::make('Admin')
                ->modifyQueryUsing(
                    fn ($query) =>
                    $query->whereHas(
                        'role',
                        fn ($role) =>
                        $role->where('slug', 'roles-administrator')
                    )
                ),
            'user' => Tab::make('User')
                ->modifyQueryUsing(
                    fn ($query) =>
                    $query->whereHas(
                        'role',
                        fn ($role) =>
                        $role->where('name', 'roles-user')
                    )
                ),
        ];
    }
}
