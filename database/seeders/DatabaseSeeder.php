<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cabub;
use App\Models\Cagub;
use App\Models\Caleg;
use App\Models\Capres;
use App\Models\Desa;
use App\Models\Dpd;
use App\Models\Kecamatan;
use App\Models\Partai;
use App\Models\Tps;
use App\Models\Dapil;
use App\Models\Dekela;
use App\Models\Kelana;
use App\Models\Tahun;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'diskominfo',
            'desa_id' => '0',
            'email' => 'admin',
            'hp' => '-',
            'role' => 'administrator',
            'password' => Hash::make('admin'),
        ]);


        $kecamatan = array(
            "Babadan" => array("Babadan", "Bareng", "Cekok", "Gupolo", "Japan", "Kadipaten", "Kertosari", "Lembah", "Ngunut", "Patihan Wetan", "Polorejo", "Pondok", "Purwosari", "Sukosari", "Trisono"),
            "Badegan" => array("Badegan", "Bandaralim", "Biting", "Dayakan", "Kapuran", "Karangan", "Karangjoho", "Tanjunggunung", "Tanjungrejo", "Watubonang"),
            "Balong" => array("Bajang", "Balong", "Bulak", "Bulukidul", "Dadapan", "Jalen", "Karangan", "Karangmojo", "Karangpatihan", "Muneng", "Ngampel", "Ngendut", "Ngraket", "Ngumpul", "Pandak", "Purworejo", "Sedarat", "Singkil", "Sumberejo", "Tatung"),
            "Bungkal" => array("Bancar", "Bedikulon", "Bediwetan", "Bekare", "Belang", "Bungkal", "Bungu", "Kalisat", "Ketonggo", "Koripan", "Kunti", "Kupuk", "Kwajon", "Munggu", "Nambak", "Padas", "Pager", "Pelem", "Sambilawang"),
            "Jambon" => array("Blembem", "Bringinan", "Bulu Lor", "Jambon", "Jonggol", "Karanglo Kidul", "Krebet", "Menang", "Poko", "Pulosari", "Sendang", "Sidoharjo", "Srandil"),
            "Jenangan" => array("Jenangan", "Jimbe", "Kemiri", "Mrican", "Nglayang", "Ngrupit", "Panjeng", "Paringan", "Pintu", "Plalangan", "Sedah", "Semanding", "Setono", "Singosaren", "Sraten", "Tanjungsari", "Wates"),
            "Jetis" => array("Coper", "Jetis", "Josari", "Karanggebang", "Kradenan", "Kutukulon", "Kutuwetan", "Mojomati", "Mojorejo", "Ngasinan", "Tegalsari", "Turi", "Winong", "Wonoketro"),
            "Kauman" => array("Bringin", "Carat", "Ciluk", "Gabel", "Kauman", "Maron", "Nglarangan", "Ngrandu", "Nongkodono", "Pengkol", "Plosojenar", "Semanding", "Somoroto", "Sukosari", "Tegalombo", "Tosanan"),
            "Mlarak" => array("Bajang", "Candi", "Gandu", "Gontor", "Jabung", "Joresan", "Kaponan", "Mlarak", "Ngrukem", "Nglumpang", "Serangan", "Siwalan", "Suren", "Totokan", "Tugu"),
            "Ngebel" => array("Gondowido", "Ngebel", "Ngrogung", "Pupus", "Sahang", "Sempu", "Talun", "Wagirlor"),
            "Ngrayun" => array("Baosankidul", "Baosanlor", "Binade", "Cepoko", "Gedangan", "Mrayan", "Ngrayun", "Selur", "Sendang", "Temon", "Wonodadi"),
            "Ponorogo" => array("Bangunsari", "Banyudono", "Beduri", "Brotonegaran", "Cokromenggalan", "Jingglong", "Kauman", "Keniten", "Kepatihan", "Mangkujayan", "Nologaten", "Paju", "Pakunden", "Pinggirsari", "Purbosuman", "Surodikraman", "Tamanarum", "Tambakbayan", "Tonatan"),
            "Pudak" => array("Banjarjo", "Bareng", "Krisik", "Pudakkulon", "Pudakwetan", "Tambang"),
            "Pulung" => array("Banaran", "Bedrug", "Bekiring", "Karangpatihan", "Kesugihan", "Munggung", "Patik", "Plunturan", "Pomahan", "Pulung", "Pulung Merdiko", "Serag", "Sidoharjo", "Singgahan", "Tegalrejo", "Wagirkidul", "Wayang", "Wotan"),
            "Sambit" => array("Bancangan", "Bangsalan", "Bedingin", "Besuki", "Bulu", "Campurejo", "Campursari", "Gajah", "Jrakah", "Kemuning", "Maguwan", "Ngadisanan", "Nglewan", "Sambit", "Wilangan", "Wringinanom"),
            "Sampung" => array("Carangrejo", "Gelangkulon", "Glinggang", "Jenangan", "Karangwaluh", "Kunti", "Nglurup", "Pagerukir", "Pohijo", "Ringinputih", "Sampung", "Tulung"),
            "Sawoo" => array("Bondrang", "Grogol", "Ketro", "Kori", "Ngindeng", "Pangkal", "Prayungan", "Sawoo", "Sriti", "Temon", "Tempuran", "Tugurejo", "Tumpakpelem", "Tumpuk"),
            "Siman" => array("Beton", "Brahu", "Demangan", "Jarak", "Kepuhrubuh", "Madusari", "Mangunsuman", "Manuk", "Ngabar", "Patihan Kidul", "Pijeran", "Ronosentanan", "Ronowijayan", "Sawuh", "Sekaran", "Siman", "Tajug", "Tranjang"),
            "Slahung" => array("Broto", "Caluk", "Crabak", "Duri", "Galak", "Gombang", "Gundik", "Janti", "Jebeng", "Kambeng", "Menggare", "Mojopitu", "Nailan", "Ngilo-ilo", "Ngloning", "Plancungan", "Senepo", "Simo", "Slahung", "Truneng", "Tugurejo", "Wates"),
            "Sooko" => array("Bedoho", "Jurug", "Klepu", "Ngadirojo", "Sooko", "Suru"),
            "Sukorejo" => array("Bangunrejo", "Gandukepuh", "Gegeran", "Gelanglor", "Golan", "Kalimalang", "Karanglolor", "Kedungbanteng", "Kranggan", "Lengkong", "Morosari", "Nambangrejo", "Nampan", "Prajegan", "Serangan", "Sidorejo", "Sragi", "Sukorejo")
        );

        foreach ($kecamatan as $nama_kec => $array_desa) {
            $post = Kecamatan::create([
                'title' => $nama_kec,
            ]);
            User::create([
                'name' => "Kecamatan " . $nama_kec,
                'desa_id' => $post->id,
                'email' => str_replace(" ", "", strtolower($nama_kec)),
                'hp' => '-',
                'role' => 'kecamatan',
                'password' => Hash::make(str_replace(" ", "", (strtolower($nama_kec)))),
            ]);
            foreach ($array_desa as $nama_desa) {
                $desa = Desa::create([
                    'kecamatan_id' => $post->id,
                    'title' => $nama_desa,
                ]);
                User::create([
                    'name' => "Desa " . $desa->title,
                    'desa_id' => $desa->id,
                    'email' => str_replace(" ", "", (strtolower($desa->title) . "." . strtolower($nama_kec))),
                    'hp' => '-',
                    'role' => 'desa',
                    'password' => Hash::make(str_replace(" ", "", (strtolower($nama_kec) . "." . strtolower($desa->title)))),
                ]);
            }
        }
        $tahun = array("2023", "2024");
        foreach ($tahun as $th) {
            $save_tahun = Tahun::create([
                'tahun' => $th,
                'status' => 0
            ]);
            $kelana = array(
                "SK Forum Anak",
                "Sk Kelompok Olga, dan  kesenian anak. Foto²,buku absensi kegiatan.",
                "SOP/Sosialisasi  pencegahan dan respon cepat penanganan kekerasan pada anak.",
                "Data Kepemilikan Akte Kelahiran.",
                "Data Perkawinan Anak",
                "Data anak gizi buruk, gizi kurang & gizi lebih",
                "Data anak stunting",
                "SK Ruang baca layak anak/ILA, buku tamu, notulen , foto ruangan tsb terutama bila ada pengunjungnya.",
                "SK layanan konsultasi keluarga berfungsi baik,  buku tamu, buku notulen , foto² konsultasi keluarga.",
                "Data anak Pendidikan formal dan non formal",
                "SK KTR, papan nama , foto.",
                "SK Ruang bermain ramah anak, buku tamu , notulen , foto²",
                "Buku profil anak kecamatan ."
            );
            foreach ($kelana as $kelana) {
                Kelana::create([
                    'judul' => $kelana,
                    'tahun_id' => $save_tahun->id,
                ]);
            }
            $dekela = array(
                "Ponorogo dalam angka (sudah terpenuhi)",
                "Perdes/perkades /kebijakan kelurahan.",
                "DPA untuk perlindungan dan pemenuhan hak anak ttd kades/lurah.",
                "SK Forum Anak Kecamatan.",
                "SK kelompok olahraga anak/kesenian anak. Foto-foto kegiatan.",
                "Data Kepemilikan akte kelahiran lebih dari 90%.",
                "Data perkawinan anak.",
                "Data anak gizi buruk.",
                "Gizi kurang.",
                "Gizi lebih.",
                "Stunting.",
                "Data anak mendapatkan pendidikan formal dan Non formal.",
                "SK Ruang baca anak, foto-foto nya, buku notulen , buku tamu.",
                "SK konsultasi keluarga misal SAPA, BKB, BKR",
                "SK KTR , papan, foto-foto.",
                "Data desa/Kel punya PAUD-HI.",
                "SK Taman/Ruang  Bermain Bagi Anak dan foto2nya.",
                "SK PATBM",
                "Buku profil anak desa/Kel.",
                "Data pekerja anak.",
                "SOP atau Sosialisasi  pencegahan pekerja anak."

            );
            foreach ($dekela as $dekela) {
                Dekela::create([
                    'judul' => $dekela,
                    'tahun_id' => $save_tahun->id,
                ]);
            }
        }
    }
}
