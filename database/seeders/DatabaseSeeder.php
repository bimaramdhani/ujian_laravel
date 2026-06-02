<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat User biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Buat data barang dummy
        $barangs = [
            ['kode_barang' => 'BRG001', 'nama_barang' => 'Laptop ASUS VivoBook', 'kategori' => 'Elektronik', 'jumlah_stok' => 25, 'harga' => 8500000, 'deskripsi' => 'Laptop ASUS VivoBook 14 inch, RAM 8GB, SSD 256GB'],
            ['kode_barang' => 'BRG002', 'nama_barang' => 'Mouse Logitech B100', 'kategori' => 'Aksesoris', 'jumlah_stok' => 50, 'harga' => 75000, 'deskripsi' => 'Mouse USB wired Logitech B100'],
            ['kode_barang' => 'BRG003', 'nama_barang' => 'Keyboard Mechanical', 'kategori' => 'Aksesoris', 'jumlah_stok' => 15, 'harga' => 350000, 'deskripsi' => 'Keyboard mechanical RGB backlight'],
            ['kode_barang' => 'BRG004', 'nama_barang' => 'Monitor LED 24 inch', 'kategori' => 'Elektronik', 'jumlah_stok' => 3, 'harga' => 2200000, 'deskripsi' => 'Monitor LED Full HD 24 inch'],
            ['kode_barang' => 'BRG005', 'nama_barang' => 'Kertas HVS A4', 'kategori' => 'ATK', 'jumlah_stok' => 100, 'harga' => 55000, 'deskripsi' => 'Kertas HVS A4 80gsm 1 rim'],
            ['kode_barang' => 'BRG006', 'nama_barang' => 'Tinta Printer Canon', 'kategori' => 'ATK', 'jumlah_stok' => 8, 'harga' => 125000, 'deskripsi' => 'Tinta printer Canon G-Series Black'],
            ['kode_barang' => 'BRG007', 'nama_barang' => 'Flashdisk 32GB', 'kategori' => 'Aksesoris', 'jumlah_stok' => 40, 'harga' => 85000, 'deskripsi' => 'Flashdisk USB 3.0 32GB'],
            ['kode_barang' => 'BRG008', 'nama_barang' => 'Headset Gaming', 'kategori' => 'Aksesoris', 'jumlah_stok' => 2, 'harga' => 450000, 'deskripsi' => 'Headset gaming dengan microphone'],
            ['kode_barang' => 'BRG009', 'nama_barang' => 'Webcam HD 1080p', 'kategori' => 'Elektronik', 'jumlah_stok' => 12, 'harga' => 380000, 'deskripsi' => 'Webcam Full HD 1080p autofocus'],
            ['kode_barang' => 'BRG010', 'nama_barang' => 'Kabel HDMI 2m', 'kategori' => 'Aksesoris', 'jumlah_stok' => 30, 'harga' => 45000, 'deskripsi' => 'Kabel HDMI 2.0 panjang 2 meter'],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
