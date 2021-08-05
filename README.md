# 顧客情報をスマートにスタッフ間で共有・管理できるwebアプリ『Smart-管理』

# 概要
業種は特に問わず、お店に来店した顧客の情報をスタッフ間で共有・管理することができるアプリケーション。</br>
現場で働いており、**普段PCやスマートフォンに触り慣れていないような人たちでも、スタッフ間で簡単に共有して記録が残せるようなシンプルなサービスをコンセプト**としました。</br>

# 制作背景
個人店などでは顧客管理を手帳で行っていたり、独自にスタッフがそれぞれメモツールを使って
口頭で都度共有していたり、顧客情報の検索にとても時間と手間が掛かっているという課題が見つかりました。</br>
さらに、他の課題では顧客管理するためだけに、月額料金の高い集客媒体と契約していたりなどの声も上がっており、毎月の掛かるコスト的な課題も見つかりました。</br>

**課題まとめ**</br>
・顧客管理のためだけに、月額数万円以上の費用を掛けてしまっている。</br>
・手帳やメモツールでそれぞれで管理していて、スタッフ間で共有するのに手間がかかっている。</br>
・顧客管理のための、入力や保存に時間が掛かってしまっている。</br>

上記の課題を自分の手で解決したいと考え、このサービスの開発を行いました。</br>

### アプリURL: https://smart-kanri.com
### サンプルユーザー
### メールアドレス:test@example.com
### パスワード:12345678
</br>

# 管理画面基本操作説明

### ●顧客情報の新規作成</br>
※ログイン後(ユーザー登録必須)</br>

①管理画面TOPから顧客情報新規作成</br>
②項目毎に顧客情報の入力して作成</br>
※お客さんに入力してもらう場合はお客様入力専用ページへ</br>
③顧客情報の作成が完了して、詳細ページで入力した内容を確認</br>

![customer_create](/readmeFolder/admin.png)
### お客さんにタブレットなどを渡して直接入力してもらう場合
![input](/readmeFolder/input.gif)


### ●来店履歴の作成</br>
①来店履歴を作成したい顧客のページに飛ぶ</br>
②来店記録追加のボタンを押す</br>
③各項目を入力後に作成するボタンを押す</br>
④顧客毎の詳細ページ(下部)と、来店記録一覧ページで確認</br>

![visit_create](/readmeFolder/visit_create.png)

### ●顧客&来店履歴の検索</br>


# 使用技術

**バックエンド**<br>
PHP 7.4.21 / Laravel 6.20.27

**フロントエンド**<br>
HTML / CSS / javascript / Bootstrap

**インフラ**<br>
mysql 8.0.25</br>
AWS(EC2, S3, RDS, Route 53, ELB, ACM)</br>
Docker 20.10.6(ローカル環境にて使用) / Docker compose(ローカル環境にて使用)


**その他の使用技術**<br>
git(gitHub) / Visual Studio Code / SendGrid(メール)</br>
Adobe XD(画面遷移図) / lucidchart(ER図) / Drawio(AWS構成図)</br>
TablePlus(SQLクライアントツール)

# AWS構成図
![画像](/readmeFolder/network.png)

# DB設計
### ・ ER図
![画像](/readmeFolder/ERtables.png)
### ・ 各種テーブル

| **テーブル名** | **定義** |
| ---- | ---- |
| users<br>(ユーザー) | スタッフの登録情報 |
| shops<br>(ショップ) | 店舗の登録情報 |
| sectors<br>(セクター) | 店舗の業種 |
| positions<br>(ポジション) | スタッフの役割 |
| customers<br>(カスタマー) | 顧客の情報|
| visit_histories<br>(ビジットヒストリー) | 顧客の来店履歴の情報|
| menus<br>(メニュー) | 店舗のメニュー情報|
