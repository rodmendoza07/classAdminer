-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 23, 2019 at 12:26 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nemachtilkali`
--

-- --------------------------------------------------------

--
-- Table structure for table `nm_branchoffice`
--

CREATE TABLE `nm_branchoffice` (
  `nmbo_id` int(11) NOT NULL,
  `nmbo_nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_calle` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_next` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_nint` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_colonia` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_mun` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_telefono` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_cp` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbo_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmbo_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmbo_umod` int(11) DEFAULT NULL,
  `nmbo_moddate` datetime DEFAULT NULL,
  `nmbo_status` int(11) NOT NULL DEFAULT '1',
  `nmbo_bu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_branchoffice`
--

INSERT INTO `nm_branchoffice` (`nmbo_id`, `nmbo_nombre`, `nmbo_calle`, `nmbo_next`, `nmbo_nint`, `nmbo_colonia`, `nmbo_mun`, `nmbo_estado`, `nmbo_telefono`, `nmbo_email`, `nmbo_cp`, `nmbo_ucreate`, `nmbo_createdate`, `nmbo_umod`, `nmbo_moddate`, `nmbo_status`, `nmbo_bu`) VALUES
(1, 'Narvarte', 'Anaxagoras', '27', '', 'Narvarte Poniente', 'Benito Juárez', 'CDMX', '5554592524', '', '03020', 0, '2019-04-18 17:46:07', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_bunit`
--

CREATE TABLE `nm_bunit` (
  `nmbu_id` int(11) NOT NULL,
  `nmbu_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmbu_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmbu_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmbu_umod` int(11) DEFAULT NULL,
  `nmbu_moddate` datetime DEFAULT NULL,
  `nmbu_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_bunit`
--

INSERT INTO `nm_bunit` (`nmbu_id`, `nmbu_name`, `nmbu_ucreate`, `nmbu_createdate`, `nmbu_umod`, `nmbu_moddate`, `nmbu_status`) VALUES
(1, 'Emporio Salsa', 0, '2019-04-18 17:46:07', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_catclases`
--

CREATE TABLE `nm_catclases` (
  `nmcclas_id` int(11) NOT NULL,
  `nmcclas_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcclas_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmcclas_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmcclas_umod` int(11) DEFAULT NULL,
  `nmcclas_moddate` datetime DEFAULT NULL,
  `nmcclas_status` int(11) NOT NULL DEFAULT '1',
  `nmclas_number` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_catclases`
--

INSERT INTO `nm_catclases` (`nmcclas_id`, `nmcclas_desc`, `nmcclas_ucreate`, `nmcclas_createdate`, `nmcclas_umod`, `nmcclas_moddate`, `nmcclas_status`, `nmclas_number`) VALUES
(1, 'Salsa', 0, '2019-04-18 17:46:07', NULL, NULL, 1, 0),
(2, 'Dancehall', 0, '2019-04-18 17:46:07', NULL, NULL, 1, 0),
(3, 'Afrobeat', 0, '2019-04-18 17:46:07', NULL, NULL, 1, 0),
(4, 'Bachata', 0, '2019-04-18 17:46:07', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_cathorarios`
--

CREATE TABLE `nm_cathorarios` (
  `nmch_id` int(11) NOT NULL,
  `nmch_hinicio` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmch_hfinal` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmch_dia` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmch_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmch_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmch_umod` int(11) DEFAULT NULL,
  `nmch_moddate` datetime DEFAULT NULL,
  `nmch_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_cathorarios`
--

INSERT INTO `nm_cathorarios` (`nmch_id`, `nmch_hinicio`, `nmch_hfinal`, `nmch_dia`, `nmch_ucreate`, `nmch_createdate`, `nmch_umod`, `nmch_moddate`, `nmch_status`) VALUES
(1, '19:00', '20:00', 'Lunes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(2, '20:00', '21:00', 'Lunes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(3, '21:00', '22:00', 'Lunes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(4, '19:00', '20:00', 'Martes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(5, '20:00', '21:00', 'Martes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(6, '21:00', '22:00', 'Martes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(7, '19:00', '20:00', 'Miércoles', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(8, '20:00', '21:00', 'Miércoles', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(9, '21:00', '22:00', 'Miércoles', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(10, '19:00', '20:00', 'Jueves', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(11, '20:00', '21:00', 'Jueves', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(12, '21:00', '22:00', 'Jueves', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(13, '19:00', '20:00', 'Viernes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(14, '20:00', '21:00', 'Viernes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(15, '21:00', '22:00', 'Viernes', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(16, '12:00', '13:00', 'Sábado', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(17, '13:00', '14:00', 'Sábado', 0, '2019-04-18 17:46:07', NULL, NULL, 1),
(18, '14:00', '15:00', 'Sábado', 0, '2019-04-18 17:46:07', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_catmembership`
--

CREATE TABLE `nm_catmembership` (
  `nmcm_id` int(11) NOT NULL,
  `nmcm_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcm_status` int(11) NOT NULL DEFAULT '1',
  `nmcm_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmcm_moddate` datetime DEFAULT NULL,
  `nmcm_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmcm_umod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_catmembership`
--

INSERT INTO `nm_catmembership` (`nmcm_id`, `nmcm_desc`, `nmcm_status`, `nmcm_createdate`, `nmcm_moddate`, `nmcm_ucreate`, `nmcm_umod`) VALUES
(1, 'Membresía Gold', 1, '2019-04-18 17:46:07', NULL, 0, NULL),
(2, 'Membresía Silver', 1, '2019-04-18 17:46:07', NULL, 0, NULL),
(3, 'Membresía Bronze', 1, '2019-04-18 17:46:07', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nm_catpagos`
--

CREATE TABLE `nm_catpagos` (
  `nmcp_id` int(11) NOT NULL,
  `nmcp_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcp_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmcp_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmcp_moddate` datetime DEFAULT NULL,
  `nmcp_umod` int(11) DEFAULT NULL,
  `nmcp_status` int(11) NOT NULL DEFAULT '1',
  `nmcp_amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_catpagos`
--

INSERT INTO `nm_catpagos` (`nmcp_id`, `nmcp_desc`, `nmcp_createdate`, `nmcp_ucreate`, `nmcp_moddate`, `nmcp_umod`, `nmcp_status`, `nmcp_amount`) VALUES
(1, 'Membresía Gold', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900),
(2, 'Membresía Silver', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900),
(3, 'Membresía Bronze', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900),
(4, 'Mes membresia Gold', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900),
(5, 'Mes membresía Silver', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900),
(6, 'Mes membresía Bronze', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900),
(7, 'Mes sin membresía', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900),
(8, 'Clase Individual', '2019-04-18 17:46:07', 0, NULL, NULL, 1, 900);

-- --------------------------------------------------------

--
-- Table structure for table `nm_catusers`
--

CREATE TABLE `nm_catusers` (
  `nmcu_id` int(11) NOT NULL,
  `nmcu_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcu_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmcu_moddate` datetime DEFAULT NULL,
  `nmcu_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmcu_umod` int(11) DEFAULT NULL,
  `nmcu_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_catusers`
--

INSERT INTO `nm_catusers` (`nmcu_id`, `nmcu_desc`, `nmcu_createdate`, `nmcu_moddate`, `nmcu_ucreate`, `nmcu_umod`, `nmcu_status`) VALUES
(1, 'Administrador', '2019-04-18 17:46:07', NULL, 0, NULL, 1),
(2, 'Staff', '2019-04-18 17:46:07', NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_clientes`
--

CREATE TABLE `nm_clientes` (
  `nmcl_id` int(11) NOT NULL,
  `nmcl_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcl_apaterno` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcl_amaterno` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcl_mtel` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcl_ftel` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcl_status` int(11) NOT NULL DEFAULT '1',
  `nmcl_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmcl_moddate` datetime DEFAULT NULL,
  `nmcl_ucreate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nm_config`
--

CREATE TABLE `nm_config` (
  `nmconf_id` int(11) NOT NULL,
  `nmconf_value` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmconf_status` int(11) NOT NULL DEFAULT '1',
  `nmconf_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmconf_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmconf_moddate` datetime DEFAULT NULL,
  `nmconf_umod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_config`
--

INSERT INTO `nm_config` (`nmconf_id`, `nmconf_value`, `nmconf_status`, `nmconf_createdate`, `nmconf_ucreate`, `nmconf_moddate`, `nmconf_umod`) VALUES
(1, '@emporiosalsa.mx', 1, '2019-04-18 17:46:07', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nm_dclientes`
--

CREATE TABLE `nm_dclientes` (
  `nmcld_id` int(11) NOT NULL,
  `nmcld_calle` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcld_next` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcld_nint` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcld_colonia` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcld_mun` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcld_cp` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmcld_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nm_dlista`
--

CREATE TABLE `nm_dlista` (
  `nmdl_id` int(11) NOT NULL,
  `nmdl_lid` int(11) NOT NULL,
  `nmdl_cclas` int(11) NOT NULL,
  `nmdl_chorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nm_dpagos`
--

CREATE TABLE `nm_dpagos` (
  `nmdp_id` int(11) NOT NULL,
  `nmdp_mpayment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmdp_pid` int(11) NOT NULL,
  `nmdp_payid` int(11) NOT NULL,
  `nmdp_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nm_lista`
--

CREATE TABLE `nm_lista` (
  `nml_id` int(11) NOT NULL,
  `nml_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nml_cid` int(11) NOT NULL,
  `nml_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nm_pagos`
--

CREATE TABLE `nm_pagos` (
  `nmp_id` int(11) NOT NULL,
  `nmp_memdates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmp_memdatef` datetime DEFAULT NULL,
  `nmp_memtype` int(11) NOT NULL,
  `nmp_client` int(11) NOT NULL,
  `nmp_urecivepay` int(11) NOT NULL,
  `nmp_memstatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nm_usuario`
--

CREATE TABLE `nm_usuario` (
  `nmu_id` int(11) NOT NULL,
  `nmu_uname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nmu_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmu_apaterno` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmu_materno` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmu_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmu_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nmu_createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nmu_moddate` datetime DEFAULT NULL,
  `nmu_ucreate` int(11) NOT NULL DEFAULT '0',
  `nmu_umod` int(11) DEFAULT NULL,
  `nmu_status` int(11) NOT NULL DEFAULT '1',
  `nmu_catu` int(11) NOT NULL,
  `nmu_bo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nm_usuario`
--

INSERT INTO `nm_usuario` (`nmu_id`, `nmu_uname`, `nmu_nombre`, `nmu_apaterno`, `nmu_materno`, `nmu_pass`, `nmu_email`, `nmu_createdate`, `nmu_moddate`, `nmu_ucreate`, `nmu_umod`, `nmu_status`, `nmu_catu`, `nmu_bo`) VALUES
(1, 'admin', 'Administrador', 'Emporio', 'Salsa', '23ca3c7f4f52edbb7228823e2f8d89b9', 'Administrador@emporiosalsa.mx', '2019-04-18 17:46:07', NULL, 0, NULL, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nm_branchoffice`
--
ALTER TABLE `nm_branchoffice`
  ADD PRIMARY KEY (`nmbo_id`),
  ADD KEY `fk_nm_branchoffice_nm_bunit1_idx` (`nmbo_bu`);

--
-- Indexes for table `nm_bunit`
--
ALTER TABLE `nm_bunit`
  ADD PRIMARY KEY (`nmbu_id`);

--
-- Indexes for table `nm_catclases`
--
ALTER TABLE `nm_catclases`
  ADD PRIMARY KEY (`nmcclas_id`);

--
-- Indexes for table `nm_cathorarios`
--
ALTER TABLE `nm_cathorarios`
  ADD PRIMARY KEY (`nmch_id`);

--
-- Indexes for table `nm_catmembership`
--
ALTER TABLE `nm_catmembership`
  ADD PRIMARY KEY (`nmcm_id`);

--
-- Indexes for table `nm_catpagos`
--
ALTER TABLE `nm_catpagos`
  ADD PRIMARY KEY (`nmcp_id`);

--
-- Indexes for table `nm_catusers`
--
ALTER TABLE `nm_catusers`
  ADD PRIMARY KEY (`nmcu_id`);

--
-- Indexes for table `nm_clientes`
--
ALTER TABLE `nm_clientes`
  ADD PRIMARY KEY (`nmcl_id`),
  ADD KEY `fk_nm_clientes_nm_usuario1_idx` (`nmcl_ucreate`);

--
-- Indexes for table `nm_config`
--
ALTER TABLE `nm_config`
  ADD PRIMARY KEY (`nmconf_id`);

--
-- Indexes for table `nm_dclientes`
--
ALTER TABLE `nm_dclientes`
  ADD PRIMARY KEY (`nmcld_id`),
  ADD KEY `fk_nm_dclientes_nm_clientes1_idx` (`nmcld_cid`);

--
-- Indexes for table `nm_dlista`
--
ALTER TABLE `nm_dlista`
  ADD PRIMARY KEY (`nmdl_id`),
  ADD KEY `fk_nm_dlista_nm_lista1_idx` (`nmdl_lid`),
  ADD KEY `fk_nm_dlista_nm_catclases1_idx` (`nmdl_cclas`),
  ADD KEY `fk_nm_dlista_nm_cathorarios1_idx` (`nmdl_chorario`);

--
-- Indexes for table `nm_dpagos`
--
ALTER TABLE `nm_dpagos`
  ADD PRIMARY KEY (`nmdp_id`),
  ADD KEY `fk_nm_dpagos_nm_pagos1_idx` (`nmdp_pid`),
  ADD KEY `fk_nm_dpagos_nm_catpagos1_idx` (`nmdp_payid`);

--
-- Indexes for table `nm_lista`
--
ALTER TABLE `nm_lista`
  ADD PRIMARY KEY (`nml_id`),
  ADD KEY `fk_nm_lista_nm_clientes1_idx` (`nml_cid`),
  ADD KEY `fk_nm_lista_nm_usuario1_idx` (`nml_uid`);

--
-- Indexes for table `nm_pagos`
--
ALTER TABLE `nm_pagos`
  ADD PRIMARY KEY (`nmp_id`),
  ADD KEY `fk_nm_pagos_nm_catmembership1_idx` (`nmp_memtype`),
  ADD KEY `fk_nm_pagos_nm_clientes1_idx` (`nmp_client`),
  ADD KEY `fk_nm_pagos_nm_usuario1_idx` (`nmp_urecivepay`);

--
-- Indexes for table `nm_usuario`
--
ALTER TABLE `nm_usuario`
  ADD PRIMARY KEY (`nmu_id`),
  ADD UNIQUE KEY `nmu_email_UNIQUE` (`nmu_email`),
  ADD UNIQUE KEY `nmu_uname_UNIQUE` (`nmu_uname`),
  ADD KEY `fk_nm_usuario_nm_catusers_idx` (`nmu_catu`),
  ADD KEY `fk_nm_usuario_nm_branchoffice1_idx` (`nmu_bo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nm_branchoffice`
--
ALTER TABLE `nm_branchoffice`
  MODIFY `nmbo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_bunit`
--
ALTER TABLE `nm_bunit`
  MODIFY `nmbu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_catclases`
--
ALTER TABLE `nm_catclases`
  MODIFY `nmcclas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nm_cathorarios`
--
ALTER TABLE `nm_cathorarios`
  MODIFY `nmch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nm_catmembership`
--
ALTER TABLE `nm_catmembership`
  MODIFY `nmcm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nm_catpagos`
--
ALTER TABLE `nm_catpagos`
  MODIFY `nmcp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nm_catusers`
--
ALTER TABLE `nm_catusers`
  MODIFY `nmcu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nm_clientes`
--
ALTER TABLE `nm_clientes`
  MODIFY `nmcl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_config`
--
ALTER TABLE `nm_config`
  MODIFY `nmconf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_dclientes`
--
ALTER TABLE `nm_dclientes`
  MODIFY `nmcld_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_dlista`
--
ALTER TABLE `nm_dlista`
  MODIFY `nmdl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_dpagos`
--
ALTER TABLE `nm_dpagos`
  MODIFY `nmdp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_lista`
--
ALTER TABLE `nm_lista`
  MODIFY `nml_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_pagos`
--
ALTER TABLE `nm_pagos`
  MODIFY `nmp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_usuario`
--
ALTER TABLE `nm_usuario`
  MODIFY `nmu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nm_branchoffice`
--
ALTER TABLE `nm_branchoffice`
  ADD CONSTRAINT `fk_nm_branchoffice_nm_bunit1` FOREIGN KEY (`nmbo_bu`) REFERENCES `nm_bunit` (`nmbu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nm_clientes`
--
ALTER TABLE `nm_clientes`
  ADD CONSTRAINT `fk_nm_clientes_nm_usuario1` FOREIGN KEY (`nmcl_ucreate`) REFERENCES `nm_usuario` (`nmu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nm_dclientes`
--
ALTER TABLE `nm_dclientes`
  ADD CONSTRAINT `fk_nm_dclientes_nm_clientes1` FOREIGN KEY (`nmcld_cid`) REFERENCES `nm_clientes` (`nmcl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nm_dlista`
--
ALTER TABLE `nm_dlista`
  ADD CONSTRAINT `fk_nm_dlista_nm_catclases1` FOREIGN KEY (`nmdl_cclas`) REFERENCES `nm_catclases` (`nmcclas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nm_dlista_nm_cathorarios1` FOREIGN KEY (`nmdl_chorario`) REFERENCES `nm_cathorarios` (`nmch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nm_dlista_nm_lista1` FOREIGN KEY (`nmdl_lid`) REFERENCES `nm_lista` (`nml_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nm_dpagos`
--
ALTER TABLE `nm_dpagos`
  ADD CONSTRAINT `fk_nm_dpagos_nm_catpagos1` FOREIGN KEY (`nmdp_payid`) REFERENCES `nm_catpagos` (`nmcp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nm_dpagos_nm_pagos1` FOREIGN KEY (`nmdp_pid`) REFERENCES `nm_pagos` (`nmp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nm_lista`
--
ALTER TABLE `nm_lista`
  ADD CONSTRAINT `fk_nm_lista_nm_clientes1` FOREIGN KEY (`nml_cid`) REFERENCES `nm_clientes` (`nmcl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nm_lista_nm_usuario1` FOREIGN KEY (`nml_uid`) REFERENCES `nm_usuario` (`nmu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nm_pagos`
--
ALTER TABLE `nm_pagos`
  ADD CONSTRAINT `fk_nm_pagos_nm_catmembership1` FOREIGN KEY (`nmp_memtype`) REFERENCES `nm_catmembership` (`nmcm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nm_pagos_nm_clientes1` FOREIGN KEY (`nmp_client`) REFERENCES `nm_clientes` (`nmcl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nm_pagos_nm_usuario1` FOREIGN KEY (`nmp_urecivepay`) REFERENCES `nm_usuario` (`nmu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nm_usuario`
--
ALTER TABLE `nm_usuario`
  ADD CONSTRAINT `fk_nm_usuario_nm_branchoffice1` FOREIGN KEY (`nmu_bo`) REFERENCES `nm_branchoffice` (`nmbo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nm_usuario_nm_catusers` FOREIGN KEY (`nmu_catu`) REFERENCES `nm_catusers` (`nmcu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
