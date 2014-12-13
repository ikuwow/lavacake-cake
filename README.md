# Lavacake

のAPI側。

http://ec2-54-64-228-5.ap-northeast-1.compute.amazonaws.com
全部HTTPでお願いします（SSLなし）

## APIの仕様

### 会員登録

アプリ側でFacebookかTwitterの認証が成功した後、DBにアクセストークンを保存するメソッド

* /users/register.json
* POSTでusername: [:username]
* ユーザーが存在しなかったら新規登録、存在したらそのまま。
* successとuser_idが帰ってきます


### ユーザーの持っているタイムラインを全て取得

ログインユーザーの持っているタイムラインを全て取得

* /users/timelines.json?uid=[:user_id]
* GET
* Timelinesが帰ってきます。

### タイムライン（一人）の中のアカウントID情報を全て取得（未実装）

* /timeline/[timeline_id].json
* GET
* successとタイムライン一覧が帰ってきます

### タイムラインを作成（未実装）

* /timeline/create.json
* POSTでデータを送る
* name: タイムライン名
* user_id: ユーザID
* fb_user_id : facebookユーザーID（数値）
* tw_user_id : twitter ユーザーID（数値）

trueまたはfalseが帰ってきます


### タイムラインを編集（未実装）

あとでやる

*
*

