<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SdRegistrationUserSeeder extends Seeder
{
    public function run()
    {
        // 22
        User::create([
            'token' => 'vtp3wDE2AX3YIJssTcUA',
            'name' => 'Aras Ramaniya Mulyana',
            'username' => '2324201001',
            'password' => '$2y$10$f7VMXe0x8bSH5jvobifyv.TGzmqaN0.LfOIQmtsGhI5ugmWv65ItG',
            'created_at' => '2022-08-02 06:15:59',
            'updated_at' => '2022-08-03 14:46:06',
        ])->assignRole('Siswa SD');

        // 23
        User::create([
            'token' => 'eNs1F9gq4ktT9vlZ51Tv',
            'name' => 'Teresa Olivia Prameswari',
            'username' => '2324201002',
            'password' => '$2y$10$Bx077FH8NEK2TIMFZ1F1OuT71wrAGC5MB4EPkCLJjzBfrRlHcBqH.',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-02 06:17:54',
            'updated_at' => '2022-08-10 23:56:11',
        ])->assignRole('Siswa SD');

        // 24
        User::create([
            'token' => 'iXrT1pZ1zkiN5MF5EesF',
            'name' => 'Charlotte Heidi Djaya Siswaja',
            'username' => '2324201003',
            'password' => '$2y$10$f88C8WmOI47iIGo0Zwn/9.EhX0MbOIKXeSSdy.fT5he3Mh0zAGbtS',
            'created_at' => '2022-08-02 06:41:50',
            'updated_at' => '2022-08-02 06:41:50',
        ])->assignRole('Siswa SD');

        // 25
        User::create([
            'token' => 'uAcs4mcrWZZhmb6U6Ks4',
            'name' => 'Charlotte Heidi Djaya Siswaja',
            'username' => '2324201004',
            'password' => '$2y$10$nwTemCSPQTB4IvzYLU8K1uTQ8w05m5lmmlDe.3AN.kZCIpmHTdLlq',
            'created_at' => '2022-08-02 06:41:56',
            'updated_at' => '2022-08-02 06:41:56',
        ])->assignRole('Siswa SD');

        // 26
        User::create([
            'token' => 'NQCfg22DTE853EEI9PdS',
            'name' => 'Keenan Lemuel Noya Kurniadi',
            'username' => '2324201005',
            'password' => '$2y$10$NGKvjcAQbMV9MmUgAtTJvuMOZcZLR7l9ri76W3EBhXgOgTw743aJa',
            'created_at' => '2022-08-02 06:53:24',
            'updated_at' => '2022-08-02 06:55:23',
        ])->assignRole('Siswa SD');

        // 27
        User::create([
            'token' => 'ha6MN8hloxz61QbgoEGE',
            'name' => 'Sean Sebastianus',
            'username' => '2324201006',
            'password' => '$2y$10$jWsdRps5DRjVxdiOy5INLO1HFGhD0ZAWR4y3Sy0XqYjS.EWvXV5uW',
            'created_at' => '2022-08-02 06:54:51',
            'updated_at' => '2022-08-04 07:05:58',
        ])->assignRole('Siswa SD');

        // 28
        User::create([
            'token' => 'mOB1N9zlqoHi8fj7Teab',
            'name' => 'Richard Avsalom Napitupulu',
            'username' => '2324201007',
            'password' => '$2y$10$ewHlxMbXKUow.HJ9s3s5i.zBHPC6jbDRDFyaFMP6uoFTm.Z18L/FK',
            'created_at' => '2022-08-02 07:13:29',
            'updated_at' => '2022-08-02 11:38:52',
        ])->assignRole('Siswa SD');

        // 29
        User::create([
            'token' => 'J4xr5bh5idDCnWDjhQP3',
            'name' => 'Daviandra Mikail Kaivan',
            'username' => '2324201008',
            'password' => '$2y$10$lj2vd8u3Zp6.wl0sVHLYCuKhv.wtHvE4L.Q7j8vvTfjUuEKjquoIe',
            'created_at' => '2022-08-02 07:44:50',
            'updated_at' => '2022-08-03 02:11:04',
        ])->assignRole('Siswa SD');

        // 30
        User::create([
            'token' => 'CwsgonfQ24E1aPMEb7Mr',
            'name' => 'Gregorius Trikasih Bhadra',
            'username' => '2324201009',
            'password' => '$2y$10$X1H.HzD/2TJdw9B0feiOQ.7SZ7VxXZlsgN5Hs12Q7cfNn75k908w.',
            'created_at' => '2022-08-02 12:37:01',
            'updated_at' => '2022-08-02 12:40:55',
        ])->assignRole('Siswa SD');

        // 31
        User::create([
            'token' => 'uzdKC7OhTuBEXH2GN4Oi',
            'name' => 'Avellino Djenar Rasendriya',
            'username' => '2324201010',
            'password' => '$2y$10$ELyZW/Cu.dqscWkHKSOe/OeJmhaA8EUsTQiKTslc4S8q1ZrMCkzr.',
            'created_at' => '2022-08-02 23:32:52',
            'updated_at' => '2022-08-02 23:35:08',
        ])->assignRole('Siswa SD');

        // 32
        User::create([
            'token' => 'g3CEbSl25Sp0ZOFZ53a4',
            'name' => 'Nayla Zivana Tampubolon',
            'username' => '2324201011',
            'password' => '$2y$10$8uGFB6la5Vbmkp3rTRWDLO8ll/Y48W6VFvHJ9ydGkZqSYzxKwGgma',
            'created_at' => '2022-08-03 02:47:09',
            'updated_at' => '2022-08-03 02:52:06',
        ])->assignRole('Siswa SD');

        // 33
        User::create([
            'token' => '6zeZPHRQqsfyPOsrb4OU',
            'name' => 'Anna Caritas Illarya Anunu',
            'username' => '2324201012',
            'password' => '$2y$10$VwxcU2wF9h1wLiOUvLOnAOw4JkJo13U787gmjXHyElsgzUflOrf4i',
            'last_login' => '2022-08-12',
            'created_at' => '2022-08-03 03:44:46',
            'updated_at' => '2022-08-12 08:22:18',
        ])->assignRole('Siswa SD');

        // 34
        User::create([
            'token' => 'Ofp1sMHwRJFjaBi8S4ke',
            'name' => 'Lucassie Galen Indarto',
            'username' => '2324201013',
            'password' => '$2y$10$5c/nJuVsHV7UeIFuyvGN..ncJQNjenLlqHUl1HrMK7qPKRFaXewx6',
            'created_at' => '2022-08-03 05:20:02',
            'updated_at' => '2022-08-03 05:20:02',
        ])->assignRole('Siswa SD');

        // 35
        User::create([
            'token' => 'lPoVM3Xs1KTw3aZlk9qE',
            'name' => 'Mikaela Holy Sinta Putriditya',
            'username' => '2324201014',
            'password' => '$2y$10$mt1QSX6Jh6A577YaA.x3hOjxdawlYdbhPtfjoAKlhT4Pt/qZVbWci',
            'created_at' => '2022-08-03 09:11:30',
            'updated_at' => '2022-08-03 09:12:07',
        ])->assignRole('Siswa SD');

        // 36
        User::create([
            'token' => 'Z4Wffx4J7Ul7tFMRMwH2',
            'name' => 'Eowyn Felicity Nattaya Budiono',
            'username' => '2324201015',
            'password' => '$2y$10$CDuYCvwGKXimdE6wakaS0ezO9OnSC6xjpX71YzuonWeuQ/ditnKBi',
            'created_at' => '2022-08-03 10:12:48',
            'updated_at' => '2022-08-03 10:12:48',
        ])->assignRole('Siswa SD');

        // 37
        User::create([
            'token' => '61xRn93FsoBPyx4YqFKA',
            'name' => 'Johan Tristan Wattimena',
            'username' => '2324201016',
            'password' => '$2y$10$d2XNMSCDg4bdNr.hfXqMEuUM23sTzunTkkQWSxESLJ/D8oJfKD4Cq',
            'created_at' => '2022-08-05 01:13:48',
            'updated_at' => '2022-08-05 01:16:07',
        ])->assignRole('Siswa SD');

        // 38
        User::create([
            'token' => 'LMplhfmh7YN1NkMAof60',
            'name' => 'Yosua Kenzie Setiawan',
            'username' => '2324201017',
            'password' => '$2y$10$DzNCraJVAdWvqaISYz0FVuInwUKAHPRBladf/N4nh2BvoPlrpAvIi',
            'created_at' => '2022-08-05 01:27:42',
            'updated_at' => '2022-08-06 12:03:28',
        ])->assignRole('Siswa SD');

        // 39
        User::create([
            'token' => 'aYxLYLvqGjYzT6Bj7t2t',
            'name' => 'Stefhanie Hedy Putri Haryanto',
            'username' => '2324201018',
            'password' => '$2y$10$mI89hSD2h47BLHuXeZ9aCOYEZF2GmNdOhEpWM737/UbRhDPANVzcu',
            'created_at' => '2022-08-06 01:11:34',
            'updated_at' => '2022-08-08 05:14:23',
        ])->assignRole('Siswa SD');

        // 40
        User::create([
            'token' => 'ry6qaqz8Ci4BI1hHfnQm',
            'name' => 'Carlos Joseph Sinaga',
            'username' => '2324201019',
            'password' => '$2y$10$KavIIG.ze7mSAlj6f5NZkOwuSISZmj6ixCUzDRYH5WN2BLCQ1K8iG',
            'created_at' => '2022-08-06 05:08:16',
            'updated_at' => '2022-08-06 05:12:17',
        ])->assignRole('Siswa SD');

        // 41
        User::create([
            'token' => '4FgfFjTwk4V1DczXBHsh',
            'name' => 'Gabriel Mikaela Hambali',
            'username' => '2324201020',
            'password' => '$2y$10$riADUvJRB1lXE64VeLOib.2rVVYiEZ0JKgy3lKd5IAT.y7che6GMy',
            'created_at' => '2022-08-07 08:15:20',
            'updated_at' => '2022-08-07 08:17:09',
        ])->assignRole('Siswa SD');

        // 42
        User::create([
            'token' => 'WFQreIgxpZbfwYhEKP5I',
            'name' => 'Alicia Karen Santoso',
            'username' => '2324201021',
            'password' => '$2y$10$wpV3DjrE47txc4JcAvGnZOlaWqZTUEVdBEZcyXZut5tBKyBXxGE..',
            'created_at' => '2022-08-07 12:58:03',
            'updated_at' => '2022-08-07 12:59:48',
        ])->assignRole('Siswa SD');

        // 43
        User::create([
            'token' => 'Y2VOG9CUdxGTJvWi4D79',
            'name' => 'Gregorius Keenandra Singapraja',
            'username' => '2324201022',
            'password' => '$2y$10$FPOz73fNZsFrnIZlwPx5LepyZZctTGCM5At9T4IB6NLf24t7c5/ZS',
            'created_at' => '2022-08-08 01:18:18',
            'updated_at' => '2022-08-08 01:19:24',
        ])->assignRole('Siswa SD');

        // 44
        User::create([
            'token' => 'VkeZV5pnROJNUzCyfaeH',
            'name' => 'Mercy Shamarel Tampubolon',
            'username' => '2324201023',
            'password' => '$2y$10$RLhyobKKGmnQ7XsW8LILCuzJ3coJCLf.fa1r6w2bK9tHAZoZ4l2Bq',
            'created_at' => '2022-08-08 02:43:03',
            'updated_at' => '2022-08-08 02:45:29',
        ])->assignRole('Siswa SD');

        // 45
        User::create([
            'token' => 'J8UASnoYS6QpKpgtfW9o',
            'name' => 'Asdasdas',
            'username' => '2324201024',
            'password' => '$2y$10$kgONr3Rcmvw6GnTHR5ujCebYwtJWd6tNCRVRdmQTebOF6VbW1w3AS',
            'created_at' => '2022-08-08 08:11:58',
            'updated_at' => '2022-08-08 08:11:58',
        ])->assignRole('Siswa SD');

        // 46
        User::create([
            'token' => 'rTPg7o9EodJKokHkuQ8u',
            'name' => 'Maria Amaya Kamanesha',
            'username' => '2324201025',
            'password' => '$2y$10$kDDw1VF4lFbU.dl5WnK9IuXMsQIuIMohmEYwt5PttVFnvM4oXsk3q',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-08 08:23:52',
            'updated_at' => '2022-08-10 10:11:02',
        ])->assignRole('Siswa SD');

        // 47
        User::create([
            'token' => 'o3VS9KYgwYGSGjZXBEgZ',
            'name' => 'Irene Naraya Saputro',
            'username' => '2324201026',
            'password' => '$2y$10$5hABBEJ8fkxFWeybatK2du.GPBffIoH/nZ7UoeP/OPNmq6lJc3KDS',
            'created_at' => '2022-08-08 08:48:29',
            'updated_at' => '2022-08-08 08:51:43',
        ])->assignRole('Siswa SD');

        // 48
        User::create([
            'token' => '2CJfaGx8NoocyrtCbKSu',
            'name' => 'Anthony Jovito Christian',
            'username' => '2324201027',
            'password' => '$2y$10$0Wuo0HLoQ4cvtsDMvXaAaenob8CJWLRbnflC1Mkn2pNZ8POE.cfFy',
            'created_at' => '2022-08-08 12:00:23',
            'updated_at' => '2022-08-08 12:05:54',
        ])->assignRole('Siswa SD');

        // 49
        User::create([
            'token' => 'ddw2TxJ5Jz0dftU0MRQx',
            'name' => 'Asdsad',
            'username' => '2324201028',
            'password' => '$2y$10$jgVKEhEZPLVOPCSfvPk3Yu9mHRfLMlbIZyJP.TRODorVPM1lD85lS',
            'created_at' => '2022-08-09 23:54:23',
            'updated_at' => '2022-08-09 23:54:23',
        ])->assignRole('Siswa SD');

        // 50
        User::create([
            'token' => 'LQSRGO85Oy9y3LKO5wVw',
            'name' => 'Arnathan Fathir Diardwika',
            'username' => '2324201029',
            'password' => '$2y$10$8rtOV620/4OuffStIDeIc.Tys2.6qNjAsb/byUtcMpjtc8TqK.zYy',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-10 00:02:48',
            'updated_at' => '2022-08-10 01:08:06',
        ])->assignRole('Siswa SD');

        // 51
        User::create([
            'token' => 'yQqvjfEkK8leEwmv5r1r',
            'name' => 'Mattea Kireina Indriani',
            'username' => '2324201030',
            'password' => '$2y$10$NmIm.pYUpoLZkE3kVhWtnOGQguxzUzQa8zcnBHESZaotS5qX/LECu',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-10 08:52:26',
            'updated_at' => '2022-08-10 12:54:27',
        ])->assignRole('Siswa SD');

        // 52
        User::create([
            'token' => 'K7Vkj5dCSqMwsRA2jeLV',
            'name' => 'Angelica Grace Revauli',
            'username' => '2324201031',
            'password' => '$2y$10$IHAACoDFT69qxIqPjnG1WORPCVVBoYv5yNTNholwxJXJAIuohS8HS',
            'last_login' => '2022-08-10',
            'created_at' => '2022-08-10 10:45:42',
            'updated_at' => '2022-08-10 10:47:13',
        ])->assignRole('Siswa SD');

        // 53
        User::create([
            'token' => 'eIYNGsCIYVN6ulbCT4Z5',
            'name' => 'Aurelia Nadeline Maheswari',
            'username' => '2324201032',
            'password' => '$2y$10$WZrBGRTG9ZKxug.AhMubyOCpB.ZYThc2Y5U4TH2F2fTR287eteUNW',
            'last_login' => '2022-08-14',
            'created_at' => '2022-08-11 00:32:28',
            'updated_at' => '2022-08-14 13:51:11',
        ])->assignRole('Siswa SD');

        // 54
        User::create([
            'token' => 'Ckj5bEoqen86rL5KZS9Q',
            'name' => 'Nikolas Habel Hadibarata',
            'username' => '2324201033',
            'password' => '$2y$10$BXYBmnHXP2wJMDVpJvXS9.jcU7XW/gbfQrTb266tBM2zFJFQqZWVK',
            'last_login' => '2022-08-12',
            'created_at' => '2022-08-12 01:22:06',
            'updated_at' => '2022-08-12 01:24:19',
        ])->assignRole('Siswa SD');

        // 55
        User::create([
            'token' => 'zVaDvxKGzCFS1kujzfMj',
            'name' => 'Isadora Patricia Siahaan',
            'username' => '2324201034',
            'password' => '$2y$10$WzIi9jYzMvvqMsHwOy9uFeil8cADi2mQtMSwaZhEevDqy2./Ip7Ty',
            'created_at' => '2022-08-12 04:50:56',
            'updated_at' => '2022-08-12 04:50:56',
        ])->assignRole('Siswa SD');

        // 56
        User::create([
            'token' => 'iroKxo1mbVH5187yHnmv',
            'name' => 'Isadora Patricia Siahaan',
            'username' => '2324201035',
            'password' => '$2y$10$n0wKJvX2uae/Cy.G9dKOwu3JLFyto9/nMDv6FJlY./P7EiYH/paii',
            'created_at' => '2022-08-12 04:50:59',
            'updated_at' => '2022-08-12 04:50:59',
        ])->assignRole('Siswa SD');

        // 57
        User::create([
            'token' => 'HSIxJFOVoXF1YS7sN2Ww',
            'name' => 'Misericordiae Eksha Vidya Pramodana',
            'username' => '2324201036',
            'password' => '$2y$10$1xyTtEErXzIl6nnOCICfIuXooBvt0aO8Zfwbjmfyx7uYaOngs8m7W',
            'last_login' => '2022-08-13',
            'created_at' => '2022-08-13 10:19:35',
            'updated_at' => '2022-08-13 10:21:27',
        ])->assignRole('Siswa SD');
    }
}
