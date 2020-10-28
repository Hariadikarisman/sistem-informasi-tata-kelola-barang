var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombolcari');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function(){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
      container.innerHTML = xhr.responseText;
    }
  }
  xhr.open('POST', 'mahasiswa.php', true);
  xhr.send();
});

