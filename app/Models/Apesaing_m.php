<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Apesaing_m extends Model
    {
        use HasFactory;

        protected $table = "analisis_pesaing";
        protected $primaryKey = "id_user";
        public $timestamps = false;
        protected $fillable = [
            'strenght',
            'weakness',
            'opportunity',
            'threats',
            'product',
            'price',
            'place',
            'promotion',
            'people',
            'process',
            'physical_evidence',
            'performance',
            'partnership',
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
            // Rule untuk Strength
            function(&$facts, &$recommendations) {
                if (!empty($facts['strength'])) {
                    $recommendations[] = "Pesaing Anda memiliki keunggulan utama ({$facts['strength']}). Pertimbangkan strategi diferensiasi untuk bersaing.";
                }
            },

            // Rule untuk Weakness
            function(&$facts, &$recommendations) {
                if (!empty($facts['weakness'])) {
                    $recommendations[] = "Pesaing memiliki kelemahan ({$facts['weakness']}). Gunakan kesempatan ini untuk menonjolkan keunggulan bisnis Anda.";
                }
            },

            // Rule untuk Opportunity
            function(&$facts, &$recommendations) {
                if (!empty($facts['opportunity'])) {
                    $recommendations[] = "Peluang pasar tersedia ({$facts['opportunity']}). Tingkatkan usaha Anda untuk memanfaatkan peluang sebelum pesaing melakukannya.";
                }
            },

            // Rule untuk Threats
            function(&$facts, &$recommendations) {
                if (!empty($facts['threats'])) {
                    $recommendations[] = "Pesaing menghadapi ancaman ({$facts['threats']}). Manfaatkan posisi ini untuk mengungguli pesaing.";
                }
            },

            // Rule untuk Product
            function(&$facts, &$recommendations) {
                if (!empty($facts['product'])) {
                    $recommendations[] = "Pesaing menawarkan produk unggulan ({$facts['product']}). Tingkatkan inovasi pada produk Anda untuk memberikan nilai tambah.";
                }
            },

            // Rule untuk Price
            function(&$facts, &$recommendations) {
                if (!empty($facts['price'])) {
                    $recommendations[] = "Pesaing menawarkan harga kompetitif ({$facts['price']}). Pastikan strategi harga Anda memberikan nilai lebih kepada pelanggan.";
                }
            },

            // Rule untuk Place
            function(&$facts, &$recommendations) {
                if (!empty($facts['place'])) {
                    $recommendations[] = "Pesaing memiliki distribusi yang kuat di ({$facts['place']}). Fokus pada memperluas jangkauan distribusi Anda.";
                }
            },

            // Rule untuk Promotion
            function(&$facts, &$recommendations) {
                if (!empty($facts['promotion'])) {
                    $recommendations[] = "Strategi promosi pesaing ({$facts['promotion']}) efektif. Tinjau dan tingkatkan pendekatan pemasaran Anda.";
                }
            },

            // Rule untuk People
            function(&$facts, &$recommendations) {
                if (!empty($facts['people'])) {
                    $recommendations[] = "Pesaing memiliki tim yang kuat ({$facts['people']}). Perkuat tim Anda dengan pelatihan dan rekrutmen berkualitas.";
                }
            },

            // Rule untuk Process
            function(&$facts, &$recommendations) {
                if (!empty($facts['process'])) {
                    $recommendations[] = "Proses bisnis pesaing ({$facts['process']}) lebih efisien. Optimalkan proses internal Anda untuk bersaing.";
                }
            },

            // Rule untuk Physical Evidence
            function(&$facts, &$recommendations) {
                if (!empty($facts['physical_evidence'])) {
                    $recommendations[] = "Pesaing memiliki elemen bukti fisik yang kuat ({$facts['physical_evidence']}). Pastikan pengalaman pelanggan Anda lebih baik.";
                }
            },

            // Rule untuk Performance
            function(&$facts, &$recommendations) {
                if (!empty($facts['performance'])) {
                    $recommendations[] = "Kinerja pesaing ({$facts['performance']}) stabil. Tingkatkan efisiensi operasional Anda untuk bersaing.";
                }
            },

            // Rule untuk Partnership
            function(&$facts, &$recommendations) {
                if (!empty($facts['partnership'])) {
                    $recommendations[] = "Pesaing memiliki kemitraan strategis ({$facts['partnership']}). Bangun hubungan kemitraan yang lebih kuat untuk meningkatkan daya saing.";
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