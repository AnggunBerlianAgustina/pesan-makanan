<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuyerMenuResource\Pages;
use App\Models\Menu;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Support\Str;

class BuyerMenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Pesan Menu';

    protected static ?string $pluralLabel = 'Pesan Menu';

    protected static ?string $slug = 'buyermenu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Add your form schema here
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->headerActions([
            // Header action for the shopping cart
            Action::make('keranjang_belanja')
                ->button()
                ->label('Keranjang Belanja')
                ->icon('heroicon-o-shopping-cart')
        ])
            ->columns([
                TextColumn::make('nama_menu')
                    ->default('Belum ada daftar menu')
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
                // Add filters if needed
            ])
            ->actions([
                Action::make('tambah_pesanan')
                    ->button()
                    ->label('Tambah Pesanan')
                    ->color('success')
                    ->icon('heroicon-o-plus')
                    ->steps([
                        Step::make('Jumlah Pesanan')
                            ->schema([
                                TextInput::make('Jumlah')
                                ->numeric()
                            ]),
                        Step::make('Catatan')
                            ->schema([
                                MarkdownEditor::make('description'),
                            ]),
                    ])

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected function handleTambahPesanan(Menu $record): void
    {
        // Handle the "Tambah Pesanan" logic here
        // For example, you could add the menu item to a cart or an order
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBuyerMenus::route('/'),
        ];
    }
}
