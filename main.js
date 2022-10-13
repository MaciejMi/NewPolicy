const nav = document.querySelector('nav ul');
const openBtn = document.querySelector('#open-menu-btn');
const closeBtn = document.querySelector('#close-menu-btn');
const showMoreBtn = document.querySelector('#show-more-btn');
const hiddenNews = document.querySelector('.hidden');

openBtn.addEventListener('click', () => {
  nav.classList.add('active');
  openBtn.classList.remove('active');
  closeBtn.classList.add('active');
});

closeBtn.addEventListener('click', () => {
  nav.classList.remove('active');
  openBtn.classList.add('active');
  closeBtn.classList.remove('active');
});

window.addEventListener('scroll', () => {
  nav.classList.remove('active');
  openBtn.classList.add('active');
  closeBtn.classList.remove('active');
});

showMoreBtn.addEventListener('click', () => {
  if(hiddenNews.style.display === 'none'){
    hiddenNews.style.display = 'block';
    showMoreBtn.textContent = 'Ukryj';
  } else {
    hiddenNews.style.display = 'none';
    showMoreBtn.textContent = 'Wyświetl więcej';
  }
});