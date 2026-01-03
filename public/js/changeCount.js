// CSRF-токен
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    function updateQuantity(id, delta) {
        const input = document.getElementById(`quantity_${id}`);
        let quantity = parseInt(input.value);

        if (delta === -1 && quantity <= 1) return; // минимум 1
        if (delta === 1 && quantity >= 100) return; // максимум 100

        quantity += delta;
        input.value = quantity;

        // Отправка AJAX
        fetch(`/cart/update/${id}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Обновляем сумму позиции
                document.getElementById(`item-total-${id}`).textContent = 
                    data.item_total + ' ₽';

                // Обновляем итог
                document.getElementById('cart-total').textContent = 
                    data.cart_total + ' ₽';

                // Показываем уведомление (опционально)
                showToast('Количество обновлено');
            } else {
                alert(data.message);
                input.value = input.value - delta; // откат
            }
        })
        .catch(err => {
            console.error('Ошибка:', err);
            alert('Не удалось обновить количество');
            input.value = input.value - delta;
        });
    }

    // Опционально: уведомление
    function showToast(message) {
        let toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed; top: 10%; right: 50%; background: #8b4513; color: white;
            padding: 10px 20px; border-radius: 5px; z-index: 9999; font-size: 14px;
            `;
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 1000);
    }