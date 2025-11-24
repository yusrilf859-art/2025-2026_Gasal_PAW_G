<?php
session_start();
$user = $_SESSION['user'] ?? null;
?>

<nav>
    <ul>
        <?php if (!$user): ?>
            <!-- Jika BELUM LOGIN -->
            <li><a href="login.php">Login</a></li>

        <?php else: ?>
            <!-- Jika SUDAH LOGIN -->
            <li><a href="home.php">Home</a></li>

            <?php if ($user['level'] == 1): ?>
                <!-- LEVEL 1 = OWNER -->
                <li>Data Master
                    <ul>
                        <li><a href="data_barang.php">Data Barang</a></li>
                        <li><a href="data_supplier.php">Data Supplier</a></li>
                        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
                        <li><a href="data_user.php">Data User</a></li>
                    </ul>
                </li>

                <li><a href="transaksi.php">Transaksi</a></li>
                <li><a href="laporan.php">Laporan</a></li>

            <?php elseif ($user['level'] == 2): ?>
                <!-- LEVEL 2 = KASIR -->
                <li><a href="transaksi.php">Transaksi</a></li>
                <li><a href="laporan.php">Laporan</a></li>
            <?php endif; ?>

            <!-- Nama User + Logout -->
            <li style="float:right;">
                <?= htmlspecialchars($user['name']) ?>
                <a href="logout.php">Logout</a>
            </li>

        <?php endif; ?>
    </ul>
</nav>
