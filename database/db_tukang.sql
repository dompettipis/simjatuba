-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 03:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tukang`
--

-- --------------------------------------------------------

--
-- Table structure for table `mandor`
--

CREATE TABLE `mandor` (
  `id_mandor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_mandor` varchar(200) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mandor`
--

INSERT INTO `mandor` (`id_mandor`, `id_user`, `nama_mandor`, `alamat`, `no_hp`, `deskripsi`) VALUES
(1, 7, 'asd', 'cilegon', '67777466464', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` char(11) NOT NULL,
  `id_mandor` char(11) NOT NULL,
  `tgl_pesanan` varchar(25) NOT NULL,
  `pesan` text NOT NULL,
  `acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_mandor`, `tgl_pesanan`, `pesan`, `acc`) VALUES
(1, 'P01', 'M01', '07 September 2020', 'ingin membuat rumah 2 tingkat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_pelanggan` char(11) NOT NULL,
  `id_mandor` char(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_pelanggan`, `id_mandor`, `name`, `email`, `jk`, `alamat`, `no_hp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, '0', '0', 'Ilham Maulana', 'ilhamart3@gmail.com', 'laki-laki', 'Cinangka', '087771525066', 'spider-man-into-the-spider-verse-3840x2160-4k-15053.jpg', '$2y$10$OVx0KkQ8UH/VJ.D4rJIY9emOjDg8EGn2F3dKRPxd.7JMiSEhOKxza', 1, 1, 1591893623),
(2, 'P01', '0', 'Fazri Azhari', 'fazriazhari@gmail.com', 'Laki-laki', 'Labuan', '08777162563', 'default.jpg', '$2y$10$5nTXtTrr8LfTlKnpGNh8PuLvt3v/sBuDqYA6WdSsT74YLjD/D8NjO', 2, 1, 1591894496),
(3, '0', 'M01', 'Muhamad Rizky', 'rizky@gmail.com', 'Laki-laki', 'Serang', '0827363533', 'default.jpg', '$2y$10$bZSZ54YDw3REim6e0WymCOUxYwRTEGBkS/M9SJDj3TF2O7jgu5req', 3, 1, 1591959925),
(4, 'P02', '0', 'saripudin hidayat', 'sario123@gmal.com', 'Laki-laki', 'Sumedang', '087126253', 'default.jpg', '$2y$10$0U6cVt14ruHPg2vSPT360eKXOoWKakBfSbysQZka/ZIprHz07ZJ8u', 2, 1, 1593175557),
(5, '0', 'M02', 'ahmad yani', 'yani@gmail.com', 'Laki-laki', 'Petir', '0866172625', 'default.jpg', '$2y$10$ZKFSqTDBc5WWeUg1T/dN2.o.G/ahPAC2cO3ADQ0oAHGui49efZMri', 3, 0, 1593716716),
(6, '0', 'M03', 'sudrajat', 'sudrajat@gmail.com', 'Laki-laki', 'Carenang', '0877716253', 'default.jpg', '$2y$10$cu6gFhnUTp8WsELQHdwiXuU/GkqBqs6.mS2u7adlK5A1/BeiU9w36', 3, 1, 1598029480),
(7, '', '', 'diki', 'diki@gmail.com', '', '', '', 'default.jpg', '$2y$10$SMGNrQQ3hLENODOxnCf5ZO.S0vwkXmyvyl9rj8X55CrLzaEqi1o.q', 2, 1, 1599227669);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 2, 2),
(7, 1, 3),
(8, 1, 8),
(9, 3, 8),
(10, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(8, 'mandor');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pelanggan'),
(3, 'Mandor'),
(4, 'Desainer'),
(5, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Data Pelanggan', 'admin/pelanggan', 'fas fa-fw fa-user-friends', 1),
(11, 1, 'Data Mandor', 'admin/mandor', 'fas fa-fw fa-users', 1),
(13, 8, 'Data Pesanan', 'mandor/pesanan', 'fas fa-fw fa-user-cog', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mandor`
--
ALTER TABLE `mandor`
  ADD PRIMARY KEY (`id_mandor`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mandor`
--
ALTER TABLE `mandor`
  MODIFY `id_mandor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
