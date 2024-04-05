document.addEventListener('DOMContentLoaded', function() {
    var cookieAlert = document.getElementById('cookie-alert');
    var aceitarCookie = document.getElementById('aceitar-cookie');
  
    // Verifica se o cookie foi aceito
    var cookieAceito = localStorage.getItem('cookieAceito');
  
    if (!cookieAceito) {
      cookieAlert.style.display = 'block';
    }
  
    aceitarCookie.addEventListener('click', function() {
      localStorage.setItem('cookieAceito', true);
      cookieAlert.style.display = 'none';
    });
  });
  