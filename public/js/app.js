const textElement = document.querySelector('.pb-2.text-center');
const fullText = 'Shielding your digital world from unseen threats, ensuring every click is a safe step through the vast cyberspace.';
const parts = [
    fullText.slice(0, fullText.indexOf('threats,') + 8),
    fullText.slice(fullText.indexOf('threats,') + 8)
];
let index = 0;
let partIndex = 0;
textElement.innerHTML = '';

function type() {
    if (index < parts[partIndex].length) {
        textElement.innerHTML += parts[partIndex].charAt(index);
        index++;
        setTimeout(type, 50);
    } else if (partIndex === 0) {
        textElement.innerHTML += '<br>';
        index = 0;
        partIndex++;
        setTimeout(type, 50);
    }
}

type();
