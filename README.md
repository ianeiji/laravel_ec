## udemy Laravel講座

## ダウンロード方法

git clone

git clone https://github.com/ianeiji/laravel_ec.git

<br>

git clone ブランチを指定してダウンロードする場合

git clone -b ブランチ名 https://github.com/ianeiji/laravel_ec.git

<br>

もしくはzipファイルでダウンロードしてください。

## インストール方法

* cd laravel_ec
* composer install
* npm install
* npm run dev

<br>

.env.example をコピーして .env ファイルを作成

<br>

.envファイルの中の下記をご利用の環境に合わせて変更してください。

<br>

DB_CONNECTION=mysql

DB_HOST=mysql

DB_PORT=3306

DB_DATABASE=laravel_ec

DB_USERNAME=root

DB_PASSWORD=password

<br>

XAMPP/MAMPまたは他の開発環境でDBを起動した後に

php artisan migrate:fresh --seed


と実行してください。（データベーステーブルとダミーデータがつ追加されればOK）

<br>

最後に

php artisan key:generate

と入力してキーを生成後、

<br>

php artisan serve

で簡易サーバーを立ち上げ、表示確認してください。

## インストール後の実施事項

画像のダミーデータは

public/imagesフォルダ内に

sample1.jpg ~ sample6.jpg として

保存しています。

<br>

php artisan storage:linkで

storageフォルダにリンク後、

<br>

storage/app/public/productsフォルダ内に

保存すると表示されます。

(productsフォルダがない場合は作成してください。)

<br>

ショップの画像も表示する場合は、

storage/app/public/shopsフォルダを作成し

画像を保存してください。

## section7の補足

決済のテストとしてstripeを利用しています。

必要な場合は .env にstripeの情報を追記してください。

（講座内で解説しています）

## section8の補足

メールのテストとしてmailtrapを利用しています。

必要な場合は .env にmailtrapの情報を追記してください。

（講座内で解説しています）

<br>

メール処理には時間がかかるので、

キューを使用しています。

<br>

必要な場合は php artisan queue:workで

ワーカーを立ち上げて動作確認をするようにしてください。

（講座内で解説しています）

