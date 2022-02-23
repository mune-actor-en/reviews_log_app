## Docker の起動から MySQL への接続する流れ

1. Docker の起動状態を確認する
   1. docker-compose ps
      → 起動していなければ、docker-compose up -d
2. Docker 上の MySQL に接続する
   docker-compose exec app mysql -h db -u book_log -D book_log -p
   ※パスワードは pass

---
## MySQL で打ち間違いを取り消したいとき
\c

---
## MySQL で表示結果を整形して見やすくしたいとき

\G を最後につける
例：SELECT * FROM companies\G

---
