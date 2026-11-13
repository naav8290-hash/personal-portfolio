# Portofolio Vina Nuraini

Website portofolio pribadi **Vina Nuraini**, pelajar Rekayasa Perangkat Lunak (RPL) di SMKN 3 Banjar. Situs ini merangkum profil, proses belajar, keahlian, proyek, dan kanal kontak dalam satu halaman.

Dibangun dengan Laravel dan aset front-end statis yang ringan — tanpa framework JavaScript dan tanpa proses build untuk halaman utama.

## Teknologi

| Lapisan | Teknologi |
| --- | --- |
| Backend | PHP 8.3, Laravel 13 |
| Tampilan | Blade, CSS kustom, JavaScript vanilla |
| Aset | CSS/JS statis di `public/assets`, gambar WebP responsif |
| Database | SQLite (hanya untuk kebutuhan bawaan Laravel) |
| Pengujian | PHPUnit 12 |

## Fitur

- Halaman portofolio satu halaman dengan navigasi anchor dan penanda seksi aktif.
- Galeri proyek dengan dialog detail (`<dialog>`) yang aksesibel dan data dari konfigurasi.
- Menu seluler dengan focus trap, `inert`, dan dukungan keyboard.
- Formulir kontak yang memvalidasi input lalu menyiapkan pesan WhatsApp (tidak mengirim pesan otomatis).
- Dukungan `prefers-reduced-motion` dan tautan "lewati ke konten".
- SEO: meta Open Graph/Twitter Card, JSON-LD `Person`, `sitemap.xml`, `robots.txt`, dan halaman 404 kustom.
- Header keamanan: `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`, `Permissions-Policy`.
- Gambar responsif: varian WebP 480/900 px (potret) dan 640/1280 px (proyek).

## Struktur Penting

```
app/Http/Controllers/PortfolioController.php   # merakit data halaman + varian gambar
app/Http/Middleware/SecurityHeaders.php        # header keamanan respons
app/Support/helpers.php                         # helper versioned_asset() untuk cache busting
config/portfolio.php                           # seluruh konten: meta, nav, kontak, skills, journey, proyek
resources/views/portfolio.blade.php            # halaman utama
resources/views/partials/                      # bagian-bagian halaman
resources/views/errors/404.blade.php           # halaman 404 kustom
public/assets/css/                             # tokens, base, layout
public/assets/js/                              # interaksi situs & dialog proyek
public/assets/img/                             # gambar asli (PNG) + varian WebP
scripts/optimize-images.php                    # generator varian WebP responsif
tests/Feature/PortfolioTest.php                # pengujian halaman utama, sitemap, 404, header
```

## Menjalankan Secara Lokal

Prasyarat: PHP 8.3+, Composer, dan (opsional) Laragon untuk virtual host `profile.test`.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Buka `http://127.0.0.1:8000` (atau `http://profile.test` jika memakai Laragon).

> Halaman utama memakai aset statis di `public/assets`, jadi `npm install`/`npm run build` tidak diperlukan untuk melihat situs. Scaffold Vite/Tailwind bawaan Laravel tetap disimpan untuk pengembangan lanjutan.

## Hosting (Produksi)

Situs ini tidak memakai database, jadi cukup PHP 8.3+, Composer, dan web server yang document root-nya diarahkan ke folder `public/`.

1. Unggah proyek ke server (tanpa folder `node_modules`), lalu pasang dependensi produksi:

   ```bash
   composer install --no-dev --optimize-autoloader
   ```

2. Buat `.env` produksi:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Sesuaikan isinya:

   ```dotenv
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://domainkamu.com
   ```

3. Arahkan domain/subdomain ke folder `public/` (bukan root proyek). Jika panel hosting hanya memberi folder `public_html`, letakkan proyek di luar `public_html`, salin isi `public/` ke dalamnya, lalu sesuaikan path `require` di `index.php` agar menunjuk ke `vendor/autoload.php` proyek.

4. Pastikan folder `storage/` dan `bootstrap/cache/` dapat ditulis oleh web server (umumnya `755` untuk folder, `644` untuk file).

5. Simpan cache produksi:

   ```bash
   php artisan optimize
   ```

6. Aktifkan HTTPS di hosting, lalu pastikan `APP_URL` memakai `https://`. Periksa `https://domainkamu.com`, `/sitemap.xml`, dan `/robots.txt`.

Setelah mengubah `config/portfolio.php` di server, segarkan cache:

```bash
php artisan optimize:clear
```

`.env` tidak ikut diunggah ke repositori; file itu berisi `APP_KEY` dan konfigurasi server.

## Mengubah Konten

Semua teks dan data terpusat di [`config/portfolio.php`](config/portfolio.php):

- `meta` — judul, deskripsi, tanggal pembaruan (`updated`, dipakai `sitemap.xml`).
- `nav` — label dan urutan navigasi.
- `contact` — telepon, WhatsApp, Instagram, GitHub.
- `skills`, `journey`, `projects` — isi tiap seksi.

Setelah mengubah konfigurasi, bersihkan cache bila perlu:

```bash
php artisan config:clear
```

## Menambah atau Mengganti Gambar

1. Letakkan PNG baru di `public/assets/img/` (potret) atau `public/assets/img/projects/` (proyek).
2. Daftarkan path relatifnya di `config/portfolio.php` beserta `imageWidth`/`imageHeight`.
3. Buat varian WebP dengan skrip yang tersedia:

```bash
php scripts/optimize-images.php
```

Sesuaikan daftar `$sources` pada skrip jika nama file berubah. `PortfolioController` otomatis memakai varian WebP yang tersedia, dengan PNG asli sebagai fallback bila varian belum dibuat.

## Pengujian

```bash
php artisan test
```

## Lisensi

Kode aplikasi mengikuti lisensi MIT. Konten pribadi, foto, dan identitas di dalam situs tidak untuk digunakan ulang tanpa izin.
