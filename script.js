const confirmDelete = () => {confirm('Точно очистить данные?'); };

const deleteButton = document.querySelectorAll('.clear_budget');
deleteButton.forEach(button => {
    button.addEventListener('click', confirmDelete);
});


