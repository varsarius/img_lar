<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('locations')->insert([
          ['name' => 'Бара'],
          ['name' => 'Басарабяска'],
          ['name' => 'Бельць'],
          ['name' => 'Бендеры'],
          ['name' => 'Бешалма'],
          ['name' => 'Билка'],
          ['name' => 'Бичоц'],
          ['name' => 'Болград'],
          ['name' => 'Бородина'],
          ['name' => 'Ботна'],
          ['name' => 'Брянка'],
          ['name' => 'Буздуган'],
          ['name' => 'Вадул-луй-водэ'],
          ['name' => 'Вариаш'],
          ['name' => 'Вулканешты'],
          ['name' => 'Гагаузия'],
          ['name' => 'Глодяны'],
          ['name' => 'Гродешты'],
          ['name' => 'Дубоссары'],
          ['name' => 'Жолти'],
          ['name' => 'Заика'],
          ['name' => 'Заозерное'],
          ['name' => 'Избица'],
          ['name' => 'Кагул'],
          ['name' => 'Каушаны'],
          ['name' => 'Кишинёв'],
          ['name' => 'Кобэлэ'],
          ['name' => 'Комрат'],
          ['name' => 'Корнешты'],
          ['name' => 'Костешты'],
          ['name' => 'Котовск'],
          ['name' => 'Криулень'],
          ['name' => 'Крыжополь'],
          ['name' => 'Леова'],
          ['name' => 'Марей'],
          ['name' => 'Маркулешты'],
          ['name' => 'Молдова-Секеуш'],
          ['name' => 'Нерубайское'],
          ['name' => 'Николаевка'],
          ['name' => 'Окница'],
          ['name' => 'Орхей'],
          ['name' => 'Репедеа'],
          ['name' => 'Рыбница'],
          ['name' => 'Сандулени'],
          ['name' => 'Слободзея'],
          ['name' => 'Сороки'],
          ['name' => 'Стаханы'],
          ['name' => 'Сынжерей'],
          ['name' => 'Тараклия'],
          ['name' => 'Теленешты'],
          ['name' => 'Тирасполь'],
          ['name' => 'Топа'],
          ['name' => 'Тырасполь'],
          ['name' => 'Унгень'],
          ['name' => 'Фаур'],
          ['name' => 'Флорешты'],
          ['name' => 'Хынчешты'],
          ['name' => 'Цэуцэуцы'],
          ['name' => 'Чадыр-Лунга'],
          ['name' => 'Чимишлия'],
          ['name' => 'Чудеса'],
          ['name' => 'Шабаны'],
          ['name' => 'Шолданешты'],
          ['name' => 'Штефан-Водэ'],
          ['name' => 'Яловены']
      ]);
    }
}
