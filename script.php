<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function isValidEmail(email) {
  // Basit bir mail geçerliliği kontrolü
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

// jQuery kullanarak bir web formunun verilerini toplamak ve işlemek için
  function submitData(){
    $(document).ready(function(){
      var name = $("#name").val();
      var surname = $("#surname").val();
      var mail = $("#mail").val();
      var password = $("#password").val();
      var action = $("#action").val();

      // Boşluk kontrolü yapılıyor
      if (name.trim() === "") {
        alert("Lütfen adınızı girin!");
      } else if (surname.trim() === "") {
        alert("Lütfen soyadınızı girin!");
      } else if (mail.trim() === "") {
        alert("Lütfen e-posta adresinizi girin!");
      } else if (password.trim() === "") {
        alert("Lütfen şifrenizi girin!");
      } else {
   // verileri dataya topluyo 
        var data = {
          name: $("#name").val(),
          surname: $("#surname").val(),
          mail: $("#mail").val(),
          password: $("#password").val(),
          action: $("#action").val(),
        };



// Ajax sayfaya gitmeden işleme
        $.ajax({
          url: 'function.php',
          type: 'post',
          data: data,
          success:function(response){
            alert(response);
            if(response == "Kayıt başarılı"){
              window.location.reload();
            }
          }
        });

      }
    });
  }







  function submitData2(){
    $(document).ready(function(){

      var mail = $("#mail").val();
      var password = $("#password").val();
      var action = $("#action").val();
      // Boşluk kontrolü yapılıyor
      if (mail.trim() === "") {
        alert("Lütfen e-posta adresinizi girin!");
      } else if (password.trim() === "") {
        alert("Lütfen şifrenizi girin!");
      } else {
   // verileri dataya topluyo 
        var data = {

          mail: $("#mail").val(),
          password: $("#password").val(),
          action: $("#action").val(),
        };

        $.ajax({
          url: 'function.php',
          type: 'post',
          data: data,
          success:function(response){
            alert(response);
            if(response == "Login Successful"){
              window.location.reload();
            }
          }
        });

      }
    });
  }




</script>
