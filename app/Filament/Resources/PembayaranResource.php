<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationLabel = 'Pembayaran';

    protected static ?string $pluralLabel = 'Riwayat Pembayaran';

    protected static ?string $slug = 'pembayaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_menu')
                ->searchable()
                ->label('Nomor Menu'),
                TextColumn::make('no_pesanan')
                ->label('No Pesanan'),
                TextColumn::make('nama_pemesan')
                ->label('Nama Pemesan'),
                TextColumn::make('jumlah_pembayaran')
                ->money('IDR'),
                TextColumn::make('status')
                ->label('Status Pembayaran')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'belum lunas' => 'danger',
                    'lunas' => 'success',
                })
                ->sortable(),
            ])
            ->searchPlaceholder('Cari')

            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePembayarans::route('/'),
        ];
    }
}
