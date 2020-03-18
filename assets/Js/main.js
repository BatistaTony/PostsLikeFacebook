

function getPost(){

    var xhr = new XMLHttpRequest();
    
    xhr.open('GET', 'getpost.html.php', true);
    
    xhr.onload = function () {
        
        document.getElementById("posts").innerHTML = this.responseText;

    }

    xhr.send()
}

getPost()


function postar(user, nome) {
    var id = user
    var texto = document.getElementById('texto').value;
    
    var xhr = new XMLHttpRequest()
    
    xhr.open('GET', `postar.php?user=${id}&texto=${texto}&nome=${nome}`)
    
    xhr.onload = function () {
        if (this.status === 200) {
            getPost()
        }
    }

    xhr.send()
    
}


function react(id, user, reaction) {

  // alert(reaction)

  var xhr = new XMLHttpRequest();

  xhr.open("GET", `like_post.php?id=${id}&user=${user}`);

  xhr.onload = function() {
    //console.log(this.responseText);
    if (this.status === 200) {
      getPost();
    }
  };

  xhr.send();
}

function love(id) {
  alert("I love" + id);
}

function nervous(id) {
  alert("I'm nrevous" + id);
}