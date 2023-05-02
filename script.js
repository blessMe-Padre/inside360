const moveButton = document.getElementById('move');
const farmer = document.getElementById('farmer');
const goat = document.getElementById('goat');
const cabbage = document.getElementById('cabbage');
const wolf = document.getElementById('wolf');
const leftShore = document.querySelector('.shore.left');
const rightShore = document.querySelector('.shore.right');
const countValue = document.querySelector('.count').innerText;


let isLeft = true;
let itemToMove;
let count = +countValue;


function move(element) {
    if (isLeft) {
        rightShore.appendChild(element);
    } else {
        leftShore.appendChild(element);
    }
}


async function checkWin() {
    if (rightShore.contains(farmer) && rightShore.contains(goat) && rightShore.contains(cabbage) && rightShore.contains(wolf)) {
        alert('Поздравляем! Вы успешно перевезли всех на другой берег!');

        // Сбросить значение count на сервере
        try {
            const response = await fetch("save_count.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "reset=1"
            });

        } catch (error) {
            console.error("Ошибка:", error);
        }

        location.reload();
    }
}

function checkLose() {
    if ((leftShore.contains(goat) && leftShore.contains(wolf) && !leftShore.contains(farmer)) ||
        (leftShore.contains(goat) && leftShore.contains(cabbage) && !leftShore.contains(farmer)) ||
        (rightShore.contains(goat) && rightShore.contains(wolf) && !rightShore.contains(farmer)) ||
        (rightShore.contains(goat) && rightShore.contains(cabbage) && !rightShore.contains(farmer))) {
        count++;

        saveCount(count);

        alert('Вы проиграли. Попробуйте снова.');
        location.reload();
    }
}

function selectItem(element) {
    if (!itemToMove) {
        itemToMove = element;
        itemToMove.classList.add('isSelected');
    } else if (itemToMove === element) {
        itemToMove = null;
    }
}

async function saveCount() {
    try {
        const response = await fetch("save_count.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `count=${count}`
        });

    } catch (error) {
        console.error("Ошибка:", error);
    }
}

farmer.addEventListener('click', () => selectItem(farmer));
goat.addEventListener('click', () => selectItem(goat));
cabbage.addEventListener('click', () => selectItem(cabbage));
wolf.addEventListener('click', () => selectItem(wolf));

moveButton.addEventListener('click', () => {
    if (itemToMove) {
        move(farmer);
        move(itemToMove);
        itemToMove.classList.remove('isSelected');
        itemToMove = null;
        isLeft = !isLeft;
        checkWin();
        checkLose();
    } else {
        alert("Выберите кого нужно перевезти");
    }
});
