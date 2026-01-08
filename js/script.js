function abrirDropdownTopo(idDropdown){
  window.scrollTo({top: 0, behavior: 'smooth'}); 
  
  setTimeout(function() {
    var elemento = document.getElementById(idDropdown);
    var dropdown = new bootstrap.Dropdown(elemento);
    dropdown.show();
  }, 600);
}


window.addEventListener('load', function() {
  var paginaAtual = window.location.pathname.split('/').pop();
  
  if(paginaAtual !== 'home.php') {
    var header = document.querySelector('header');
    if(header) {
      var alturaHeader = header.offsetHeight;
      window.scrollTo({
        top: alturaHeader,
        behavior: 'smooth'
      });
    }
  }
});