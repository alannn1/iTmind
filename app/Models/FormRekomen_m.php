<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormRekomen_m extends Model
{
    use HasFactory;

    protected $table = "form_rekomen";
        protected $primaryKey = "id_user";
        protected $fillable = [
            'logo',
            'nama',
            'nama_usaha',
            'jenis',
            'kategori',
            'tahun_berdiri',
            'produk_jasa',
            'website',
            'sosmed',
            'shopee',
            'omzet',
            'wa_bisnis',
            'maps',
        ];
        protected $casts = [
            'sosmed' => 'array',
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
    public static function evaluateRules($facts)
    {
    $recommendations = [];

    $rules = [
        function (&$facts, &$recommendations) {
            if ($facts['jenis'] === 'produk') {
                $sosmed = explode(',', $facts['sosmed']);
                if (empty(array_intersect($sosmed, ['instagram', 'facebook', 'tiktok']))) {
                    $recommendations[] = "Disarankan untuk membuat akun sosial media untuk promosi produk Anda.";
                } else {
                    $recommendations[] = "Tingkatkan kualitas konten di sosial media Anda agar FYP.";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['kategori'] === 'kuliner') {
                if (empty($facts['website'])) {
                    $recommendations[] = "Buatlah website bisnis yang profesional untuk memperkenalkan bisnis Anda dan dilengkapi dengan sistem pemesanan.";
                } else {
                    $recommendations[] = "Fokus pada pemasaran digital.";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['jenis'] === 'jasa') {
                if (empty($facts['website'])) {
                    $recommendations[] = "Disarankan untuk membuat website untuk meningkatkan kredibilitas dan memperluas jangkauan bisnis Anda.";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['jenis'] === 'produk' && !empty($facts['website'])) {
                $recommendations[] = "Disarankan untuk menambah fitur e-commerce pada website Anda agar pembeli bisa membeli produk secara online.";
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['kategori'] === 'teknologi') {
                $sosmed = explode(',', $facts['sosmed']);
                if (!empty(array_intersect($sosmed, ['instagram', 'tiktok']))) {
                    $recommendations[] = "Fokus pada promosi produk Anda melalui konten edukasi dan tutorial di media sosial.";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['kategori'] === 'kuliner') {
                $sosmed = explode(',', $facts['sosmed']);
                if (!empty(array_intersect($sosmed, ['instagram', 'facebook', 'tiktok']))) {
                    $recommendations[] = "Manfaatkan media sosial Anda untuk promosi dan meningkatkan visibilitas.";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['kategori'] === 'fashion' && !empty($facts['website'])) {
                $recommendations[] = "Fokus pada SEO untuk meningkatkan visibilitas website dan menarik lebih banyak pengunjung ke bisnis fashion Anda.";
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['jenis'] === 'manufaktur') {
                $sosmed = explode(',', $facts['sosmed']);
                if (!empty(array_intersect($sosmed, ['instagram', 'facebook', 'tiktok']))) {
                    $recommendations[] = "Disarankan untuk memanfaatkan platform profesional seperti LinkedIn untuk memperkenalkan bisnis manufaktur Anda kepada klien dan mitra potensial.";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['jenis'] === 'produk' && !empty($facts['shopee'])) {
                $recommendations[] = "Manfaatkan fitur iklan Shopee untuk meningkatkan penjualan produk Anda dan menjangkau lebih banyak pembeli.";
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['kategori'] === 'kesehatan') {
                $recommendations[] = "Pastikan untuk memiliki sertifikasi yang valid dan perkuat kredibilitas dengan testimoni dari pelanggan yang puas.";
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['kategori'] === 'fashion') {
                $sosmed = explode(',', $facts['sosmed']);
                if (empty(array_intersect($sosmed, ['instagram', 'tiktok']))) {
                    $recommendations[] = "Disarankan untuk memulai akun Instagram untuk mempromosikan produk fashion Anda.";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if ($facts['kategori'] === 'kuliner' && !empty($facts['shopee'])) {
                $recommendations[] = "Perkenalkan menu khusus atau paket promo di Shopee untuk menarik lebih banyak pelanggan.";
            }
        },
        function (&$facts, &$recommendations) {
            $sosmed = explode(',', $facts['sosmed']);
            if (!empty($sosmed) && empty($facts['wa_bisnis'])) {
                $recommendations[] = "Disarankan untuk menggunakan WhatsApp Bisnis agar komunikasi dengan pelanggan lebih cepat dan efisien.";
            }
        },
        function (&$facts, &$recommendations) {
            if($facts['omzet'] === '1-2') {
                $sosmed = explode(',', $facts['sosmed']);
                if(empty($sosmed)) {
                    $recommendations[] = "Mulailah dengan membuat akun sosial media seperti Instagram atau TikTok untuk menjangkau lebih banyak pelanggan dengan biaya minimal";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if($facts['omzet'] === '1-2') {
                if($facts['kategori'] === 'kuliner') {
                    $recommendations[] = "Fokus pada menjual menu dengan bahan yang terjangkau tetapi tetap menarik perhatian pasar, seperti makanan kekinian";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if($facts['omzet'] === '2-3') {
                if($facts['jenis'] === 'produk') {
                    if(empty($facts['shopee'])) {
                        $recommendations[] = "Coba tawarkan produk Anda di platform e-commerce seperti Shopee atau Tokopedia untuk meningkatkan penjualan";
                    }
                }
            }
        },
        function (&$facts, &$recommendations) {
            if($facts['omzet'] === '3-4') {
                $sosmed = explode(',', $facts['sosmed']);
                if(!empty($sosmed)) {
                    $recommendations[] = "Tingkatkan kualitas konten sosial media dengan desain profesional dan jadwal posting yang konsisten untuk menjaga engagement";
                }
            }
        },
        function (&$facts, &$recommendations) {
            if($facts['omzet'] === '4-5') {
                if($facts['jenis'] === 'produk') {
                    if(!empty($facts['website'])) {
                        $recommendations[] = "Pertimbangkan untuk berinvestasi dalam strategi pemasaran digital seperti SEO atau iklan berbayar untuk memperluas jangkauan pasar";
                    }
                }
            }
        },
    ];

    foreach ($rules as $rule) {
        $rule($facts, $recommendations);
    }

    return $recommendations;
}
}
