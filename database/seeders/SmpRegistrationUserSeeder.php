<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SmpRegistrationUserSeeder extends Seeder
{
    public function run()
    {
        // 58
        User::create([
            'token' => '07CtE4Me3k3dQleZAsaX',
            'name' => 'Giorgiana Queency Mikana',
            'username' => '2324307001',
            'password' => '$2y$10$SJFdrGl2NmxduUdMjfCb2uUv8BEFGEQ.9XxC.EdQFx8PUtAO1UcKq',
            'created_at' => '2022-08-03 07:25:12',
            'updated_at' => '2022-08-03 07:25:12',
        ])->assignRole('Siswa SMP');

        // 59
        User::create([
            'token' => 'FqNyFkWbGo6LGFo1u6Is',
            'name' => 'Lovzkyrich Seangello Viery',
            'username' => '2324307002',
            'password' => '$2y$10$CLtdRNOm8pE1zqQMY1cR2eUfZd3fiyxR613NfmTgTeCGqkRjuD5Y6',
            'created_at' => '2022-08-03 07:27:42',
            'updated_at' => '2022-08-03 07:27:42',
        ])->assignRole('Siswa SMP');

        // 60
        User::create([
            'token' => 'oOGS2Vaij69FlT5kjn4i',
            'name' => 'Tes',
            'username' => '2324307003',
            'password' => '$2y$10$tCtvx/c3LyiL/1.0YXCpLeQ3ATwFFUyJSahx1vgcE3NEamdl8/x5K',
            'created_at' => '2022-08-03 07:28:33',
            'updated_at' => '2022-08-03 07:28:33',
        ])->assignRole('Siswa SMP');

        // 61
        User::create([
            'token' => 'l0ze07lrdcNPwUkSBn33',
            'name' => 'Grace Violatabita',
            'username' => '2324307004',
            'password' => '$2y$10$NPu/qsd5aP1IUrVoqwWmoO6iMPs5iFltXJQF2mzIn7Hn2e.Sslb0K',
            'last_login' => '2022-08-03',
            'created_at' => '2022-08-03 07:31:21',
            'updated_at' => '2022-08-03 07:35:37',
        ])->assignRole('Siswa SMP');

        // 62
        User::create([
            'token' => 'v1PKYuIOUkTNa3nICU9w',
            'name' => 'Siena Meifilia Wisesa',
            'username' => '2324307005',
            'password' => '$2y$10$sgcT0kjDnUMmcHp83L6g7.ANxQec7MvxdBM8WPWyJHUlw2VFVwUE6',
            'last_login' => '2022-08-03',
            'created_at' => '2022-08-03 07:32:51',
            'updated_at' => '2022-08-03 07:33:51',
        ])->assignRole('Siswa SMP');

        // 63
        User::create([
            'token' => 'KlmfW4nTAWBou36f2net',
            'name' => 'Ellena Triphosa Daniella',
            'username' => '2324307006',
            'password' => '$2y$10$K84OPodim/CMD0JcIUHtpO9U3tUTUZu5WWYR/5LWfr9ZvbuRDhhFm',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-03 07:46:31',
            'updated_at' => '2022-08-04 08:44:54',
        ])->assignRole('Siswa SMP');

        // 64
        User::create([
            'token' => 'uZyHDzkxIacZWaJJAfiv',
            'name' => 'Mikhael Davi Ireno',
            'username' => '2324307007',
            'password' => '$2y$10$gB0E6pPS/Lmu8iuN/161Xee1xo0ktMDp.ekLkRgGpUMcgWFsS0Dda',
            'last_login' => '2022-08-13',
            'created_at' => '2022-08-03 08:13:36',
            'updated_at' => '2022-08-13 01:39:40',
        ])->assignRole('Siswa SMP');

        // 65
        User::create([
            'token' => 'E7u2ei7TI81fjqQRmZJT',
            'name' => 'Yohanes Capestrano Aldrian Nugroho',
            'username' => '2324307008',
            'password' => '$2y$10$7Qq7UEdnXdtT.QvWeR/rIO3Ro.EcxupTB3D498XXftlU3sHPfQfga',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-03 11:57:21',
            'updated_at' => '2022-08-09 11:58:35',
        ])->assignRole('Siswa SMP');

        // 66
        User::create([
            'token' => 'Z3dygUteIK1bFrodF6eS',
            'name' => 'Livi Amarissa Zefanya',
            'username' => '2324307009',
            'password' => '$2y$10$3LP.Z9NlXGC8nheJRjaAuO2UaO.sn1sUWoz6h0iT44kmyTBuSyObG',
            'last_login' => '2022-08-03',
            'created_at' => '2022-08-03 12:24:15',
            'updated_at' => '2022-08-03 12:27:18',
        ])->assignRole('Siswa SMP');

        // 67
        User::create([
            'token' => 'LtHytkUmC1UQD9bmdTRp',
            'name' => 'Gita Riris Artauli',
            'username' => '2324307010',
            'password' => '$2y$10$gQ8iUydzYq2vhrZ5p34VueRtka4Ycn/sEW8Arq5AiUBB2JmPvB64a',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-03 12:27:24',
            'updated_at' => '2022-08-11 08:28:52',
        ])->assignRole('Siswa SMP');

        // 68
        User::create([
            'token' => 'RmxO2Ns4xqRd5gV99HN5',
            'name' => 'Maria Cattarina Jovanka Liandra',
            'username' => '2324307011',
            'password' => '$2y$10$uY6ix9k4dt.DHUaTpz/saOreWrf9Qip1dgmO6vitJIG7WjGKBd4TK',
            'created_at' => '2022-08-03 12:48:56',
            'updated_at' => '2022-08-03 12:48:56',
        ])->assignRole('Siswa SMP');

        // 69
        User::create([
            'token' => 'RfcdYTv3mzNkeEOwOCLQ',
            'name' => 'Theresia Stiefanie',
            'username' => '2324307012',
            'password' => '$2y$10$.6Bjx8ynRK0k1hjMvjFEA.8BwCih9j/qYCM760qKVqz/8Bd6vlxwi',
            'created_at' => '2022-08-03 13:00:09',
            'updated_at' => '2022-08-03 13:00:09',
        ])->assignRole('Siswa SMP');

        // 70
        User::create([
            'token' => 'CEpE8kqCRjCkfTdDBuUK',
            'name' => 'Giuliana Gabrielle Sihotang',
            'username' => '2324307013',
            'password' => '$2y$10$yTRWp0rQlVL8f8.xhp..ausoumS15dYUT2OjYK2KUe4JK9gPpwkRK',
            'last_login' => '2022-08-03',
            'created_at' => '2022-08-03 13:04:07',
            'updated_at' => '2022-08-03 13:07:43',
        ])->assignRole('Siswa SMP');

        // 71
        User::create([
            'token' => 'enH2p0gsuoxvGl3DflFI',
            'name' => 'Giuliana Gabrielle Sihotang',
            'username' => '2324307014',
            'password' => '$2y$10$hw85AejyvNJ668WDJgQKjuyz7m8pSrwFlFIbNlYO3gCBooVvHZtD6',
            'created_at' => '2022-08-03 13:06:14',
            'updated_at' => '2022-08-03 13:06:14',
        ])->assignRole('Siswa SMP');

        // 72
        User::create([
            'token' => '8mtiL9oVyUTRMzBqqvXf',
            'name' => 'Mikhael Adiasta Gautama',
            'username' => '2324307015',
            'password' => '$2y$10$gcXYs9.Dl2M/Va2gWKIyIux8Tfl.0KQPcoUUWJGudL.SvL04WJNwe',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-03 13:31:49',
            'updated_at' => '2022-08-11 04:01:28',
        ])->assignRole('Siswa SMP');

        // 73
        User::create([
            'token' => 'TJRMRq99zCgokoIUqBjM',
            'name' => 'Rahel Claudia Zhiping Manurung',
            'username' => '2324307016',
            'password' => '$2y$10$cOtwMcmGogvNP66m3TleRuaBVl/QIpVg29yBoSlMJabwqYizAj4U2',
            'last_login' => '2022-08-03',
            'created_at' => '2022-08-03 13:54:30',
            'updated_at' => '2022-08-03 13:55:43',
        ])->assignRole('Siswa SMP');

        // 74
        User::create([
            'token' => 'gIjuLFX4P34DWqTtnlPI',
            'name' => 'Marcellino Adryan Pattikawa',
            'username' => '2324307017',
            'password' => '$2y$10$4Nc6WVd0Fo8IeDnqZeFjxewFW9z/TBU7MWZ5JpopKLZgY6i2WtQiK',
            'last_login' => '2022-08-03',
            'created_at' => '2022-08-03 15:39:25',
            'updated_at' => '2022-08-03 15:41:35',
        ])->assignRole('Siswa SMP');

        // 75
        User::create([
            'token' => 'tDkukXftSFS5AhGLRSpR',
            'name' => 'Gisela Dahayu Sasikirana',
            'username' => '2324307018',
            'password' => '$2y$10$S4RE5z2PN1mt9HQzcaObqOYKL6vfJJw.xYXKhHlGr0YnggVsfNfo2',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-03 22:11:30',
            'updated_at' => '2022-08-11 02:21:53',
        ])->assignRole('Siswa SMP');

        // 76
        User::create([
            'token' => 'JTZJi28FUCw4KgP3fZMj',
            'name' => 'Gabriel Owen Jukardi',
            'username' => '2324307019',
            'password' => '$2y$10$8mh6zANboOdLSDBzn7sjbOwpD.hPh5glVXxex06.uvKI9WhK5LWTa',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 02:26:43',
            'updated_at' => '2022-08-04 02:28:39',
        ])->assignRole('Siswa SMP');

        // 77
        User::create([
            'token' => '2mpoBALq7M6PQXynQSPU',
            'name' => 'Benedictus Danang Tedjoseno Korosidi Laksono',
            'username' => '2324307020',
            'password' => '$2y$10$I5Nc2DIId9GFkfmLvAN.1ei.CAzXK4WnMGstcSgLKpCa8UjqE8MWS',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 04:10:19',
            'updated_at' => '2022-08-04 06:59:35',
        ])->assignRole('Siswa SMP');

        // 78
        User::create([
            'token' => 'X7mVAith4gk8qDxyBmP4',
            'name' => 'Raenall Phillo',
            'username' => '2324307021',
            'password' => '$2y$10$zogc4EfSwtCsOy7q3MQktehU0F2LlyPofjulK.T5SX.Sz5tEtzVHK',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 04:12:25',
            'updated_at' => '2022-08-04 04:14:15',
        ])->assignRole('Siswa SMP');

        // 79
        User::create([
            'token' => '8crHEQ4PcXaL1h2ooDb3',
            'name' => 'Christopher Aditia Amarindra',
            'username' => '2324307022',
            'password' => '$2y$10$CbKH0KgPouDmGDYU1967f.sFy66QlNGCsRfMKoz0ZjIfn8aPd0UUa',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 04:28:18',
            'updated_at' => '2022-08-04 04:31:59',
        ])->assignRole('Siswa SMP');

        // 80
        User::create([
            'token' => 'xkdMtEQMkbZJdNbZChUj',
            'name' => 'Leandra Althea Messiana Yuliarto',
            'username' => '2324307023',
            'password' => '$2y$10$5ziwo0D9Wz6XB12AINE5wOSSlQ/4XtTzdJpEQgoQn2wgGVJwv6VuW',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 04:31:07',
            'updated_at' => '2022-08-04 04:36:36',
        ])->assignRole('Siswa SMP');

        // 81
        User::create([
            'token' => 'toQ14E1Dzv3CuacP1Cx2',
            'name' => 'Jirenza Ma Palasson',
            'username' => '2324307024',
            'password' => '$2y$10$AGJ6W6.WjCiclwb2pKcRP.caT6AkLXzQlU5gd8kw6ZHF69LyswnNO',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-04 04:33:49',
            'updated_at' => '2022-08-11 04:48:21',
        ])->assignRole('Siswa SMP');

        // 82
        User::create([
            'token' => '4RE4pb2bJYLX9UVddUwo',
            'name' => 'Timothy Pramadya Sulistyo',
            'username' => '2324307025',
            'password' => '$2y$10$DGyiwca2hoqUBtOHZBsQmeTLAtq.WndL80UJkHGWgnjoYIps1wOqa',
            'created_at' => '2022-08-04 04:37:27',
            'updated_at' => '2022-08-04 04:37:27',
        ])->assignRole('Siswa SMP');

        // 83
        User::create([
            'token' => 'hns1fizaqEhhpuP3nQHy',
            'name' => 'Gwenneth Valgretha Tiarda Simanjuntak',
            'username' => '2324307026',
            'password' => '$2y$10$bOm/p.9/7BEYW0UTDZRdd.q7gqcKFKx0v783i9m2q8ZpI6ZKM7UdC',
            'created_at' => '2022-08-04 05:13:22',
            'updated_at' => '2022-08-04 05:13:22',
        ])->assignRole('Siswa SMP');

        // 84
        User::create([
            'token' => 'bbdBIAD5V39ufKVbsdw4',
            'name' => 'Valerie Abigail Ranjabar',
            'username' => '2324307027',
            'password' => '$2y$10$nbOTE7bSje1yjkKMJ1244OUotb3mM5iyJVSHuRk18.hU7uRaNF2a.',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-04 05:58:45',
            'updated_at' => '2022-08-11 01:56:39',
        ])->assignRole('Siswa SMP');

        // 85
        User::create([
            'token' => '3tRlgwHAWOv3uMIHb473',
            'name' => 'Francessa Shaylee Chavi Setiawan',
            'username' => '2324307028',
            'password' => '$2y$10$avKItuIeKzTLZ2SdMguNweS5usfkMqLr.wGuafFGgj8xCtFRQFR7y',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 06:10:14',
            'updated_at' => '2022-08-04 06:12:25',
        ])->assignRole('Siswa SMP');

        // 86
        User::create([
            'token' => 'bhDluQWNQzHB0srRY7BS',
            'name' => 'William Subagio',
            'username' => '2324307029',
            'password' => '$2y$10$1J8HkG/HW9hbu9NIK1kDJOcrHmMCU19TRHLwjvPBYzJ6vfBxsbcgO',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 06:17:56',
            'updated_at' => '2022-08-04 06:20:21',
        ])->assignRole('Siswa SMP');

        // 87
        User::create([
            'token' => 'FYskiY7MKeFG4DY8NkD8',
            'name' => 'Diminique Kianna Widjaja',
            'username' => '2324307030',
            'password' => '$2y$10$sny3YCzsQ.RADcGjA7J5euCZa.edQWcPU5eo/NvRsxKr0.MJ5l9I2',
            'created_at' => '2022-08-04 06:38:04',
            'updated_at' => '2022-08-04 06:38:04',
        ])->assignRole('Siswa SMP');

        // 88
        User::create([
            'token' => '8XCXMkJjnHx5PrtMdq9I',
            'name' => 'Wenseslaus Kiano Caesafano Sagala',
            'username' => '2324307031',
            'password' => '$2y$10$2g9NeyN5BWm9MVA4gqV70uHWmWMTmNGiwCe9aKWTUx/aJWNBUlvRu',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 07:31:28',
            'updated_at' => '2022-08-04 08:06:23',
        ])->assignRole('Siswa SMP');

        // 89
        User::create([
            'token' => 'RwUy14iZzNDc4OANW7RG',
            'name' => 'Gracilya Defara Queensha Paramita',
            'username' => '2324307032',
            'password' => '$2y$10$XLxhkYbXKvIO/CJA0nonPu398GvZtlqxmx6GM0181E0jQDr.cRlVy',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 08:09:59',
            'updated_at' => '2022-08-04 08:12:40',
        ])->assignRole('Siswa SMP');

        // 90
        User::create([
            'token' => 'RnJWNNl4GRSWRLwUOX7O',
            'name' => 'Monique Christi Frederika Siburian',
            'username' => '2324307033',
            'password' => '$2y$10$ST6UK.d0dyJ2AfNHlau6OOxDTq9myFShYOw9JbE/fP7Fgpv9VrHgC',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 10:42:45',
            'updated_at' => '2022-08-04 10:44:47',
        ])->assignRole('Siswa SMP');

        // 91
        User::create([
            'token' => 'BvrtqH9m8BfAEnrFqWrM',
            'name' => 'Olivia Ester Cristin Natalia Pardede',
            'username' => '2324307034',
            'password' => '$2y$10$6w3t/C5hoGYZeCaCLlYwM.sKm9qBWMf9rSXvQIxphO9Q6FkYYgVe2',
            'created_at' => '2022-08-04 12:48:29',
            'updated_at' => '2022-08-04 12:48:29',
        ])->assignRole('Siswa SMP');

        // 92
        User::create([
            'token' => 'N1zy2EubRe2VmJfRsOEK',
            'name' => 'Oktavius Jhonatan',
            'username' => '2324307035',
            'password' => '$2y$10$LgcYwkuzZx3WjxjMhsPl1.5LQV0XpKRK/dUjDqilhNe9KXm2/uBIG',
            'created_at' => '2022-08-04 13:05:31',
            'updated_at' => '2022-08-04 13:05:31',
        ])->assignRole('Siswa SMP');

        // 93
        User::create([
            'token' => 'MKGwF6VgjmyxL4o8PNac',
            'name' => 'Kleofas Maheswara Nevan Santoso',
            'username' => '2324307036',
            'password' => '$2y$10$OzfPqba4lYJdjBSRPUR9MOx7pq0k.QvTBS50O9Y3e5.S4hNiQ0GdO',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 13:11:20',
            'updated_at' => '2022-08-04 13:14:41',
        ])->assignRole('Siswa SMP');

        // 94
        User::create([
            'token' => 'vCXykv8N6fNWN9Xx4dbv',
            'name' => 'Marvellous Reinhart Komar',
            'username' => '2324307037',
            'password' => '$2y$10$rcuY3/nDn17sgG9tQSWOPO6my2f7TmfqlBMIfpp.c99KM7hRp5VAu',
            'created_at' => '2022-08-04 13:12:47',
            'updated_at' => '2022-08-04 13:12:47',
        ])->assignRole('Siswa SMP');

        // 95
        User::create([
            'token' => 'J8fj4Yz3l0LnXqeW77ah',
            'name' => 'Antonio Nararya Savandra',
            'username' => '2324307038',
            'password' => '$2y$10$vtptrV4UaxLf2pI.tkVyteqdx/pllt1rwDcUw9aMrFnTntwaEBiVK',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 13:32:58',
            'updated_at' => '2022-08-04 13:36:19',
        ])->assignRole('Siswa SMP');

        // 96
        User::create([
            'token' => 'ZWK7CocITWStjmfH7FQT',
            'name' => 'Alfonsus Alvin Radithya Nareswara',
            'username' => '2324307039',
            'password' => '$2y$10$6m53IpVe44Z0XkIq/caYc.8pDQT4ptDnwnOrB4T7pj2nAXHE74A2q',
            'last_login' => '2022-08-04',
            'created_at' => '2022-08-04 13:41:07',
            'updated_at' => '2022-08-04 13:44:19',
        ])->assignRole('Siswa SMP');

        // 97
        User::create([
            'token' => '6H1B8EQ62U0CarYlRu0d',
            'name' => 'Gia Cinta Natasha Michaela',
            'username' => '2324307040',
            'password' => '$2y$10$sUsvB7i7e8eh0bmYpzq0FeAGKfEqzKRTrKNv65VQfPJo2Sxg2q7zq',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-04 14:29:42',
            'updated_at' => '2022-08-09 13:52:33',
        ])->assignRole('Siswa SMP');

        // 98
        User::create([
            'token' => 'f7wLbKcu0iFnVeaDd5oH',
            'name' => 'Obed Diezra Cornell Perangin Angin',
            'username' => '2324307041',
            'password' => '$2y$10$CGq9sJzwfkYmunaFBN0dzOxKu7dtREiIzdXCVoR4vJNFuEVVvTI/C',
            'created_at' => '2022-08-05 01:06:58',
            'updated_at' => '2022-08-05 01:06:58',
        ])->assignRole('Siswa SMP');

        // 99
        User::create([
            'token' => 'lsXowpS1f088SQJkbCvL',
            'name' => 'Audrey Clara Angel Pramesti Hutagalung',
            'username' => '2324307043',
            'password' => '$2y$10$TuXOIKdgk7UeQIcwt12fru/1SslyubOgYrDNmrD.92j7QrBOnPetu',
            'last_login' => '2022-08-14',
            'created_at' => '2022-08-05 02:45:05',
            'updated_at' => '2022-08-14 01:49:41',
        ])->assignRole('Siswa SMP');

        // 100
        User::create([
            'token' => 'K6AGM0ePfmCJXIdEWVnN',
            'name' => 'Alfonsus Novara Jammyasa',
            'username' => '2324307042',
            'password' => '$2y$10$6PVSCnYsDGFHdAuwh8hZuusUpQ.jlyxf9JKd7qrKTsCWIKmf/MhIm',
            'created_at' => '2022-08-06 05:57:17',
            'updated_at' => '2022-08-06 05:57:17',
        ])->assignRole('Siswa SMP');

        // 101
        User::create([
            'token' => 'D3eUjjyhkWgVCSst03Nu',
            'name' => 'Asdasd',
            'username' => '2324307044',
            'password' => '$2y$10$RDPvu6BeJ8a7oB4IgBNf8OVczqb74ijwwOgz25fElbVgVaxpdHZzm',
            'created_at' => '2022-08-06 06:35:22',
            'updated_at' => '2022-08-06 06:35:22',
        ])->assignRole('Siswa SMP');

        // 102
        User::create([
            'token' => 'OYuuPClSUnpQNzeHJufZ',
            'name' => 'Asdasd',
            'username' => '2324307045',
            'password' => '$2y$10$5YgTAyqMnhwcWirLUCEyM./mDCqZ4dFxmoBJjixeYROYwxQKeNRA.',
            'created_at' => '2022-08-06 06:36:36',
            'updated_at' => '2022-08-06 06:36:36',
        ])->assignRole('Siswa SMP');

        // 103
        User::create([
            'token' => 'GmZnOV8QG1xjLE2JsTKh',
            'name' => 'Yohanes Dhimardito',
            'username' => '2324307046',
            'password' => '$2y$10$Rcy5eSs0goNeXKPix5K/ROMWZzHiWH/weJwGSgS5IUIwtviaHka0u',
            'last_login' => '2022-08-06',
            'created_at' => '2022-08-06 07:19:26',
            'updated_at' => '2022-08-06 07:21:15',
        ])->assignRole('Siswa SMP');

        // 104
        User::create([
            'token' => 'cF8Fx7Xjt05Gt9NdC7d8',
            'name' => 'Yohanes Dhimardito',
            'username' => '2324307047',
            'password' => '$2y$10$ac.7m2U0y9NHJiI9ilQTi.LsUke95eRxxMRuQPR5OdT4th8GnEGkO',
            'created_at' => '2022-08-06 07:19:28',
            'updated_at' => '2022-08-06 07:19:28',
        ])->assignRole('Siswa SMP');

        // 105
        User::create([
            'token' => 'Ak93eP6WTtmkeWtB5bVz',
            'name' => 'Gianna Pavita Maheswari',
            'username' => '2324307048',
            'password' => '$2y$10$Z06CS/dgYD5wyYK/qU2R0uRQLuTs6XOjmdiYvRJgrpUmR9OwC0fnC',
            'last_login' => '2022-08-06',
            'created_at' => '2022-08-06 09:25:47',
            'updated_at' => '2022-08-06 09:27:38',
        ])->assignRole('Siswa SMP');

        // 106
        User::create([
            'token' => 'MmqDfpTwb3VKyf60QuUP',
            'name' => 'Garry Palti Sinaga',
            'username' => '2324307049',
            'password' => '$2y$10$Minywexrvo8y55dDaunGru78TItJ1JxUycosNA9rCuDvmAg/Z.fWq',
            'last_login' => '2022-08-07',
            'created_at' => '2022-08-07 00:09:32',
            'updated_at' => '2022-08-07 00:19:50',
        ])->assignRole('Siswa SMP');

        // 107
        User::create([
            'token' => 'xtbk4L8YP8pI3uOThsPE',
            'name' => 'Reagen Rafael Domingo',
            'username' => '2324307050',
            'password' => '$2y$10$NI5L3iVwb.Hf7JoMvGXliOaByfwwV9qIEPehTmHkxtJ9EIpVDASnG',
            'last_login' => '2022-08-07',
            'created_at' => '2022-08-07 05:31:32',
            'updated_at' => '2022-08-07 05:39:25',
        ])->assignRole('Siswa SMP');

        // 108
        User::create([
            'token' => 'URmHTHbBKpAqqQ3EKHGB',
            'name' => 'Gilbert Manuel Sitanggang',
            'username' => '2324307051',
            'password' => '$2y$10$FGWYLa/eNSLcD5PjG7jmKe4jfmte5B4QXQjsfRRzLaRqOPbD7Lh9y',
            'last_login' => '2022-08-12',
            'created_at' => '2022-08-07 08:43:24',
            'updated_at' => '2022-08-12 07:53:27',
        ])->assignRole('Siswa SMP');

        // 109
        User::create([
            'token' => '9JsGmZ66xx8VdrPt5zsY',
            'name' => 'Synbi Kaymita Kurniady',
            'username' => '2324307052',
            'password' => '$2y$10$PQtiip0vymTI5g0/KgtKb.ikSQrKA.RvtQlPtbAbuXgtm5EdpQFkm',
            'last_login' => '2022-08-07',
            'created_at' => '2022-08-07 09:08:10',
            'updated_at' => '2022-08-07 09:10:48',
        ])->assignRole('Siswa SMP');

        // 110
        User::create([
            'token' => '0M7o2oj5FPbVwNzuJ1GT',
            'name' => 'Marcello Alexander Siregar',
            'username' => '2324307053',
            'password' => '$2y$10$g8G1ZYQkARG89MsFrh8zMOivXzYIv50rb8Bi/Ctn0e.O8RNpM.IhC',
            'last_login' => '2022-08-07',
            'created_at' => '2022-08-07 17:32:37',
            'updated_at' => '2022-08-07 17:37:50',
        ])->assignRole('Siswa SMP');

        // 111
        User::create([
            'token' => 'xElnzPlWdQ6zye18xSWE',
            'name' => 'Guido Panji Pramudhito Purba',
            'username' => '2324307054',
            'password' => '$2y$10$QQtPVk6PuNZYXlSJ/.5MAe51NKNVTUzRWI5dli/EbIZ3b/9UwfHd2',
            'last_login' => '2022-08-08',
            'created_at' => '2022-08-08 03:43:26',
            'updated_at' => '2022-08-08 03:47:14',
        ])->assignRole('Siswa SMP');

        // 112
        User::create([
            'token' => 'cOf9YxqNQIKhtnD4XwXk',
            'name' => 'Kevin James Alpha Tambun',
            'username' => '2324307055',
            'password' => '$2y$10$nOuAQTI5GbeibesNCzAvQuxQQ7lZ0AzWqOHiQac66wsgnZZFRd4gK',
            'created_at' => '2022-08-08 05:08:38',
            'updated_at' => '2022-08-08 05:08:38',
        ])->assignRole('Siswa SMP');

        // 113
        User::create([
            'token' => 'gF1zrynPV84oRNMcVaZg',
            'name' => 'Regina Aracelly Naela Saputro',
            'username' => '2324307056',
            'password' => '$2y$10$jNe3xXkPKf9tRJmHy6EWnuAr9bwER6DUvEsYyJxDt0rc90hpDfY/y',
            'last_login' => '2022-08-08',
            'created_at' => '2022-08-08 08:38:25',
            'updated_at' => '2022-08-08 08:40:33',
        ])->assignRole('Siswa SMP');

        // 114
        User::create([
            'token' => '4Rujbua7YYrUIfdZB4pA',
            'name' => 'Matthew Petra Jeremy',
            'username' => '2324307057',
            'password' => '$2y$10$kmrJP.tj2zEjH6VT4uJm9O8l2dqiGjp81K2JCdxnkZJ8MMfmzqeNa',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-08 09:26:38',
            'updated_at' => '2022-08-09 04:59:06',
        ])->assignRole('Siswa SMP');

        // 115
        User::create([
            'token' => '1G0dPn1ddI6Z4BJGLu1r',
            'name' => 'Antoinette Maria Carmel Saerang',
            'username' => '2324307058',
            'password' => '$2y$10$xFQEYNqKBPzb31D5r4/vAOAXKBO7D4zA2hQwvzDuoHI0zaaBqxcSe',
            'created_at' => '2022-08-08 10:03:32',
            'updated_at' => '2022-08-08 10:03:32',
        ])->assignRole('Siswa SMP');

        // 116
        User::create([
            'token' => 'dADxyJKiIj4nXOicusoi',
            'name' => 'Katarina Jovita',
            'username' => '2324307059',
            'password' => '$2y$10$AfGxeOe//2VPUADma/MM7OlGx9Wbvf7fAfj7OxaqbcJnEBZkQiASu',
            'last_login' => '2022-08-08',
            'created_at' => '2022-08-08 12:58:40',
            'updated_at' => '2022-08-08 13:00:32',
        ])->assignRole('Siswa SMP');

        // 117
        User::create([
            'token' => 'Yd3ATIKdCMY8T4ZhdBE2',
            'name' => 'Gamaliel Adrian Napoh',
            'username' => '2324307060',
            'password' => '$2y$10$JRM.II7BH5RjobTNnY.ZgOQ8u5u22l4WAhAvXCOWFaRX82YdsSaSy',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-09 07:19:35',
            'updated_at' => '2022-08-09 07:20:49',
        ])->assignRole('Siswa SMP');

        // 118
        User::create([
            'token' => 'n9dL2adwitjuvF1IMH6v',
            'name' => 'Gustave Ezequiel Aritonang',
            'username' => '2324307061',
            'password' => '$2y$10$tCuWH9lMxUS7TC8ilTJs7eceO5riScCy4ni6elmdcq02Qy9X8HyQ.',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-09 07:54:33',
            'updated_at' => '2022-08-09 08:00:18',
        ])->assignRole('Siswa SMP');

        // 119
        User::create([
            'token' => 'V5x5KB1UXnzHUIRafNE0',
            'name' => 'Hans Sandy Kurniady',
            'username' => '2324307062',
            'password' => '$2y$10$N0.5qcQHPQlWpSx.v.Vjre84i5oS7ceuUSThdZxzdI4DfEBeXhyle',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-09 08:21:57',
            'updated_at' => '2022-08-09 08:23:19',
        ])->assignRole('Siswa SMP');

        // 120
        User::create([
            'token' => 'Z7dSIyhjBQUAIhs1SH6K',
            'name' => 'Nadine Kristyona',
            'username' => '2324307063',
            'password' => '$2y$10$bUY4bnMIIAj7TIKp2CEwfueB9BSB1eXQXsLl7TNvVVfOlapIXA36a',
            'last_login' => '2022-08-12',
            'created_at' => '2022-08-09 08:37:55',
            'updated_at' => '2022-08-12 13:09:33',
        ])->assignRole('Siswa SMP');

        // 121
        User::create([
            'token' => 'aHSWSBWxQ5HQb9Oi5VKM',
            'name' => 'Sergio Mathew Tanu',
            'username' => '2324307064',
            'password' => '$2y$10$JpiNwednf6VyFv3wGm8F5uskBJU6EYW61QNsAt.Iy.yA7X0DYbloe',
            'created_at' => '2022-08-09 10:31:37',
            'updated_at' => '2022-08-09 10:31:37',
        ])->assignRole('Siswa SMP');

        // 122
        User::create([
            'token' => 'wx1ilSh9wJjcwvJGYFxx',
            'name' => 'Nico Febryan Ricardo.s',
            'username' => '2324307065',
            'password' => '$2y$10$eNg9hnFFOJq6b22FaXzL0.NyOnhAVDdi7zkL6GzbQul5dEHd01rhm',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-09 11:31:14',
            'updated_at' => '2022-08-09 11:34:34',
        ])->assignRole('Siswa SMP');

        // 123
        User::create([
            'token' => 'sXHztzr55n4ihATLuzU8',
            'name' => 'Rachel Irina Ariska',
            'username' => '2324307066',
            'password' => '$2y$10$T1YSBfbLZc.5rPrihbb/Yen1TPHf6jOE.DeEsL3w95XBHVf6N3nEO',
            'created_at' => '2022-08-09 13:51:24',
            'updated_at' => '2022-08-09 13:51:24',
        ])->assignRole('Siswa SMP');

        // 124
        User::create([
            'token' => 'DjLZsqV8TPhxHVzm6nlr',
            'name' => 'Jeremi Suryo Efamutam',
            'username' => '2324307067',
            'password' => '$2y$10$q0oBnQhBZDHShlPn2xVbK.t31PVWxf8JhIKkdXVAp4OV/pFdyU5Xu',
            'last_login' => '2022-08-09',
            'created_at' => '2022-08-09 15:11:45',
            'updated_at' => '2022-08-09 15:14:34',
        ])->assignRole('Siswa SMP');

        // 125
        User::create([
            'token' => '0cWWhUSXP3UqgkM2wAL7',
            'name' => 'Nikolas Arjuna Ari Bawono',
            'username' => '2324307068',
            'password' => '$2y$10$tvMCny8ZZ41QmLBLmPv6G.jMr5dmDl4zUENhte0jpyCQ29f9WqYjy',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-10 00:38:12',
            'updated_at' => '2022-08-10 00:41:34',
        ])->assignRole('Siswa SMP');

        // 126
        User::create([
            'token' => 'itoZNRQnaG395ccJey7c',
            'name' => 'Tristan Nathanael Palawang',
            'username' => '2324307069',
            'password' => '$2y$10$bHdNlONmwCuhs//3eWVP9uXrbuSKGtQBeALJiUHJsN.TEyKaOBYOu',
            'created_at' => '2022-08-10 01:06:13',
            'updated_at' => '2022-08-10 01:06:13',
        ])->assignRole('Siswa SMP');

        // 127
        User::create([
            'token' => '7YQf924GJjlXLG4sNqza',
            'name' => 'Olivia Alexandra Tedja',
            'username' => '2324307070',
            'password' => '$2y$10$chjwQCDQ/0tXd967sCA90eOhtSkRoXcb1Hx77DlYVa/1fYZp3ALle',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-10 03:24:54',
            'updated_at' => '2022-08-10 03:40:08',
        ])->assignRole('Siswa SMP');

        // 128
        User::create([
            'token' => 'pZDyrplAU3PvoPJiJ7rx',
            'name' => 'Kyra Sarah Giovanna Sembiring',
            'username' => '2324307071',
            'password' => '$2y$10$eFTrlYLW.xgyT3s.uVjuG.cGJCr5w2SoWTsH3wuIqZo5MxSz7YlSe',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-10 07:41:21',
            'updated_at' => '2022-08-10 07:42:27',
        ])->assignRole('Siswa SMP');

        // 129
        User::create([
            'token' => 'H0LaRdyz94fq1IACVysL',
            'name' => 'Bryan Christopher',
            'username' => '2324307072',
            'password' => '$2y$10$gcIV0zLY2HN1bWoCFbfx1esK3TtNOAyZH2z35MwUYAA//Y5x1zesK',
            'created_at' => '2022-08-10 08:05:00',
            'updated_at' => '2022-08-10 08:05:00',
        ])->assignRole('Siswa SMP');

        // 130
        User::create([
            'token' => '0wB75EDg7gORwvRqSGhu',
            'name' => 'Bryan Christopher',
            'username' => '2324307073',
            'password' => '$2y$10$CM1e4N9e3nK3rbCJopdg1OhVCV2vwbMOau/auPrXtsn.9g7KMLPne',
            'created_at' => '2022-08-10 08:05:04',
            'updated_at' => '2022-08-10 08:05:04',
        ])->assignRole('Siswa SMP');

        // 131
        User::create([
            'token' => 'mruqMGhcif2ZnGNwY3Hl',
            'name' => 'Immanuela Angesthi Kusuma',
            'username' => '2324307074',
            'password' => '$2y$10$CZz3X7DhXLzM.I86zuK8ju8MZGXJ5IgtGsqPMsgmYteIqr5XOT6xu',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-10 12:02:58',
            'updated_at' => '2022-08-10 12:06:53',
        ])->assignRole('Siswa SMP');

        // 132
        User::create([
            'token' => 'eCyck0n2cdpegR1Eenlq',
            'name' => 'Angela Keizha Wijaya',
            'username' => '2324307075',
            'password' => '$2y$10$fTtgU1SWqmdSlXp.bDua6.sKXhDiVsfWeAYy6H8VXAFOPaIUG7tdq',
            'created_at' => '2022-08-11 02:45:15',
            'updated_at' => '2022-08-11 02:45:15',
        ])->assignRole('Siswa SMP');

        // 133
        User::create([
            'token' => 'b5td8cELZ6SxYF5w8QLu',
            'name' => 'Benedictus Filbert Demas Haidar',
            'username' => '2324307076',
            'password' => '$2y$10$2MDhTMhN2ebZuX8RFp6bSuUr1pzdTQcto2c8/OZO1z41c3BsAtofa',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-11 07:34:02',
            'updated_at' => '2022-08-11 07:35:03',
        ])->assignRole('Siswa SMP');

        // 134
        User::create([
            'token' => 'BQZDweTzcXJe0yEsSD6m',
            'name' => 'Enzo Gurning',
            'username' => '2324307077',
            'password' => '$2y$10$qaujFyFXYu6/WzVLnzoEcO1O3OH/0Oz5ayBuSzF3rc4KCUYgs98hy',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-11 09:27:28',
            'updated_at' => '2022-08-11 09:29:11',
        ])->assignRole('Siswa SMP');

        // 135
        User::create([
            'token' => '1nADVuLqRuhzJvAshNm6',
            'name' => 'Fidelis Christian Suhaman',
            'username' => '2324307078',
            'password' => '$2y$10$moBHEiYwvbNeMgr/s/n2ievSwBAeDG7FL5PeFwDoGkyGIAeW1jW4C',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-11 09:50:52',
            'updated_at' => '2022-08-11 09:53:17',
        ])->assignRole('Siswa SMP');

        // 136
        User::create([
            'token' => 'FKw88z8JNAeHsZMdKjDo',
            'name' => 'Nathan Yosafat Nahampun',
            'username' => '2324307079',
            'password' => '$2y$10$e/VyXr8YDDC2QDIwpwbT6OAo9x/f8AFGbeRGqDsogI05PeGfzXzG6',
            'last_login' => '2022-08-11',
            'created_at' => '2022-08-11 14:08:17',
            'updated_at' => '2022-08-11 14:09:58',
        ])->assignRole('Siswa SMP');

        // 137
        User::create([
            'token' => 'LJh3xLRDvCDpp83Dx2pS',
            'name' => 'Nathanel Frederico Pardomuan Silitonga',
            'username' => '2324307080',
            'password' => '$2y$10$5m07seXMe4O7.p9FDREhiuBZ3yOc0YNRg29s7CqE5uTmyNX2D47fS',
            'created_at' => '2022-08-12 00:50:38',
            'updated_at' => '2022-08-12 00:50:38',
        ])->assignRole('Siswa SMP');

        // 138
        User::create([
            'token' => 'NWNFBvtlPd6HpVZTvZKO',
            'name' => 'Leon Gamalliel Antonius Bakker',
            'username' => '2324307081',
            'password' => '$2y$10$IlPnbJ9iUWpKvESbpK8rrO4WoptIB7xMAExQq/WTm6fstAPV9/fLm',
            'last_login' => '2022-08-12',
            'created_at' => '2022-08-12 06:16:17',
            'updated_at' => '2022-08-12 06:17:58',
        ])->assignRole('Siswa SMP');

        // 139
        User::create([
            'token' => 'igA8sWQn8K13AIVMWDre',
            'name' => 'Hayden Higuain Nicolas',
            'username' => '2324307082',
            'password' => '$2y$10$.OBkvfPv9wSmcbwhxzBAgeCtAjMPwO.pAj.7h7i0pCT26Z/n.MqnK',
            'last_login' => '2022-08-12',
            'created_at' => '2022-08-12 06:39:09',
            'updated_at' => '2022-08-12 06:50:24',
        ])->assignRole('Siswa SMP');

        // 140
        User::create([
            'token' => 'wseaxHVnjn22WZiS33eg',
            'name' => 'Elisabeth Maura Ronauli Silalahi',
            'username' => '2324307083',
            'password' => '$2y$10$Stz5sLiedqCOeuINLQW7m.0Tae5ESuNlP2tV9/xzsQK22MbIGKXW.',
            'last_login' => '2022-08-12',
            'created_at' => '2022-08-12 08:16:58',
            'updated_at' => '2022-08-12 08:20:38',
        ])->assignRole('Siswa SMP');

        // 141
        User::create([
            'token' => 'HCPE0my6yapXgL6PUHC9',
            'name' => 'Kay Roven Amanupunnjo',
            'username' => '2324307084',
            'password' => '$2y$10$TRZcGLpCVE0dgHmBpdqrU.3x4GBqVeKAbN64zv9OzZitJt3PYTb0q',
            'last_login' => '2022-08-14',
            'created_at' => '2022-08-12 08:41:04',
            'updated_at' => '2022-08-14 16:10:45',
        ])->assignRole('Siswa SMP');

        // 142
        User::create([
            'token' => 'tqvW8mDo9efXxiaxx9XY',
            'name' => 'Harleen Selvania Graciella',
            'username' => '2324307085',
            'password' => '$2y$10$Teg8sHMPbOJeHnUQS1IVK.pGnzgcXTlq0C3u9nLLYSlm0wy9ndsQC',
            'created_at' => '2022-08-12 14:07:01',
            'updated_at' => '2022-08-12 14:07:01',
        ])->assignRole('Siswa SMP');

        // 143
        User::create([
            'token' => 'xZLTo35AdNlzwNLQiIby',
            'name' => 'Samuel Panjaitan',
            'username' => '2324307086',
            'password' => '$2y$10$8AQZymF84KQ52KNWRZXIqO/O/qNoBUNBquYTJWcm9zOT8WjGI9Qr6',
            'last_login' => '2022-08-13',
            'created_at' => '2022-08-13 01:05:33',
            'updated_at' => '2022-08-13 01:07:22',
        ])->assignRole('Siswa SMP');

        // 144
        User::create([
            'token' => 'OB6lG730p0LkN7qpofeL',
            'name' => 'Caitlin Lakeisha',
            'username' => '2324307087',
            'password' => '$2y$10$LMd9VK3UMf6zdF5b7rP3XeUBfvdNlet79Oz3XPurkpcnbn0YbO5n.',
            'last_login' => '2022-08-14',
            'created_at' => '2022-08-14 10:02:51',
            'updated_at' => '2022-08-14 10:04:46',
        ])->assignRole('Siswa SMP');
    }
}
