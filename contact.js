function emailSend(){
   
    Email.send({
        Host : "s1.maildns.net",
        Username : "munachisonjeze@gmail.com",
        Password : "3A3928521E56A9617B2443C04FBF1DEBF61A",
        To : 'packagemuna@gmail.com',
        From : "munachisonjeze@gmail.com.com",
        Subject : "This is the subject",
        Body : "And this is the body"
    }).then(
      message => alert(message)
    );
}