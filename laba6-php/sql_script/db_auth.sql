--
-- Database: `db_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `lab6member`
(
    `member_id`       int(8)                          NOT NULL,
    `member_name`     varchar(255) CHARACTER SET utf8 NOT NULL,
    `member_password` varchar(64)                     NOT NULL,
    `member_email`    varchar(255) CHARACTER SET utf8 NOT NULL,
    `create_at`       timestamp                       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `lab6member` (`member_id`, `member_name`, `member_password`, `member_email`)
VALUES (1, 'admin', '$2a$10$0FHEQ5/cplO3eEKillHvh.y009Wsf4WCKvQHsZntLamTUToIBe.fG', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token_auth`
--

CREATE TABLE `tokenAuth`
(
    `id`            int(11)      NOT NULL,
    `username`      varchar(255) NOT NULL,
    `password_hash` varchar(255) NOT NULL,
    `selector_hash` varchar(255) NOT NULL,
    `is_expired`    int(11)      NOT NULL DEFAULT '0',
    `expiry_date`   timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `lab6member`
    ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_token_auth`
--
ALTER TABLE `tokenAuth`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `lab6member`
    MODIFY `member_id` int(8) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `tbl_token_auth`
--
ALTER TABLE `tokenAuth`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;
COMMIT;
