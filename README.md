## How To Running ?

1. Clone this repo

```bash
    git clone https://github.com/komporbakar/technical-test-webdev.git
```

2. Open this file

```bash
    cd technical-test-webdev
```

3. Migrate Database

```bash
    php artisan migrate --seed
```

4. Running Laravel

```bash
    php artisan serve & npm run dev
```

5. Register

```bash
    http://127.0.0.1:8000/register
```

## Validation

Terdapat Validasi pada Parameter

-   Nama Barang
-   Kode Satuan
-   Jumlah
    Apabila tidak sesuai rules maka akan dikembalikan create dengan memberi pesan errornya
