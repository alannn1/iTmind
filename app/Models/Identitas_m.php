<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Storage;

    class Identitas_m extends Model
    {
        use HasFactory;

        protected $table = "identitas";
        protected $primaryKey = "id_user";
        public $timestamps = false;
        protected $fillable = [
            'logo',
            'nama',
            'nama_usaha',
            'jenis',
            'tahun_berdiri',
            'produk_jasa',
            'website',
            'ig',
            'tiktok',
            'fb',
            'shopee',
            'trello',
            'lynk_id',
            'wa_bisnis',
            'maps',
        ];
    protected static function getFillableFields()
    {
        return (new static)->getFillable();
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

        foreach (self::getFillableFields() as $field) {
            if ($field === 'logo' && $request->hasFile($field)) {
                $file = $request->file($field);
                $path = $file->store($field, 'public');
                $data[$field] = basename($path);
            } else {
                $data[$field] = $request->input($field) ?? null;
            }
        }
        
        return $data;
    }
    function edit_record($id, $data)
    {
        $result = self::where('id_user', $id)->update($data);
        return $result;
    }
    public static function update_record($request, $inputIdentitas, $existingData = null)
    {
        $data = [];

        foreach ($inputIdentitas as $field) {
            if ($field === 'logo' && $request->hasFile($field)) {
                $file = $request->file($field);
                $path = $file->store($field, 'public');
                $data[$field] = basename($path);

                if ($existingData && $existingData->$field) {
                    Storage::delete('public/' . $existingData->$field);
                }
            } else {
                $data[$field] = $request->input($field) ?? ($existingData ? $existingData->$field : null);
            }
        }

        return $data;
    }
    public function delete_record()
    {
        $fieldsWithFiles = ['logo'];

        foreach ($fieldsWithFiles as $field) {
            if ($this->$field) {
                Storage::delete('public/' . $this->$field);
            }
        }

        $this->delete();
    }
    public static function evaluateRule($facts) 
    {
        $recommendations = [];

        $rules = [
            function(&$facts, &$recommendations) {
                if(empty($facts['logo'])) {
                    $recommendations[] = "Desain logo bisnis untuk memperkuat identitas visual dan menarik perhatian pelanggan";
                }
            },
            function(&$facts, &$recommendations) {
                if(isset($facts['tahun_berdiri']) && (date('Y') - $facts['tahun_berdiri']) < 1) {
                    $recommendations[] = "Fokus pada strategi pemasaran untuk membangun brand awareness di tahun pertama bisnis";
                }
            },
            function(&$facts, &$recommendations) {
                if(!empty($facts['produk_jasa']) && empty($facts['ig']) && empty($facts['tiktok']) && empty($facts['fb'])) {
                    $recommendations[] = "Buat akun media sosial (Instagram, TikTok, atau Facebook) untuk mempromosikan produk/jasa Anda";
                }
            },
            function(&$facts, &$recommendations) {
                if(
                    (!empty($facts['ig']) || !empty($facts['tiktok']) || !empty($facts['fb'])) && empty($facts['website'])
                    ) {
                        $recommendations[] = "Pertimbangkan untuk membuat website sebagai pusat informasi bisnis Anda";
                    }
            },
            function(&$facts, &$recommendations) {
                if(empty($facts['shopee']) && empty($facts['trello'])) {
                    $recommendations[] = "Manfaatkan Shopee untuk menjual produk Anda dan Trello untuk mengatur operasional bisnis secara efisien";
                }
            },
            function(&$facts, &$recommendations) {
                if(!empty($facts['produk_jasa']) && empty($facts['wa_bisnis'])) {
                    $recommendations[] = "Gunakan WhatsApp Bisnis untuk mempermudah komunikasi dengan pelanggan";
                }
            },
            function(&$facts, &$recommendations) {
                if (!empty($facts['maps'])) {
                    $recommendations[] = "Tambahkan lokasi bisnis Anda di Google Maps untuk memudahkan pelanggan menemukan lokasi Anda.";
                } elseif (empty($facts['maps'])) {
                    $recommendations[] = "Segera daftarkan bisnis Anda di Google Maps agar pelanggan dapat menemukan lokasi usaha Anda.";
                }
            },
    
            // Rule 8: Jika bisnis berbasis layanan tetapi belum ada Lynk.id
            function(&$facts, &$recommendations) {
                if (strpos(strtolower($facts['produk_jasa']), 'layanan') !== false && empty($facts['lynk_id'])) {
                    $recommendations[] = "Gunakan Lynk.id untuk memberikan akses mudah ke berbagai platform bisnis Anda dalam satu tautan.";
                }
            },
    
            // Rule 9: Jika TikTok dan Instagram tersedia tetapi belum memanfaatkan strategi konten
            function(&$facts, &$recommendations) {
                if (!empty($facts['ig']) && !empty($facts['tiktok'])) {
                    $recommendations[] = "Manfaatkan strategi konten seperti video storytelling atau edukasi di TikTok dan Instagram.";
                }
            },
    
            // Rule 10: Jika tahun berdiri lebih dari 3 tahun tetapi belum memiliki strategi diversifikasi
            function(&$facts, &$recommendations) {
                if (isset($facts['tahun_berdiri']) && (date('Y') - $facts['tahun_berdiri']) > 3) {
                    $recommendations[] = "Mulailah mempertimbangkan diversifikasi produk atau jasa untuk menjangkau pasar yang lebih luas.";
                }
            },
    
            // Rule 11: Jika bisnis hanya memiliki Shopee tanpa media sosial
            function(&$facts, &$recommendations) {
                if (!empty($facts['shopee']) && empty($facts['ig']) && empty($facts['tiktok']) && empty($facts['fb'])) {
                    $recommendations[] = "Gunakan media sosial untuk mengarahkan trafik ke toko Shopee Anda.";
                }
            },
    
            // Rule 12: Jika bisnis berbasis produk tetapi tidak memiliki TikTok
            function(&$facts, &$recommendations) {
                if (strpos(strtolower($facts['jenis']), 'produk') !== false && empty($facts['tiktok'])) {
                    $recommendations[] = "Buat akun TikTok dan manfaatkan tren untuk mempromosikan produk Anda.";
                }
            },
    
            // Rule 13: Jika bisnis berbasis jasa tetapi tidak memiliki website
            function(&$facts, &$recommendations) {
                if (strpos(strtolower($facts['jenis']), 'jasa') !== false && empty($facts['website'])) {
                    $recommendations[] = "Pertimbangkan membuat website untuk meningkatkan kredibilitas layanan Anda.";
                }
            },
    
            // Rule 14: Jika tidak ada nama usaha
            function(&$facts, &$recommendations) {
                if (empty($facts['nama_usaha'])) {
                    $recommendations[] = "Pilih nama usaha yang relevan dan mudah diingat untuk mencerminkan identitas bisnis Anda.";
                }
            },
    
            // Rule 15: Jika bisnis berbasis teknologi tetapi belum memiliki strategi pemasaran digital
            function(&$facts, &$recommendations) {
                if (strpos(strtolower($facts['produk_jasa']), 'teknologi') !== false && empty($facts['strategi_pemasaran'])) {
                    $recommendations[] = "Fokus pada pemasaran digital seperti SEO dan konten edukasi untuk menarik audiens teknologi.";
                }
            },
        ]; 
        foreach($rules as $rule) {
            $rule($facts, $recommendations);
        }

        return $recommendations;
    }
}