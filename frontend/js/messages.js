(function () {
  const params = new URLSearchParams(window.location.search);
  const msg = document.getElementById('message');
  if (!msg) return;

  if (params.has('error')) {
    msg.textContent = params.get('error');
    msg.style.color = 'red';
    msg.style.fontWeight = 'bold';
  } else if (params.has('success')) {
    msg.textContent = params.get('success');
    msg.style.color = 'green';
    msg.style.fontWeight = 'bold';
  }
})();

document.addEventListener('DOMContentLoaded', function () {
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-links');

  if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('show');
    });
  }
});