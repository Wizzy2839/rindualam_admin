# 🚀 Panduan Deploy Laravel ke InfinityFree

## Persiapan di Komputer Lokal

### 1. Build Asset Vite
```bash
npm install
npm run build
```

### 2. Export Database
Buka **phpMyAdmin** (http://localhost/phpmyadmin) → pilih database `rindualam_db`:
- Klik **Export** → Format: **SQL** → **Go**
- Simpan file `.sql`

### 3. Pindahkan Gambar (Jika Ada)
Jika sudah ada gambar yang di-upload sebelumnya:
```
Salin isi:  storage/app/public/  →  public/uploads/
```

### 4. Buat File ZIP
Klik kanan folder project → **Compress to ZIP**, tapi **JANGAN** masukkan:
- `node_modules/`
- `.git/`

---

## Setup di InfinityFree

### 5. Buat Akun, Website & Database MySQL
1. Daftar di [infinityfree.com](https://www.infinityfree.com/)
2. Buat akun hosting baru
3. Buat database MySQL → catat: **Host**, **DB Name**, **Username**, **Password**

### 6. Import Database
1. Di panel → **MySQL Databases** → klik **phpMyAdmin**
2. Pilih database → tab **Import** → upload file `.sql`

---

## Upload File

### 7. Upload via File Manager (TERCEPAT!)
1. Di panel InfinityFree → **Control Panel** → **Online File Manager**
2. Masuk ke folder **`htdocs/`**
3. **Hapus** file bawaan di `htdocs/` (contoh: `index2.html`)
4. Klik **Upload** → pilih file `.zip` project kamu
5. Setelah upload selesai → klik kanan file `.zip` → **Extract**
6. Jika file ter-extract ke subfolder (misal `htdocs/rindualam_admin/`), **pindahkan semua isinya** ke `htdocs/` langsung

### 8. Struktur yang Benar di `htdocs/`
```
htdocs/
├── .htaccess          ← redirect ke public/ (FILE BARU dari root project)
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env               ← buat manual (lihat langkah 9)
│
└── public/
    ├── .htaccess      ← htaccess Laravel
    ├── index.php
    ├── build/
    ├── asset/
    └── uploads/       ← folder gambar
```

> ⚠️ **Penting**: File `.htaccess` di root `htdocs/` akan otomatis me-redirect semua request ke folder `public/`. Jadi `index.php` di `public/` TIDAK perlu diedit.

### 9. Buat File `.env`
Buat file `.env` di `htdocs/` (sejajar dengan `app/`, `config/`, dll.) dengan isi:

```env
APP_NAME="Rindu Alam"
APP_ENV=production
APP_KEY=base64:i+7jH2vKrbqwNCAakS1URbFcSwAx55STZQUEam6Jy1k=
APP_DEBUG=false
APP_URL=https://DOMAIN-KAMU.rf.gd

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US
APP_MAINTENANCE_DRIVER=file
BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=sql211.infinityfree.com
DB_PORT=3306
DB_DATABASE=if0_41250811_rindualam
DB_USERNAME=if0_41250811
DB_PASSWORD=rindualam123

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
CACHE_STORE=file
MAIL_MAILER=log
VITE_APP_NAME="Rindu Alam"
```

> ⚠️ Ganti `DOMAIN-KAMU` dengan domain InfinityFree kamu.

### 10. Set Permission
Di File Manager, klik kanan folder `storage/` → **Permissions** → set **755** (recursive).

---

## Troubleshooting

| Masalah | Solusi |
|---|---|
| **500 Internal Server Error** | Set `APP_DEBUG=true` sementara untuk lihat error |
| **Gambar tidak muncul** | Pastikan folder `htdocs/public/uploads/` terisi gambar |
| **CSRF Token Mismatch** | Pastikan `storage/framework/sessions/` writable (755) |
| **Class not found** | Pastikan folder `vendor/` terupload lengkap |
| **Halaman 404** | Pastikan kedua `.htaccess` ada (root + public) |
