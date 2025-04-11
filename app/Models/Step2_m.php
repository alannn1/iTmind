<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Step2_m extends Model
    {
        use HasFactory;

        protected $table = "step2";
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
    public static function update_record($request, $inputStep2, $existingData=null)
    {
        $data = [];

        foreach($inputStep2 as $fields)
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
    public static function evaluateRules($facts)
{
    $recommendations = [];

    $rules = [
        // Rule untuk Strength
        function(&$facts, &$recommendations) {
            if (!empty($facts['strength'])) {
                $recommendations[] = "Manfaatkan keunggulan utama Anda ({$facts['strength']}) untuk meningkatkan daya saing.";
            }
        },

        // Rule untuk Weakness
        function(&$facts, &$recommendations) {
            if (!empty($facts['weakness'])) {
                $recommendations[] = "Identifikasi langkah untuk mengatasi kelemahan utama Anda ({$facts['weakness']}).";
            }
        },

        // Rule untuk Opportunity
        function(&$facts, &$recommendations) {
            if (!empty($facts['opportunity'])) {
                $recommendations[] = "Manfaatkan peluang yang ada ({$facts['opportunity']}) untuk ekspansi bisnis.";
            }
        },

        // Rule untuk Threats
        function(&$facts, &$recommendations) {
            if (!empty($facts['threats'])) {
                $recommendations[] = "Siapkan strategi mitigasi untuk menghadapi ancaman ({$facts['threats']}).";
            }
        },

        // Rule untuk Product
        function(&$facts, &$recommendations) {
            if (!empty($facts['product'])) {
                $recommendations[] = "Fokus pada pengembangan produk unggulan Anda ({$facts['product']}) untuk memenuhi kebutuhan pelanggan.";
            }
        },

        // Rule untuk Price
        function(&$facts, &$recommendations) {
            if (!empty($facts['price'])) {
                $recommendations[] = "Pastikan harga ({$facts['price']}) kompetitif dan sesuai dengan nilai yang ditawarkan.";
            }
        },

        // Rule untuk Place
        function(&$facts, &$recommendations) {
            if (!empty($facts['place'])) {
                $recommendations[] = "Optimalkan distribusi di lokasi strategis ({$facts['place']}) untuk menjangkau lebih banyak pelanggan.";
            }
        },

        // Rule untuk Promotion
        function(&$facts, &$recommendations) {
            if (!empty($facts['promotion'])) {
                $recommendations[] = "Perkuat strategi promosi Anda ({$facts['promotion']}) untuk meningkatkan kesadaran pelanggan.";
            }
        },

        // Rule untuk People
        function(&$facts, &$recommendations) {
            if (!empty($facts['people'])) {
                $recommendations[] = "Pastikan tim Anda ({$facts['people']}) memiliki kompetensi yang mendukung tujuan bisnis.";
            }
        },

        // Rule untuk Process
        function(&$facts, &$recommendations) {
            if (!empty($facts['process'])) {
                $recommendations[] = "Optimalkan proses bisnis Anda ({$facts['process']}) untuk efisiensi yang lebih baik.";
            }
        },

        // Rule untuk Physical Evidence
        function(&$facts, &$recommendations) {
            if (!empty($facts['physical_evidence'])) {
                $recommendations[] = "Tingkatkan elemen bukti fisik ({$facts['physical_evidence']}) untuk memberikan pengalaman pelanggan yang lebih baik.";
            }
        },

        // Rule untuk Performance
        function(&$facts, &$recommendations) {
            if (!empty($facts['performance'])) {
                $recommendations[] = "Pastikan kinerja Anda ({$facts['performance']}) konsisten dan terus meningkat.";
            }
        },

        // Rule untuk Partnership
        function(&$facts, &$recommendations) {
            if (!empty($facts['partnership'])) {
                $recommendations[] = "Bangun kemitraan strategis ({$facts['partnership']}) untuk mendukung ekspansi bisnis.";
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