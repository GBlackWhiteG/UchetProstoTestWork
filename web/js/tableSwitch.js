document.addEventListener('DOMContentLoaded', function () {
    const data = {
        "Тема 1": {
            "Подтема 1.1": "Некий текст, привязанный к Подтеме 1.1",
            "Подтема 1.2": "Некий текст, привязанный к Подтеме 1.2",
            "Подтема 1.3": "Некий текст, привязанный к Подтеме 1.3"
        },
        "Тема 2": {
            "Подтема 2.1": "Некий текст, привязанный к Подтеме 2.1",
            "Подтема 2.2": "Некий текст, привязанный к Подтеме 2.2",
            "Подтема 2.3": "Некий текст, привязанный к Подтеме 2.3"
        }
    };

    const topicButtons = document.querySelectorAll('.topic-button');
    const subTopicButtons = document.querySelectorAll('.subtopic-button');
    const contentBlock = document.getElementById('content');
    const activeClass = 'active-topic';

    let activeTopicId = 0;
    let activeSubtopicId = 0;

    const changeActiveTopicButton = (index, button) => {
        topicButtons[activeTopicId].classList.remove(activeClass);
        activeTopicId = index;
        button.classList.add(activeClass);
    }

    const changeActiveSubtopicButton = (index, button) => {
        subTopicButtons[activeSubtopicId].classList.remove(activeClass);
        activeSubtopicId = index;
        button.classList.add(activeClass);

        contentBlock.textContent = data[topicButtons[activeTopicId].textContent][button.textContent];
    }

    Object.values(topicButtons).forEach((button, index) => {
        button.addEventListener('click', function () {
            if (index === activeTopicId) return;
            changeActiveTopicButton(index, button);
            changeActiveSubtopicButton(0, subTopicButtons[0]);

            const buttonNames = Object.keys(data[button.textContent]);
            Object.values(subTopicButtons).forEach((btn, index) => {
                btn.textContent = buttonNames[index];
            });

            contentBlock.textContent = data[topicButtons[activeTopicId].textContent][subTopicButtons[0].textContent];
        });
    });

    Object.values(subTopicButtons).forEach((button, index) => {
        button.addEventListener('click', () => changeActiveSubtopicButton(index, button));
    });
});