# 📘 Aplikasi Manajemen Mahasiswa - RESTful API

Sistem backend **RESTful API** untuk aplikasi **Manajemen Mahasiswa**, sebuah platform sederhana yang memungkinkan user untuk mengelola data mahasiswa (student) secara aman dan efisien.

---

## 🧾 Tentang Proyek

Aplikasi ini dirancang menggunakan **Laravel** dan menggunakan **JWT Authentication** untuk mengamankan endpoint yang sensitif. Fitur utama mencakup:

- Autentikasi pengguna (register, login, logout, cek token).
- CRUD mahasiswa (create, read, update, delete).

---

## ⚙️ Fitur Utama

- 🔐 **Autentikasi Pengguna**
  - Register, Login, Logout, dan Cek Token.
- 🧑‍🎓 **Manajemen Mahasiswa (Student)**
  - Tambah, lihat, ubah, dan hapus data mahasiswa.

---

## 🧱 Struktur API

```
├── AUTH
│   ├── POST   /register     -> Register user
│   ├── POST   /login        -> Login user
│   ├── GET    /me           -> Ambil data user dari token
│   └── POST   /logout       -> Logout user
│
└── STUDENTS (Protected by JWT)
    ├── GET    /students              -> Lihat semua mahasiswa
    ├── GET    /students/{id}         -> Lihat detail mahasiswa
    ├── POST   /students              -> Tambah data mahasiswa
    ├── PUT    /students/{id}         -> Update data mahasiswa
    └── DELETE /students/{id}         -> Hapus data mahasiswa
```

---

## 🔐 Autentikasi

Gunakan JWT (JSON Web Token) setelah login untuk mengakses endpoint mahasiswa.

### 🔑 Login
```http
POST /login
Content-Type: application/json

{
  "email": "user@mail.com",
  "password": "password123"
}
```

### Response:
```json
{
  "message": "Login berhasil",
  "token": "eyJhbGciOiJIUzI1NiIsInR..."
}
```
Tambahkan token ini pada header setiap permintaan yang dilindungi:
```
Authorization: Bearer <token>
```

---

## 💡 Contoh Request - Tambah Mahasiswa
```http
POST /students
Authorization: Bearer <token>
Content-Type: application/json

{
  "name": "Budi Santoso",
  "email": "budi@student.com",
  "phone": "081234567890"
}
```

---

## 🖼️ Dokumentasi API (Postman)

### 1. 🔐 AUTH - Autentikasi
- Register
- Login
- Logout
- Token Check

📷 **Screenshot AUTH:**  
![AUTH](https://github.com/farul1/Belajar_API/blob/main/public/foto/auth.png)

---

### 2. 🧑‍🎓 STUDENT - Manajemen Mahasiswa
- List all Student  
- Get Student by ID  
- Create Student  
- Update Student  
- Delete Student  

📷 **Screenshot STUDENT:**  
![STUDENT](https://github.com/farul1/donasibarang-api/tree/main/public/foto/student.png)

---

## 👤 Developer

- **Nama**: Syafarul Priwantoro
- **NIM**: 1204220018
- **Universitas**: Telkom University Surabaya
- **Mata Kuliah**: INTEGRASI APLIKASI ENTERPRISE

