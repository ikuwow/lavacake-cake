# Lavacake

のAPI側。

http://ec2-54-64-228-5.ap-northeast-1.compute.amazonaws.com
全部HTTPでお願いします（SSLなし）

## APIの仕様

### 会員登録

アプリ側でFacebookかTwitterの認証が成功した後、DBにアクセストークンを保存するメソッド

* /users/register.json
* postでusername: ****
* ユーザーが存在しなかったら新規登録、存在したらそのまま。
* successとuser_idが帰ってきます


### ユーザーの持っているタイムラインを全て取得（未実装）

ログインユーザーの持っているタイムラインを全て取得

* /users/timelines.json
* GET

### タイムライン（一人）の中のアカウントID情報を全て取得（未実装）

* /timeline/[timeline_id].json
* GET

### タイムラインを作成（未実装）

* /timeline/create.json
* POSTでデータを送る
* data[Timeline][name]: タイムライン名
* data[TimelinesFacebook][facebook_user_id] (したのとどちらか）
* data[TimelinesTwitter][twitter_user_id] （うえのとどちらか）

### タイムラインを編集（未実装）

あとでやる

*
*

