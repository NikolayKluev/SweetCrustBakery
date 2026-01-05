// CSRF Token
// const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Обработка формы входа
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);    

    try {
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.csrfToken,
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        console.log('Ответ:', result);

        if (result.success) {
            alert(result.message);

            // Закрываем модальное окно (если нужно)
            try {
                const modal = bootstrap.Modal.getInstance(document.getElementById('authModal'));
                if (modal) modal.hide();
            } catch (e) { console.log(e); }

            // 🔥 Гарантированный редирект
            setTimeout(() => {
                window.location.href = '/';
            }, 10);            
        } else {
            alert('Ошибка: ' + Object.values(result.errors)[0][0]);
        }
    } catch (err) {
        console.error('Ошибка сети:', err);
        alert('Не удалось подключиться к серверу. Проверьте интернет или перезагрузите страницу.');
    }
});


// Обработка формы регистрации
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);

    fetch('/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.csrfToken,
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload(); // или закрыть модальное окно и обновить UI
        } else {
            alert('Ошибка: ' + Object.values(data.errors)[0][0]);
        }
    })
    .catch(err => {
        alert('Ошибка сети');
        console.error(err);
    });
});