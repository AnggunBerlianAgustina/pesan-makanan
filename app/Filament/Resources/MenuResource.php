<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Support\Enums\FontWeight;
use App\Filament\Resources\MenuResource\Widgets\StatsOverview;
use Filament\Actions\Action;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?string $navigationLabel = 'Menu';

    protected static ?string $pluralLabel = 'Daftar Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_menu')
                    ->label('Nama Menu')
                    ->autofocus()
                    ->suffixIcon('heroicon-s-chart-pie'),
                TextInput::make('harga')
                    ->prefix('Rp.')
                    ->suffixIcon('heroicon-s-banknotes')
                    ->numeric(),
                Textarea::make('keterangan')
                    ->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nama_menu')
                ->searchable()
                ->label('Daftar Menu')
                ->description(fn (Menu $record) => $record->keterangan)
                ->wrap()
                ->weight(FontWeight::Bold),
            TextColumn::make('harga')
                ->money('IDR'),
            ])
            ->searchPlaceholder('Cari')
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalCancelActionLabel('Batal')
                    ->modalSubmitActionLabel('Simpan')
                    ->successNotificationTitle('Perubahan Disimpan'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->modalCancelActionLabel('Batal')
                    ->modalDescription('Apakah anda yakin ingin menghapus menu ini?')
                    ->modalSubmitActionLabel('Hapus')
                    ->successNotificationTitle('Berhasil Dihapus')
                    ->modalHeading('Hapus menu'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus data yang dipilih'),
                ]),
            ]);
        }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMenus::route('/'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class, // Register the widget
        ];
    }
}
