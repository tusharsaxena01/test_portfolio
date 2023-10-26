
var form = document.getElementById("contact-form");

async function handleSubmit(event) {
  event.preventDefault();
  var status = document.getElementById("my-form-status");
  var data = new FormData(event.target);
  fetch(event.target.action, {
  method: form.method,
  body: data,
  headers: {
      'Accept': 'application/json'
  }
  }).then(response => {
    if (response.ok) {
      if(status.classList.contains('errormessage'))
        status.classList.replace('errormessage', 'sendmessage');
      else
        status.classList.add('sendmessage');
      status.innerHTML = "Thanks for your submission!";
      status.style.display = "block";
      form.reset()
    } else {
      response.json().then(data => {
        if (Object.hasOwn(data, 'errors')) {
          if(status.classList.contains('sendmessage'))
            status.classList.replace('sendmessage', 'errormessage');
          else
            status.classList.add('errormessage');
          status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
          status.style.display = "block";
        } else {
          if(status.classList.contains('sendmessage'))
            status.classList.replace('sendmessage', 'errormessage');
          else
            status.classList.add('errormessage');
          status.innerHTML = "Oops! There was a problem submitting your form"
          status.style.display = "block";
        }
      })
    }
  }).catch(error => {
    if(status.classList.contains('sendmessage'))
      status.classList.replace('sendmessage', 'errormessage');
    else
      status.classList.add('errormessage');
    status.innerHTML = "Oops! There was a problem submitting your form"
    status.style.display = "block";
  });
}
form.addEventListener("submit", handleSubmit)