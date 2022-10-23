const buttons = document.querySelectorAll('a.quizText')

const confirm_function = () => {
	const result = confirm('Jesteś pewien, że chcesz zrestartować quiz? Postęp nie zostanie zachowany!')
	if (result) {
		location.href = './reset.php'
	}
}

buttons[0].addEventListener('click', confirm_function)
buttons[1].addEventListener('click', confirm_function)
