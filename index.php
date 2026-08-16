<?php
// index.php
// Diperbarui: menambahkan struktur halaman, informasi kelompok, waktu server, kutipan acak, dan formulir contoh.

date_default_timezone_set('Asia/Jakarta');
$now = date('l, d F Y H:i:s');
$quotes = [
    "Kerja keras mengalahkan bakat ketika bakat tidak bekerja keras.",
    "Belajar hari ini, memimpin esok hari.",
    "Kesalahan adalah guru terbaik jika kita mau belajar dari mereka.",
    "Mulai dari yang kecil, capai yang besar."
];
$quote = $quotes[array_rand($quotes)];

// Tangani formulir kontak sederhana (hanya untuk demo)
$sent = false;
$name = '';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $message = trim($_POST['message'] ?? '');
    if ($name !== '' || $message !== '') {
        // Di aplikasi nyata: simpan ke database atau kirim email.
        $sent = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Situs Kelompok 2</title>
  <style>
    body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; max-width:900px; margin:24px auto; padding:0 16px; color:#222 }
    header, footer { text-align:center; }
    header h1 { margin:8px 0 0; }
    .card { border:1px solid #e6e6e6; padding:16px; border-radius:8px; margin:16px 0; background:#fff }
    .grid { display:grid; grid-template-columns:1fr 1fr; gap:12px }
    @media (max-width:600px) { .grid { grid-template-columns:1fr } }
    label { display:block; margin-top:8px }
    input[type=text], textarea { width:100%; padding:8px; margin-top:4px; border:1px solid #ccc; border-radius:4px }
    button { margin-top:8px; padding:8px 12px; border:0; background:#0069d9; color:#fff; border-radius:4px }
  </style>
</head>
<body>
  <header>
    <h1>Selamat datang di Situs Kami</h1>
    <p>Jawaban dari Kelompok 2 — Halaman contoh</p>
    <small>Waktu server: <?php echo htmlspecialchars($now); ?></small>
  </header>

  <main>
    <section class="card">
      <h2>Tentang Kami</h2>
      <p>Kami adalah Kelompok 2. Di halaman ini kami menampilkan contoh sederhana dengan PHP dan HTML.</p>
      <ul>
        <li>Nama Anggota 1: Alice</li>
        <li>Nama Anggota 2: Budi</li>
        <li>Nama Anggota 3: Citra</li>
      </ul>
    </section>

    <section class="card grid">
      <div>
        <h3>Kutipan Acak</h3>
        <blockquote><?php echo htmlspecialchars($quote); ?></blockquote>
      </div>
      <div>
        <h3>Fitur</h3>
        <ul>
          <li>Menampilkan waktu server</li>
          <li>Formulir kontak contoh</li>
          <li>Layout responsif sederhana</li>
        </ul>
      </div>
    </section>

    <section class="card">
      <h2>Kontak (contoh)</h2>
      <?php if ($sent): ?>
        <p style="color:green">Terima kasih, pesan Anda telah diterima (demo saja).</p>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Pesan:</strong> <?php echo nl2br(htmlspecialchars($message)); ?></p>
      <?php else: ?>
        <form method="post" action="">
          <label for="name">Nama</label>
          <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">

          <label for="message">Pesan</label>
          <textarea id="message" name="message" rows="4"><?php echo htmlspecialchars($message); ?></textarea>

          <button type="submit">Kirim</button>
        </form>
      <?php endif; ?>
    </section>

  </main>

  <footer>
    <p>© Kelompok 2 — Contoh dibuat untuk demonstrasi sederhana.</p>
  </footer>
</body>
</html>
