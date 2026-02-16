import { validation } from "./validation.js";

validation();

//電話・メールラジオボタン切り替え
export const form = () => {

  $("#the-form").submit(function (event) {
    event.preventDefault();

    grecaptcha.ready(function () {
      grecaptcha
        .execute("6Le5LrgiAAAAAJJp2fncKXfGy8LqQ5bIYjDG0SKn", {
          action: "submit",
        })
        .then(function (token) {
          // Add your logic to submit to your backend server here.
          var recaptchaToken = document.getElementById("recaptchaToken");
          if (recaptchaToken) {
            recaptchaToken.value = token;
          }
        });
    });

    //フォームの入力値を変数に格納する
    const form_data = $("form").serialize();

    if ($("span").hasClass("error")) {
      $("#form-load").hide();
    } else {
      //フォームの入力内容をajaxにより送信する
      $.ajax({
        type: "POST", //POST送信
        url: "php_mailer/send.php", //送信先のURL
        data: form_data, //送信するデータを指定
        timeout: 40000, //タイムアウトの設定
        beforeSend: function (xhr, settings) {
          //リクエスト送信前にボタンを非活性化する
          $(".submit-btn").attr("disabled", true);
          //モーダルウィンドウの表示
          $("#form-load").fadeIn();
        },
        complete: function (xhr, textStatus) {
          //モーダルウィンドウを消す
          $("#form-load").fadeOut();
          //リクエスト送信が完了したら、ボタンの非活性化を解除する
          $(".submit-btn").attr("disabled", false);
        },
      })
        .done(function (data, textStatus, jqXHR) {
          //通信成功時の処理
          $("#form-load").hide();
          $("#the-form").hide();
          $("#the-form")[0].reset(); //フォームに入力している値をリセット
          $("#result").html(data); //send_mail.phpから返ってきたメッセージをHTMLに入れて表示する
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          //通信失敗時の処理
          $("#form-load").hide();
          console.error("送信エラー詳細:", jqXHR.responseText);
          $("#result").html(
            "送信できませんでした<br><small>エラー: " +
              errorThrown +
              "</small>",
          ); //失敗メッセージをHTMLに入れて表示する
        });
    }
  });
};
