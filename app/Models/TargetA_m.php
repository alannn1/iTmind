<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class TargetA_m extends Model
    {
        use HasFactory;

        protected $table = "target_audience";
        protected $primaryKey = "id_user";
        public $timestamps = false;
        protected $fillable = [
            'jk',
            'umur',
            'lokasi',
            'edukasi',
            'penghasilan',
            'pekerjaan',
            'kegiatan',
            'brand_fav',
            'problem',
        ];
    
    protected static function getFillableFields()
    {
        return(new static)->getFillable();
    }
    function get_record($criteria='')
    {
        $result = self::select('*')
        ->when($criteria, function($query, $criteria){
            return $query->where('id_user', $criteria);
        })
        ->get();
        return $result;
    }
    public static function insert_record($request)
    {
        $data = [];
        foreach(self::getFillableFields() as $fields)
        {
            $data[$fields] = $request->input($fields) ?? null;
        }
        return $data;
    }
    function edit_record($id, $data)
    {
        $result = self::where('id_user', $id)->update($data);
        return $result;
    }
    public static function update_record($request, $inputPesaing, $existingData=null)
    {
        $data = [];

        foreach($inputPesaing as $fields)
        {
            $data[$fields] = $request->input($fields) ?? ($existingData ? $existingData->$fields : null);
        }
        return $data;
    }
    public function delete_record()
    {
        $this->delete();
    }
    public function calculateComplete()
    {
        $fields = $this->getFillable;
        $filled = 0;

        foreach($fields as $field){
            if(!empty($this->{$field})){
                $filled++;
            }
        }
        return ($filled / count($fields)) * 100;
    }
    public static function evaluateRule($facts)
    {
        $recommendations = [];

        $rules = [
            // Rule untuk Jenis Kelamin
            function(&$facts, &$recommendations) {
                if (!empty($facts['jk'])) {
                    if (str_contains($facts['jk'], 'Laki-laki')) {
                        $recommendations[] = "Pertimbangkan strategi pemasaran yang sesuai dengan kebutuhan dan preferensi laki-laki, seperti memanfaatkan platform digital yang sering digunakan oleh segmen ini";
                    } elseif (str_contains($facts['jk'], 'Perempuan')) {
                        $recommendations[] = "Fokus pada pendekatan pemasaran yang sesuai dengan kebutuhan dan preferensi perempuan, seperti memperhatikan tren atau komunitas yang relevan";
                    }
                }
            },

            // Rule untuk Umur
            function(&$facts, &$recommendations) {
                if (!empty($facts['umur'])) {
                    if ($facts['umur'] <= 18) {
                        $recommendations[] = "Targetkan produk atau layanan yang relevan untuk remaja, seperti gaya hidup dan hiburan.";
                    } elseif ($facts['umur'] <= 35) {
                        $recommendations[] = "Fokus pada promosi digital untuk menarik perhatian generasi muda dan milenial.";
                    } elseif ($facts['umur'] > 35) {
                        $recommendations[] = "Sesuaikan strategi pemasaran dengan kebutuhan keluarga atau profesional.";
                    }
                }
            },

            // Rule untuk Lokasi
            function(&$facts, &$recommendations) {
                if (!empty($facts['lokasi'])) {
                    if (str_contains($facts['lokasi'], 'kota')) {
                        $recommendations[] = "Fokus pada pemasaran online untuk menjangkau pelanggan di daerah perkotaan.";
                    } elseif (str_contains($facts['lokasi'], 'desa')) {
                        $recommendations[] = "Pertimbangkan strategi pemasaran langsung atau offline untuk menjangkau pelanggan di daerah pedesaan.";
                    }
                }
            },

            // Rule untuk Edukasi
            function(&$facts, &$recommendations) {
                if (!empty($facts['edukasi'])) {
                    if (str_contains($facts['edukasi'], 'SMA')) {
                        $recommendations[] = "Tawarkan produk atau layanan yang terjangkau dan relevan untuk pelajar atau pekerja muda.";
                    } elseif (str_contains($facts['edukasi'], 'S1') || str_contains($facts['edukasi'], 'S2')) {
                        $recommendations[] = "Fokus pada produk premium atau layanan yang membutuhkan tingkat edukasi lebih tinggi.";
                    }
                }
            },

            // Rule untuk Penghasilan
            function(&$facts, &$recommendations) {
                if (!empty($facts['penghasilan'])) {
                    if ($facts['penghasilan'] < 3000000) {
                        $recommendations[] = "Tawarkan produk dengan harga terjangkau atau program diskon.";
                    } elseif ($facts['penghasilan'] >= 3000000 && $facts['penghasilan'] <= 7000000) {
                        $recommendations[] = "Fokus pada produk kelas menengah dengan nilai lebih.";
                    } elseif ($facts['penghasilan'] > 7000000) {
                        $recommendations[] = "Tawarkan produk premium atau eksklusif.";
                    }
                }
            },

            // Rule untuk Pekerjaan
            function(&$facts, &$recommendations) {
                if (!empty($facts['pekerjaan'])) {
                    if (str_contains($facts['pekerjaan'], 'karyawan')) {
                        $recommendations[] = "Fokus pada produk yang menunjang produktivitas atau gaya hidup profesional.";
                    } elseif (str_contains($facts['pekerjaan'], 'wirausaha')) {
                        $recommendations[] = "Tawarkan produk yang mendukung pengembangan usaha mereka.";
                    } elseif (str_contains($facts['pekerjaan'], 'pelajar')) {
                        $recommendations[] = "Fokus pada produk edukasi atau teknologi yang relevan untuk pelajar.";
                    }
                }
            },

            // Rule untuk Kegiatan
            function(&$facts, &$recommendations) {
                if (!empty($facts['kegiatan'])) {
                    if (str_contains($facts['kegiatan'], 'olahraga')) {
                        $recommendations[] = "Promosikan produk kesehatan atau kebugaran.";
                    } elseif (str_contains($facts['kegiatan'], 'bermain game')) {
                        $recommendations[] = "Fokus pada produk teknologi atau perangkat gaming.";
                    } elseif (str_contains($facts['kegiatan'], 'belajar')) {
                        $recommendations[] = "Tawarkan kursus online atau buku-buku edukatif.";
                    }
                }
            },

            // Rule untuk Brand Favorit
            function(&$facts, &$recommendations) {
                if (!empty($facts['brand_fav'])) {
                    $recommendations[] = "Pelajari strategi brand favorit mereka ({$facts['brand_fav']}) dan terapkan ke produk Anda.";
                }
            },

            // Rule untuk Problem
            function(&$facts, &$recommendations) {
                if (!empty($facts['problem'])) {
                    $recommendations[] = "Pahami masalah utama pelanggan ({$facts['problem']}) dan pastikan produk Anda menjadi solusi.";
                }
            },
        ];

        // Eksekusi semua aturan
        foreach ($rules as $rule) {
            $rule($facts, $recommendations);
        }

        return $recommendations;
    }

}