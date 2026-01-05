// Когда пользователь прокручивает страницу, выполните myFunction
window.onscroll = function() {myFunction()};

// Получить заголовок
let header = document.getElementById("header");

// Получить смещение позиции навигационной панели
let sticky = header.offsetTop;

// Добавить класс "sticky" к заголовку, когда вы достигнете его позиции прокрутке.
// Удалить "sticky" при выходе из положения прокрутки
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}