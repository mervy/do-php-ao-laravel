--
-- Banco de dados: random_datas
--

-- --------------------------------------------------------

--
-- Estrutura para tabela articles
--

CREATE TABLE articles (
  id int(11) NOT NULL,
  guid varchar(128) NOT NULL,
  title varchar(128) NOT NULL,
  content text NOT NULL,
  image varchar(128) NOT NULL,
  created_at datetime NOT NULL,
  updated_at datetime NOT NULL,
  tags varchar(128) NOT NULL,
  author_fk int(11) NOT NULL,
  category_fk int(11) NOT NULL,
  is_active enum('0','1') DEFAULT NULL COMMENT '0->false, 1->true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela authors
--

CREATE TABLE `authors` (
  id int(11) NOT NULL,
  first_name varchar(64) NOT NULL,
  last_name varchar(64) NOT NULL,
  email varchar(64) NOT NULL,
  password varchar(128) NOT NULL,
  guid varchar(64) NOT NULL,
  avatar varchar(128) NOT NULL,
  is_active enum('0','1') DEFAULT '0' COMMENT '0->false, 1->true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela categories
--

CREATE TABLE categories (
  id int(11) NOT NULL,
  title varchar(128) NOT NULL,
  slug varchar(200) NOT NULL,
  description text NOT NULL,
  created_at datetime NOT NULL,
  is_active enum('0','1') DEFAULT '0' COMMENT '0->false, 1->true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela newsletters
--

CREATE TABLE newsletters (
  id int(11) NOT NULL,
  name varchar(64) NOT NULL,
  email varchar(64) NOT NULL,
  ip_address varchar(64) NOT NULL,
  country varchar(32) NOT NULL,
  created_at datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela peoples
--

CREATE TABLE peoples (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  age int(11) NOT NULL,
  cpf varchar(14) NOT NULL,
  rg varchar(20) NOT NULL,
  date_birth datetime NOT NULL,
  gender varchar(20) NOT NULL,
  sign varchar(20) NOT NULL,
  mother_name varchar(255) NOT NULL,
  father_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  zipcode varchar(10) NOT NULL,
  address varchar(255) NOT NULL,
  address_number int(11) DEFAULT NULL,
  district varchar(255) NOT NULL,
  city varchar(255) NOT NULL,
  state varchar(2) NOT NULL,
  fixed_phone varchar(20) NOT NULL,
  cell_phone varchar(20) NOT NULL,
  height decimal(10,2) NOT NULL,
  weight varchar(10) NOT NULL,
  blood_type varchar(5) NOT NULL,
  color varchar(20) NOT NULL,
  is_active tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela visitors
--

CREATE TABLE visitors (
  id int(11) NOT NULL,
  id_article_fk int(11) NOT NULL,
  ip_address varchar(64) NOT NULL,
  country varchar(32) NOT NULL,
  created_at datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela articles
--
ALTER TABLE articles
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY guid (guid),
  ADD KEY fk_author (author_fk),
  ADD KEY fk_category (category_fk);

--
-- Índices de tabela authors
--
ALTER TABLE authors
  ADD PRIMARY KEY (id);

--
-- Índices de tabela categories
--
ALTER TABLE categories
  ADD PRIMARY KEY (id);

--
-- Índices de tabela newsletters
--
ALTER TABLE newsletters
  ADD PRIMARY KEY (id);

--
-- Índices de tabela peoples
--
ALTER TABLE peoples
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email),
  ADD UNIQUE KEY cpf (cpf);

--
-- Índices de tabela visitors
--
ALTER TABLE visitors
  ADD PRIMARY KEY (id),
  ADD KEY fk_article (id_article_fk);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela articles
--
ALTER TABLE articles
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela authors
--
ALTER TABLE authors
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela categories
--
ALTER TABLE categories
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela newsletters
--
ALTER TABLE newsletters
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela peoples
--
ALTER TABLE peoples
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela visitors
--
ALTER TABLE visitors
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas articles
--
ALTER TABLE articles
  ADD CONSTRAINT fk_author FOREIGN KEY (author_fk) REFERENCES authors (id),
  ADD CONSTRAINT fk_category FOREIGN KEY (category_fk) REFERENCES categories (id);

--
-- Restrições para tabelas visitors
--
ALTER TABLE visitors
  ADD CONSTRAINT fk_article FOREIGN KEY (id_article_fk) REFERENCES articles (id);
COMMIT;
