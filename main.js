const nav = document.querySelector('nav ul');
const openBtn = document.querySelector('#open-menu-btn');
const closeBtn = document.querySelector('#close-menu-btn');

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

// Show More news in home page function

const showMoreBtn = document.querySelector('#show-more-btn');
const hiddenNews = document.querySelector('.hidden');

window.onload = showMoreNews;

showMoreBtn.addEventListener('click', showMoreNews);

function showMoreNews() {
  if (hiddenNews.style.display == 'none') {
    hiddenNews.style.display = 'block';
    showMoreBtn.textContent = 'Ukryj';
  } else {
    hiddenNews.style.display = 'none';
    showMoreBtn.textContent = 'Wyświetl więcej';
  }
}

// Account Box
// Something not working !!!

const userBtn = document.querySelector('#user-btn');
const accountBox = document.querySelector('#account-box');

userBtn.addEventListener('click', () => {
  accountBox.classList.toggle('active');
});