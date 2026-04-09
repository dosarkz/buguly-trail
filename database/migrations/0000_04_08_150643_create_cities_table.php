<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->timestamps();
        });

        $country = DB::table('countries')
            ->where('name', '=', 'Казахстан')
            ->get()->first();

        DB::table('cities')->insert([
            ['name' => 'Астана', 'country_id' => $country->id],
            ['name' => 'Алматы', 'country_id' => $country->id],
            ['name' => 'Шымкент', 'country_id' => $country->id],
            ['name' => 'Абай', 'country_id' => $country->id],
            ['name' => 'Акколь', 'country_id' => $country->id],
            ['name' => 'Аксай', 'country_id' => $country->id],
            ['name' => 'Аксу', 'country_id' => $country->id],
            ['name' => 'Актау', 'country_id' => $country->id],
            ['name' => 'Актобе', 'country_id' => $country->id],
            ['name' => 'Алга', 'country_id' => $country->id],
            ['name' => 'Арал', 'country_id' => $country->id],
            ['name' => 'Аркалык', 'country_id' => $country->id],
            ['name' => 'Арыс', 'country_id' => $country->id],
            ['name' => 'Атбасар', 'country_id' => $country->id],
            ['name' => 'Атырау', 'country_id' => $country->id],
            ['name' => 'Аягоз', 'country_id' => $country->id],
            ['name' => 'Байконыр', 'country_id' => $country->id],
            ['name' => 'Балхаш', 'country_id' => $country->id],
            ['name' => 'Булаево', 'country_id' => $country->id],
            ['name' => 'Державинск', 'country_id' => $country->id],
            ['name' => 'Ерейментау', 'country_id' => $country->id],
            ['name' => 'Есик', 'country_id' => $country->id],
            ['name' => 'Есиль', 'country_id' => $country->id],
            ['name' => 'Жанаозен', 'country_id' => $country->id],
            ['name' => 'Жанатас', 'country_id' => $country->id],
            ['name' => 'Жаркент', 'country_id' => $country->id],
            ['name' => 'Жезказган', 'country_id' => $country->id],
            ['name' => 'Жем', 'country_id' => $country->id],
            ['name' => 'Жетысай', 'country_id' => $country->id],
            ['name' => 'Житикара', 'country_id' => $country->id],
            ['name' => 'Зайсан', 'country_id' => $country->id],
            ['name' => 'Зыряновск', 'country_id' => $country->id],
            ['name' => 'Казалинск', 'country_id' => $country->id],
            ['name' => 'Кандыагаш', 'country_id' => $country->id],
            ['name' => 'Капшагай', 'country_id' => $country->id],
            ['name' => 'Караганда', 'country_id' => $country->id],
            ['name' => 'Каражал', 'country_id' => $country->id],
            ['name' => 'Каратау', 'country_id' => $country->id],
            ['name' => 'Каркаралинск', 'country_id' => $country->id],
            ['name' => 'Каскелен', 'country_id' => $country->id],
            ['name' => 'Кентау', 'country_id' => $country->id],
            ['name' => 'Кокшетау', 'country_id' => $country->id],
            ['name' => 'Костанай', 'country_id' => $country->id],
            ['name' => 'Кулсары', 'country_id' => $country->id],
            ['name' => 'Курчатов', 'country_id' => $country->id],
            ['name' => 'Кызылорда', 'country_id' => $country->id],
            ['name' => 'Ленгер', 'country_id' => $country->id],
            ['name' => 'Лисаковск', 'country_id' => $country->id],
            ['name' => 'Макинск', 'country_id' => $country->id],
            ['name' => 'Мамлютка', 'country_id' => $country->id],
            ['name' => 'Павлодар', 'country_id' => $country->id],
            ['name' => 'Петропавловск', 'country_id' => $country->id],
            ['name' => 'Приозёрск', 'country_id' => $country->id],
            ['name' => 'Риддер', 'country_id' => $country->id],
            ['name' => 'Рудный', 'country_id' => $country->id],
            ['name' => 'Сарань', 'country_id' => $country->id],
            ['name' => 'Сарканд', 'country_id' => $country->id],
            ['name' => 'Сарыагаш', 'country_id' => $country->id],
            ['name' => 'Сатпаев', 'country_id' => $country->id],
            ['name' => 'Семей', 'country_id' => $country->id],
            ['name' => 'Сергеевка', 'country_id' => $country->id],
            ['name' => 'Серебрянск', 'country_id' => $country->id],
            ['name' => 'Степногорск', 'country_id' => $country->id],
            ['name' => 'Степняк', 'country_id' => $country->id],
            ['name' => 'Тайынша', 'country_id' => $country->id],
            ['name' => 'Талгар', 'country_id' => $country->id],
            ['name' => 'Талдыкорган', 'country_id' => $country->id],
            ['name' => 'Тараз', 'country_id' => $country->id],
            ['name' => 'Текели', 'country_id' => $country->id],
            ['name' => 'Темир', 'country_id' => $country->id],
            ['name' => 'Темиртау', 'country_id' => $country->id],
            ['name' => 'Тобыл', 'country_id' => $country->id],
            ['name' => 'Туркестан', 'country_id' => $country->id],
            ['name' => 'Уральск', 'country_id' => $country->id],
            ['name' => 'Усть-Каменогорск', 'country_id' => $country->id],
            ['name' => 'Ушарал', 'country_id' => $country->id],
            ['name' => 'Уштобе', 'country_id' => $country->id],
            ['name' => 'Форт-Шевченко', 'country_id' => $country->id],
            ['name' => 'Хромтау', 'country_id' => $country->id],
            ['name' => 'Шалкар', 'country_id' => $country->id],
            ['name' => 'Шар', 'country_id' => $country->id],
            ['name' => 'Шахтинск', 'country_id' => $country->id],
            ['name' => 'Шемонаиха', 'country_id' => $country->id],
            ['name' => 'Шу', 'country_id' => $country->id],
            ['name' => 'Шымкент', 'country_id' => $country->id],
            ['name' => 'Щучинск', 'country_id' => $country->id],
            ['name' => 'Экибастуз', 'country_id' => $country->id],
            ['name' => 'Эмба', 'country_id' => $country->id],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
