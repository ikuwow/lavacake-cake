# Lavacake

のAPI側。

http://ec2-54-64-228-5.ap-northeast-1.compute.amazonaws.com
全部HTTPでお願いします（SSLなし）

## APIの仕様

### 会員登録

アプリ側でFacebookかTwitterの認証が成功した後、DBにアクセストークンを保存するメソッド

* /register
* data[User][fb_access_token]: ****
* data[User][tw_access_token]: ***, data[User][tw_access_token_secret]: ****)
* return true or false

### ユーザーの持っているタイムラインを全て取得

ログインユーザーの持っているタイムラインを全て取得

* /users/timelines
* GET

### タイムライン（一人）の中のアカウントID情報を全て取得

* /timeline/[timeline_id]
* GET

### タイムラインを作成

* /timeline/create
* POSTでデータを送る
* data[Timeline][name]: タイムライン名
* data[TimelinesFacebook][facebook_user_id] (したのとどちらか）
* data[TimelinesTwitter][twitter_user_id] （うえのとどちらか）

### タイムラインを編集

あとでやる

*
*
