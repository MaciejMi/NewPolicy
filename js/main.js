const nav = document.querySelector('nav ul')
const openBtn = document.querySelector('#open-menu-btn')
const closeBtn = document.querySelector('#close-menu-btn')

openBtn.addEventListener('click', () => {
	nav.classList.add('active')
	openBtn.classList.remove('active')
	closeBtn.classList.add('active')
})

closeBtn.addEventListener('click', () => {
	nav.classList.remove('active')
	openBtn.classList.add('active')
	closeBtn.classList.remove('active')
})

window.addEventListener('scroll', () => {
	nav.classList.remove('active')
	openBtn.classList.add('active')
	closeBtn.classList.remove('active')
})
