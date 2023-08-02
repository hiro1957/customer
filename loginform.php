<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rakus</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!--bootstrapによるレイアウト作成 -->
<div class="alert alert-info" role="alert">
顧客管理システム

</div>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
<center>
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="login.php" method="post">
        <p>
       
            <label>メールアドレス</label></br>
           
            <input type="text" id="inputmail"  name="email" >
        </p>

            <label>パスワード</label></br>
            <input type="password" id="inputpassword" name="password"  maxlength="10"></br>
            (※10文字以内で入力してください)
        </p>

        <button type="submit"name="submit" id="btnSubmit" class="btn btn-primary">ログイン</button>
    </form>

<p><a href='form.php'>登録をしていない方はこちらから</a></p>
<p><a href='kanri.php'>管理者の方はこちらから</a></p>
</center>
</body>
</html>


<script>
    window.onload = function(){
        /*各画面オブジェクト*/
        const btnSubmit = document.getElementById('btnSubmit');
        const inputMail = document.getElementById('inputmail');
        const inputPassword = document.getElementById('inputpassword');
    
        const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
        
        
        btnSubmit.addEventListener('click', function(event) {
            let message = [];
            /*入力値チェック*/
            if(inputPassword.value ==""){
                message.push("パスワードが未入力です。");
            }
            if(inputMail.value==""){
                message.push("メールアドレスが未入力です。");
            }else if(!reg.test(inputMail.value)){
                message.push("メールアドレスの形式が不正です。");
            }
            if(message.length > 0){
                alert(message);
                return;
            }
            
        });
    };
</script>
        });
    };
</script>

