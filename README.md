# coachtech フリマ

# 概要

商品の購入や出品などのサービスをご利用いただけます。

![ホーム画面](https://github.com/user-attachments/assets/76be450e-bc95-4034-ba12-fa27bab8ae8c)

## 機能一覧

- **会員登録・ログイン**
- **商品の購入**
- **商品の出品**
- **商品の検索**
- **いいね機能**
- **コメント機能**
- **メール認証**

## 環境構築

**インストール**

1. プロジェクトのクローン

```
git clone git@github.com:oohashitakayuki/coachtech-fleamarket.git
```

2. プロジェクトディレクトリに移動

```
cd coachtech-fleamarket
```

3. docker-compose コマンドを実行

```
docker-compose up -d —build
```

**Laravel 環境構築**

1. docker-compose コマンドで PHP コンテナにログイン

```
docker-compose exec php bash
```

2. Composer パッケージのインストール

```
composer install
```

3. 「.env.example」ファイルをコピーして「.env」ファイルを作成

```
cp .env.example .env
```

4. 「.env」ファイルにおいて環境変数を設定

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

5. アプリケーションキーの作成

```
php artisan key:generate
```

6. マイグレーションおよびシーディングの実行

```
php artisan migrate:fresh --seed
```

## 使用技術(実行環境)

- PHP 7.4.9
- Laravel 8.83.29
- MySQL 8.0.26
- Docker 4.38.0

## 注意事項

**ユーザー情報**

ユーザーを３名追加しています。

ユーザー 1

- メールアドレス -> user@example.com
- パスワード -> password

ユーザー 2

- メールアドレス -> user2@example.com
- パスワード -> password

ユーザー 3

- メールアドレス -> user3@example.com
- パスワード -> password

を入力して、ログインしてください。

**メール認証**

Mailtrap を利用しています。  
Mailtrap を利用してメール認証をする場合は、「.env」ファイルを以下のように設定します。

```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=(Mailtrapで確認したユーザー名)
MAIL_PASSWORD=(Mailtrapで確認したパスワード)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

キャッシュをクリアします。

```
php artisan config:clear
```

## ER 図

![alt](https://github.com/user-attachments/assets/6a0f2c6e-bbe3-4821-b708-b8382886244f)

## URL

- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/
