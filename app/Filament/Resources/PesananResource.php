<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Filament\Resources\PesananResource\RelationManagers;
use App\Models\Pesanan;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Select;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Pesanan';

    protected static ?string $pluralLabel = 'Riwayat Pesanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('status_pesanan')
                ->options([
                    'Baru' => 'Baru',
                    'Proses' => 'Proses',
                    'Selesai' => 'Selesai',
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Nomor Pesanan')
                    ->searchable(),
                TextColumn::make('nama_menu'),
                TextColumn::make('nama_pemesan'),
                TextColumn::make('keterangan'),
                TextColumn::make('status_pesanan')
                    ->label('Status Pesanan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Baru' => 'gray',
                        'Proses' => 'danger',
                        'Selesai' => 'success',
                    })
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Perubahan Terakhir')
            ])
            ->filters([
                SelectFilter::make('status_pesanan')
                    ->options([
                        'Baru' => 'Baru',
                        'Proses' => 'Proses',
                        'Selesai' => 'Selesai',
                    ])
                ->attribute('status_pesanan')
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalSubmitActionLabel('Simpan Perubahan')
                    ->modalCancelActionLabel('Batal')
                    ->modalHeading('')
                    ->modalWidth('md')
                    ->successNotificationTitle('Perubahan Disimpan'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePesanans::route('/'),
        ];
    }
}
