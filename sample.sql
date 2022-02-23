INSERT INTO reviews (
  title,
  author,
  status,
  score,
  summary
) VALUES (
  'Atomawashinishinaigijutu',
  'I Mingu',
  'complete',
  '5',
  'I love this book'
);

INSERT INTO companies (
  name,
  establishment_date,
  founder
) VALUES (
  'mercari inc',
  '2013-02-01',
  'Shintaro Yamada'
);

INSERT INTO companies (
  name,
  establishment_date,
  founder
) VALUES (
  'fusionia inc',
  '2022-01-10',
  'Utsunomiya Masamune'
);







CREATE TABLE companies (
id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
establishment_date DATE,
founder VARCHAR(255),
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

CREATE TABLE books (
id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
author VARCHAR(255) NOT NULL,
status VARCHAR(255) NOT NULL,
score INTEGER NOT NULL,
summary VARCHAR(255) NOT NULL,
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

CREATE TABLE reviews ( -- テーブル名は「読書の感想」ということで reviews にした
id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
title VARCHAR(255), -- 文字数は超過することがないように多めで設定（副題入れると長いケースもあるのでかなり多めにしている）
author VARCHAR(100), -- 文字数は超過することがないように多めで設定
status VARCHAR(10), -- 「読んでる」が最長なので、VARCHAR(4)でも OK。今後 status に他のパターンを追加したとしても文字数が超過することがないように多めで設定している
score INTEGER, -- 整数なので INTEGER
summary VARCHAR(1000), -- 感想なので他のカラムより文字数を多めに設定。もっと多くても良い
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
