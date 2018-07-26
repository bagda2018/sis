-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jul-2018 às 18:31
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `telefone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_trabalhos`
--

CREATE TABLE `agenda_trabalhos` (
  `id` int(10) UNSIGNED NOT NULL,
  `medico_id` int(10) UNSIGNED NOT NULL,
  `hora_inico` time NOT NULL,
  `hora_termino` time NOT NULL,
  `dia_trabalho` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(10) UNSIGNED NOT NULL,
  `medico_id` int(10) UNSIGNED NOT NULL,
  `utente_id` int(10) UNSIGNED NOT NULL,
  `servico_id` int(10) UNSIGNED NOT NULL,
  `hora` time NOT NULL,
  `dia` date NOT NULL,
  `estado` enum('pentende','realizado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(10) UNSIGNED NOT NULL,
  `medico_id` int(10) UNSIGNED NOT NULL,
  `rcu_id` int(10) UNSIGNED NOT NULL,
  `consulta_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedimento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` time NOT NULL,
  `dia` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade_financeiras`
--

CREATE TABLE `entidade_financeiras` (
  `id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `entidade_financeiras`
--

INSERT INTO `entidade_financeiras` (`id`, `municipio_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 6452, 'SONANGOL', '2018-07-07 14:47:07', '2018-07-07 14:47:07'),
(4, 6470, 'FAA', '2018-07-07 14:47:07', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Diagnóstico Pediátrico', NULL, NULL),
(2, 'Neurofisiologia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

CREATE TABLE `exames` (
  `id` int(10) UNSIGNED NOT NULL,
  `medico_id` int(10) UNSIGNED NOT NULL,
  `utente_id` int(10) UNSIGNED NOT NULL,
  `tipo_exame_id` int(10) UNSIGNED NOT NULL,
  `especialidade_id` int(10) UNSIGNED NOT NULL,
  `hora` time NOT NULL,
  `dia` date NOT NULL,
  `estado` enum('pentende','realizado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `resultado` enum('negativo','positivo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `especialidade_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2018_05_30_225950_create_password_resets_table', 1),
(28, '2018_05_30_231759_create_redefinir_password_table', 1),
(29, '2018_06_28_140013_CreateUsersTable', 1),
(30, '2018_07_07_114326_create_provincias_table', 1),
(31, '2018_07_07_114431_create_municipios_table', 1),
(32, '2018_07_07_114458_create_especialidades_table', 1),
(33, '2018_07_07_114544_create_tipo_exames_table', 1),
(34, '2018_07_07_114615_create_servicos_table', 1),
(35, '2018_07_07_114724_create_entidade_financeiras_table', 1),
(36, '2018_07_07_114725_create_utentes_table', 1),
(37, '2018_07_07_114756_create_medicos_table', 1),
(38, '2018_07_07_114829_create_agenda_trabalhos_table', 1),
(39, '2018_07_07_114904_create_rcus_table', 1),
(40, '2018_07_07_114935_create_exames_table', 1),
(41, '2018_07_07_115018_create_consultas_table', 1),
(42, '2018_07_07_115047_create_diagnosticos_table', 1),
(43, '2018_07_07_115248_create_administradores_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipios`
--

CREATE TABLE `municipios` (
  `id` int(10) UNSIGNED NOT NULL,
  `provincia_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `municipios`
--

INSERT INTO `municipios` (`id`, `provincia_id`, `name`, `created_at`, `updated_at`) VALUES
(6452, 175, 'Caxito', NULL, NULL),
(6453, 176, 'Benguela', NULL, NULL),
(6454, 176, 'Lobito', NULL, NULL),
(6455, 177, 'Camacupa', NULL, NULL),
(6456, 177, 'Catabola', NULL, NULL),
(6457, 177, 'Catumbela', NULL, NULL),
(6458, 177, 'Chissamba', NULL, NULL),
(6459, 177, 'Kuito', NULL, NULL),
(6460, 178, 'Cabinda', NULL, NULL),
(6461, 179, 'Ondjiva', NULL, NULL),
(6462, 180, 'Caala', NULL, NULL),
(6463, 180, 'Catchiungo', NULL, NULL),
(6464, 180, 'Huambo', NULL, NULL),
(6465, 180, 'Longonjo', NULL, NULL),
(6466, 181, 'Caconda', NULL, NULL),
(6467, 181, 'Caluquembe', NULL, NULL),
(6468, 181, 'Lubango', NULL, NULL),
(6469, 182, 'Menongue', NULL, NULL),
(6470, 185, 'Luanda', NULL, NULL),
(6471, 188, 'Malanje', NULL, NULL),
(6472, 189, 'Cazaje', NULL, NULL),
(6473, 189, 'Leua', NULL, NULL),
(6474, 189, 'Luau', NULL, NULL),
(6475, 189, 'Luena', NULL, NULL),
(6476, 189, 'Lumeje', NULL, NULL),
(6477, 190, 'Namibe', NULL, NULL),
(6478, 191, 'Camabatela', NULL, NULL),
(6479, 191, 'Uige', NULL, NULL),
(6480, 192, 'M''banza-Kongo', NULL, NULL),
(6481, 192, 'N''zeto', NULL, NULL),
(6482, 192, 'Soyo', NULL, NULL),
(6483, 183, 'DONDO', NULL, NULL),
(6484, 185, 'Cacuaco', NULL, NULL),
(6485, 185, 'Cazenga', NULL, NULL),
(6486, 185, 'Sambizanga', NULL, NULL),
(6487, 185, 'Belas', NULL, NULL),
(6488, 185, 'Kilamba Kiaxi', NULL, NULL),
(6489, 185, 'Icolo e Bengo', NULL, NULL),
(6490, 185, 'Quiçama', NULL, NULL),
(6491, 185, 'Viana', NULL, NULL),
(6492, 175, 'Nambuangongo', NULL, NULL),
(6493, 175, 'Ambriz', NULL, NULL),
(6494, 175, 'Bula', NULL, NULL),
(6495, 175, 'Atumba', NULL, NULL),
(6496, 175, 'Dembos', NULL, NULL),
(6497, 175, 'Pango Aluquém', NULL, NULL),
(6498, 175, 'Dande', NULL, NULL),
(6499, 191, 'Bembe', NULL, NULL),
(6500, 191, 'Macocola', NULL, NULL),
(6501, 191, 'Milunga', NULL, NULL),
(6502, 191, 'Damba', NULL, NULL),
(6503, 191, 'Bungo', NULL, NULL),
(6504, 191, 'Buengas', NULL, NULL),
(6505, 191, 'Ambuila', NULL, NULL),
(6506, 191, 'Alto Caual', NULL, NULL),
(6507, 191, 'Mucaba', NULL, NULL),
(6508, 191, 'Negage', NULL, NULL),
(6509, 191, 'Puri', NULL, NULL),
(6510, 191, 'Quimbele', NULL, NULL),
(6511, 191, 'Quitexe', NULL, NULL),
(6512, 191, 'Sanza Pombo', NULL, NULL),
(6513, 191, 'Songo', NULL, NULL),
(6515, 191, 'Zombo', NULL, NULL),
(6516, 184, 'SUMBE', NULL, NULL),
(6517, 185, 'PALANCA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abreviacao` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `provincias`
--

INSERT INTO `provincias` (`id`, `name`, `codigo`, `abreviacao`, `created_at`, `updated_at`) VALUES
(175, 'Bengo', '', 'BO', NULL, NULL),
(176, 'Benguela', '', 'BA', NULL, NULL),
(177, 'Bie', '', 'BE', NULL, NULL),
(178, 'Cabinda', '', 'CA', NULL, NULL),
(179, 'Cunene', '', 'CE', NULL, NULL),
(180, 'Huambo', '', 'HO', NULL, NULL),
(181, 'Huila', '', 'HA', NULL, NULL),
(182, 'Kuando-Kubango', '', 'KK', NULL, NULL),
(183, 'Kwanza Norte', '', 'KN', NULL, NULL),
(184, 'Kwanza Sul', '', 'KS', NULL, NULL),
(185, 'Luanda', '', 'LA', NULL, NULL),
(186, 'Lunda Norte', '', 'LN', NULL, NULL),
(187, 'Lunda Sul', '', 'LS', NULL, NULL),
(188, 'Malanje', '', 'ME', NULL, NULL),
(189, 'Moxico', '', 'MO', NULL, NULL),
(190, 'Namibe', '', 'NE', NULL, NULL),
(191, 'Uige', '', 'UE', NULL, NULL),
(192, 'Zaire', '', 'ZE', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rcus`
--

CREATE TABLE `rcus` (
  `id` int(10) UNSIGNED NOT NULL,
  `medico_id` int(10) UNSIGNED NOT NULL,
  `utente_id` int(10) UNSIGNED NOT NULL,
  `alergico` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` enum('mascculino','femenino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo_sanguino` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `redefinir_password`
--

CREATE TABLE `redefinir_password` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidade_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `name`, `especialidade_id`, `created_at`, `updated_at`) VALUES
(1, 'Anatomía Patológica', 1, '2018-07-08 12:29:28', NULL),
(2, 'Intervencionismo', 2, NULL, NULL),
(7, 'Diagnóstico', 2, '2018-07-08 12:34:39', NULL),
(8, 'Terauteútico', 2, '2018-07-08 12:34:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_exames`
--

CREATE TABLE `tipo_exames` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_exames`
--

INSERT INTO `tipo_exames` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Radiagrafia', NULL, NULL),
(2, 'teste', NULL, NULL),
(3, 'Gastro', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(28, 'nicodemos.mateus', 'nicodemos@hotmail.com', '$2y$10$7PbaRIoIDZsnJDmTURu73uWgv6mAylNdDT7yH2ynuAQD3.Avp2pQK', NULL, '2018-07-11 13:26:03', '2018-07-12 06:25:56'),
(29, 'antonio.malengue', 'malengue@gmail.com', '$2y$10$pR2vhGEdwUcF6Z2u8CFnHuJAyb78RjTxNnga4yJ5KR3sCSUx0ZwHu', NULL, '2018-07-12 08:28:37', '2018-07-12 08:28:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utentes`
--

CREATE TABLE `utentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `entidade_financeira_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `telefone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_EFR` int(11) NOT NULL,
  `codigo_postal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `utentes`
--

INSERT INTO `utentes` (`id`, `entidade_financeira_id`, `user_id`, `municipio_id`, `name`, `data`, `telefone`, `email`, `numero_EFR`, `codigo_postal`, `created_at`, `updated_at`) VALUES
(7, 3, 28, 6470, 'Nicodemos Borges Mateus', '1992-04-30', '935945325', 'nicodemos@hotmail.com', 29, 'grafanil rua 7 casa 42', '2018-07-11 13:26:03', '2018-07-12 06:22:57'),
(8, 4, 29, 6470, 'Antonio Malengue', '2018-07-12', '9999999', 'malengue@gmail.com', 30, '123221', '2018-07-12 08:28:38', '2018-07-12 08:28:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administradores_telefone_unique` (`telefone`),
  ADD UNIQUE KEY `administradores_email_unique` (`email`),
  ADD UNIQUE KEY `administradores_codigo_postal_unique` (`codigo_postal`),
  ADD KEY `administradores_user_id_foreign` (`user_id`),
  ADD KEY `administradores_municipio_id_foreign` (`municipio_id`);

--
-- Indexes for table `agenda_trabalhos`
--
ALTER TABLE `agenda_trabalhos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agenda_trabalhos_medico_id_foreign` (`medico_id`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultas_utente_id_foreign` (`utente_id`),
  ADD KEY `consultas_medico_id_foreign` (`medico_id`),
  ADD KEY `consultas_servico_id_foreign` (`servico_id`);

--
-- Indexes for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosticos_rcu_id_foreign` (`rcu_id`),
  ADD KEY `diagnosticos_medico_id_foreign` (`medico_id`),
  ADD KEY `diagnosticos_consulta_id_foreign` (`consulta_id`);

--
-- Indexes for table `entidade_financeiras`
--
ALTER TABLE `entidade_financeiras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entidade_financeiras_name_unique` (`name`),
  ADD KEY `entidade_financeiras_municipio_id_foreign` (`municipio_id`);

--
-- Indexes for table `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `especialidades_name_unique` (`name`);

--
-- Indexes for table `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exames_utente_id_foreign` (`utente_id`),
  ADD KEY `exames_medico_id_foreign` (`medico_id`),
  ADD KEY `exames_tipo_exame_id_foreign` (`tipo_exame_id`),
  ADD KEY `exames_especialidade_id_foreign` (`especialidade_id`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicos_telefone_unique` (`telefone`),
  ADD UNIQUE KEY `medicos_email_unique` (`email`),
  ADD UNIQUE KEY `medicos_codigo_postal_unique` (`codigo_postal`),
  ADD KEY `medicos_especialidade_id_foreign` (`especialidade_id`),
  ADD KEY `medicos_user_id_foreign` (`user_id`),
  ADD KEY `medicos_municipio_id_foreign` (`municipio_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_provincia_id_foreign` (`provincia_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provincias_name_unique` (`name`);

--
-- Indexes for table `rcus`
--
ALTER TABLE `rcus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rcus_utente_id_foreign` (`utente_id`),
  ADD KEY `rcus_medico_id_foreign` (`medico_id`);

--
-- Indexes for table `redefinir_password`
--
ALTER TABLE `redefinir_password`
  ADD UNIQUE KEY `redefinir_password_email_unique` (`email`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `servicos_name_unique` (`name`),
  ADD KEY `servicos_especialidade_id_foreign` (`especialidade_id`);

--
-- Indexes for table `tipo_exames`
--
ALTER TABLE `tipo_exames`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_exames_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `utentes`
--
ALTER TABLE `utentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utentes_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `utentes_telefone_unique` (`telefone`),
  ADD UNIQUE KEY `utentes_email_unique` (`email`),
  ADD UNIQUE KEY `utentes_numero_efr_unique` (`numero_EFR`),
  ADD UNIQUE KEY `utentes_codigo_postal_unique` (`codigo_postal`),
  ADD KEY `utentes_entidade_financeira_id_foreign` (`entidade_financeira_id`),
  ADD KEY `utentes_municipio_id_foreign` (`municipio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agenda_trabalhos`
--
ALTER TABLE `agenda_trabalhos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entidade_financeiras`
--
ALTER TABLE `entidade_financeiras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exames`
--
ALTER TABLE `exames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6518;
--
-- AUTO_INCREMENT for table `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `rcus`
--
ALTER TABLE `rcus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tipo_exames`
--
ALTER TABLE `tipo_exames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `utentes`
--
ALTER TABLE `utentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `administradores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `agenda_trabalhos`
--
ALTER TABLE `agenda_trabalhos`
  ADD CONSTRAINT `agenda_trabalhos_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultas_servico_id_foreign` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultas_utente_id_foreign` FOREIGN KEY (`utente_id`) REFERENCES `utentes` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_consulta_id_foreign` FOREIGN KEY (`consulta_id`) REFERENCES `consultas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnosticos_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnosticos_rcu_id_foreign` FOREIGN KEY (`rcu_id`) REFERENCES `rcus` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `entidade_financeiras`
--
ALTER TABLE `entidade_financeiras`
  ADD CONSTRAINT `entidade_financeiras_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `exames`
--
ALTER TABLE `exames`
  ADD CONSTRAINT `exames_especialidade_id_foreign` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exames_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exames_tipo_exame_id_foreign` FOREIGN KEY (`tipo_exame_id`) REFERENCES `tipo_exames` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exames_utente_id_foreign` FOREIGN KEY (`utente_id`) REFERENCES `utentes` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_especialidade_id_foreign` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicos_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `rcus`
--
ALTER TABLE `rcus`
  ADD CONSTRAINT `rcus_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rcus_utente_id_foreign` FOREIGN KEY (`utente_id`) REFERENCES `utentes` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_especialidade_id_foreign` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `utentes`
--
ALTER TABLE `utentes`
  ADD CONSTRAINT `utentes_entidade_financeira_id_foreign` FOREIGN KEY (`entidade_financeira_id`) REFERENCES `entidade_financeiras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `utentes_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `utentes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
